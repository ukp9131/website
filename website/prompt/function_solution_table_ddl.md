# Create PHP variable
## Input
```php
$prefix = "";
$foreign_postfix = "";
```
```sql
```
## Rules
### English
- No comments are added in the output.
- ```## Variables``` contains descriptions of the variables, and the output should be generated based on these variables.
- ```## Example``` provides examples of valid input and output.
- If the data type in the ```## input``` table creation statement is clearly defined as a key in the ```$type_dictionary``` variable, use that key instead of the data type itself.
  - ```varchar(191)``` -> ```varchar```
  - ```varchar(255)``` -> ```varchar2```
  - ```varchar(200)``` -> ```varchar(200)```
- If the data type is not defined in ```$type_dictionary```, then the data type should be written directly.
- If the table creation query has a default value and that default value is different from the default value defined in ```$type_dictionary```, then the default value must be written in the 5th element of the ```$database_arr``` array.
  - ``` `field` varchar(191) null default 'n' comment '컬럼명' ``` -> ```array("field", "varchar", "컬럼명", false, "n")```
  - ``` `delete_flag`      varchar(1)   null     default 'n'    comment '삭제여부' ``` -> ```array("delete_flag", "flag", "삭제여부", false)```
- If the default value of a ```date``` data type is earlier than ```1970-01-01```, the default value becomes ```1970-01-01```.
- If the default value of a ```datetime``` data type is earlier than ```1970-01-01 00:00:00```, the default value becomes ```1970-01-01 00:00:00```.
- If the table comment or field comment has no value, it should be treated as an empty string.
- If the primary key uses the ```int``` data type, set it as ```primary```. If it does not use the ```int``` data type, set it as ```primary_another```.
  - ```int(4)``` -> ```primary```
  - ```int(4) unsigned``` -> ```primary_another```
  - ```bigint(20)``` -> ```primary_another```
  - ```varchar(255)``` -> ```primary_another```
### 한국어
- 결과물에는 주석을 달지 않는다.
- ```## Variables``` 는 변수에 대한 설명이 적혀있고, 해당 변수를 참고하여 출력 내용을 생성한다.
- ```## Example``` 는 정상적인 입출력에 대한 예제이다.
- ```## Input``` 에 있는 테이블 생성문에서 자료형이 ```$type_dictionary``` 변수 키값으로 명확하게 선언되어있다면 자료형 대신 ```$type_dictionary``` 변수 키값을 입력한다.
  - ```varchar(191)``` -> ```varchar```
  - ```varchar(255)``` -> ```varchar2```
  - ```varchar(200)``` -> ```varchar(200)```
- ```$type_dictionary``` 변수에 자료형이 선언되어있지 않으면 자료형을 직접 입력한다.
- 테이블 생성 쿼리문에 기본값이 설정되어있는데 해당 기본값이 ```$type_dictionary``` 변수 기본값과 다른경우 ```$database_arr``` 변수 5번째 배열에 기본값을 입력한다.
  - ``` `field` varchar(191) null default 'n' comment '컬럼명' ``` -> ```array("field", "varchar", "컬럼명", false, "n")```
  - ``` `delete_flag`      varchar(1)   null     default 'n'    comment '삭제여부' ``` -> ```array("delete_flag", "flag", "삭제여부", false)```
- ```date``` 자료형 기본값이 ```1970-01-01``` 보다 적은경우 기본값은 ```1970-01-01```이 된다.
- ```datetime``` 자료형 기본값이 ```1970-01-01 00:00:00``` 보다 적은경우 기본값은 ```1970-01-01 00:00:00```이 된다.
- 테이블 코멘트, 필드 코멘트는 값이 없는경우 빈문자열로 처리한다.
- 기본키는 ```int``` 자료형 인경우 ```primary```, ```int``` 가 아닌경우 ```primary_another``` 로 설정
  - ```int(4)``` -> ```primary```
  - ```int(4) unsigned``` -> ```primary_another```
  - ```bigint(20)``` -> ```primary_another```
  - ```varchar(255)``` -> ```primary_another```
## Variables
```php
/**
 * # English
 * - Array of database table definitions.
 * - [{DB_KEY}][{TABLE_NAME}][comment]: Table comment
 * - [{DB_KEY}][{TABLE_NAME}][columns]: Array of column definitions
 * - [{DB_KEY}][{TABLE_NAME}][columns][]:
 * - [0]: Column Name
 * - [1]: Data Type (or Dictionary Key/primary/foreign)
 * - [2]: Column Comment
 * - [3]: Use index or unique (true/false)
 * - [4]: Default Value (only if data type is NOT in $type_dictionary and a default exists)
 * # 한국어
 * - 데이터베이스 테이블 정의 배열
 * - [{데이터베이스 키}][{테이블명}]["comment"]: 테이블 코멘트
 * - [{데이터베이스 키}][{테이블명}]["columns"]: 컬럼 정의 배열
 * - [{데이터베이스 키}][{테이블명}]["columns"][]:
 * - [0]: 컬럼명
 * - [1]: 자료형 (또는 딕셔너리 키/primary/foreign)
 * - [2]: 컬럼 코멘트
 * - [3]: 인덱스 또는 유니크 사용 여부 (true/false)
 * - [4]: 기본값 (자료형이 $type_dictionary에 없고 기본값이 있는 경우에만)
 *
 * @var array
 */
$database_arr = array()
/**
 * # English
 * - [{Data type}][0]:string Data type
 * - [{Data type}][1]:string Default value. If unset, the variable defaults to null.
 * # 한국어
 * - [{자료형}][0]:string 자료형
 * - [{자료형}][1]:string 기본값, 설정되어있지 않은경우 default null
 * 
 * @var array
*/
$type_dictionary = array(
    "bigint" => array("bigint(20)", "0"),
    "date" => array("date"),
    "datetime" => array("datetime"),
    "decimal" => array("decimal(5,2)", "0"),
    "decimal2" => array("decimal(9,6)", "0"),
    "flag" => array("varchar(1)", "n"),
    "int" => array("int(11)", "0"),
    "mediumtext" => array("mediumtext"),
    "text" => array("text"),
    "time" => array("time"),
    "varchar" => array("varchar(191)"),
    "varchar2" => array("varchar(255)")
);
/**
 * # English
 * - Setting a prefix for table names.
 * # 한국어
 * - 테이블명의 접두어를 설정한다.
 * 
 * @var string
 */
$prefix = "";
/**
 * # English
 * - Find the foreign key if the column name contains the postfix specified by $foreign_postfix.
 * - If the variable is empty, no foreign key is used.
 * # 한국어
 * - 컬럼명 접미어에 $foreign_postfix 값이 포함되어 있다면 해당 컬럼은 외래키이다.
 * - 변수값이 빈문자열인경우 외래키는 존재하지 않는다.
 * 
 * @var string
 */
$foreign_postfix = "";
```
## Example
### Input
```php
$prefix = "ukp_";
$foreign_postfix = "_idx";
```
```sql
create table if not exists `ukp_sample_table` (
    `sample_table_idx` bigint(20)      not null auto_increment comment 'pk',
    `foreign_idx`      int(11)      null     default null   comment '외래키',
    `field`            varchar(191) null     default null   comment '컬럼명',
    `a_class`          varchar(20)  null     default null   comment '직급',
    `b_class`          varchar(50)  null     default 'hi'   comment '직급b',
    `num`              int(8)      null      default '0'    comment '숫자',
    `num2`              int(11) unsigned      null      default '0'    comment '숫자2',
    `num3`              int(11)      null      default '0'    comment '숫자3',
    `a_login` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '로그인 성공여부'
    `insert_date`      date         null     default '0000-00-00'   comment '입력일',
    `insert_time`      time         null     default null   comment '입력시',
    `update_dt`        datetime     null     default null   comment '수정일시',
    `delete_flag`      varchar(1)   null     default 'n'    comment '삭제여부',
    primary key (`sample_table_idx`),
    index (`foreign_idx`),
    index (`update_dt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='샘플테이블(st)';
```
### Output
```php
$database_arr = array(
    "default" => array(
        "sample_table" => array(
            "comment" => "샘플테이블(st)",
            "columns" => array(
                array("sample_table_idx                 ", "primary_another   ", "pk                                  ", true),
                array("foreign_idx                      ", "foreign           ", "외래키                              ", true),
                array("field                            ", "varchar           ", "컬럼명                              ", false),
                array("a_class                          ", "varchar(20)       ", "직급                                ", false),
                array("b_class                          ", "varchar(50)       ", "직급b                               ", false, "hi"),
                array("num                              ", "int(8)            ", "숫자                                ", false, "0"),
                array("num2                             ", "int(11) unsigned  ", "숫자2                               ", false, "0"),
                array("num3                             ", "int               ", "숫자3                               ", false),
                array("a_login                          ", "enum('Y','N')     ", "로그인 성공여부                     ", false, "N"),
                array("insert_date                      ", "date              ", "입력일                              ", false, '1970-01-01'),
                array("insert_time                      ", "time              ", "입력시                              ", false),
                array("update_dt                        ", "datetime          ", "수정일시                            ", true),
                array("delete_flag                      ", "flag              ", "삭제여부                            ", false),
            )
        )
    )
);
```