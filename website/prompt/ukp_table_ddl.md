# JSON 문자열 생성.
## 입력값
```php
$foreign_postfix = "";
```
```sql
```
## 출력값 설명
- comment: 테이블 주석
- primary_type: 기본키 자료형, 기본값 int
- columns: 순서대로 컬럼명, 자료형, 코멘트, 인덱스여부, 기본값
## 규칙
- 결과물에는 주석을 달지 않는다.
- 테이블 생성 쿼리문에서 자료형이 ```$type_dictionary``` 변수 키값으로 명확하게 선언되어있다면 자료형 대신 ```$type_dictionary``` 변수 키값을 입력한다.
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
- 컬럼명, 자료형, 코멘트는 tab(공백4칸)을 이용하여 세로정렬한다. (영어 1byte, 한글 2byte 기준으로)
- ```primary_type``` 은 primary key 자료형이 ```int``` 인경우 생략해도 되며, ```int``` 가 아닌경우 해당 자료형에 맞게 변경한다.
## 참고변수 설명
```php
/**
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
 * - 컬럼명 접미어에 $foreign_postfix 값이 포함되어 있다면 해당 컬럼은 외래키이다.
 * - 변수값이 빈문자열인경우 외래키는 존재하지 않는다.
 * 
 * @var string
 */
$foreign_postfix = "";
```
## 참고예제
### 입력값
```php
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
    index (`a_class`),
    index (`update_dt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='샘플테이블(st)';
```
### 출력값
```json
{
    "comment": "샘플테이블(st)",
    "primary_type": "bigint",
    "columns": [
        ["sample_table_idx  ", "primary           ", "pk                ", true],
        ["foreign_idx       ", "foreign           ", "외래키            ", true],
        ["field             ", "varchar           ", "컬럼명            ", false],
        ["a_class           ", "varchar(20)       ", "직급              ", true],
        ["b_class           ", "varchar(50)       ", "직급b             ", false, "hi"],
        ["num               ", "int(8)            ", "숫자              ", false, "0"],
        ["num2              ", "int(11) unsigned  ", "숫자2             ", false, "0"],
        ["num3              ", "int               ", "숫자3             ", false],
        ["a_login           ", "enum('Y','N')     ", "로그인 성공여부   ", false, "N"],
        ["insert_date       ", "date              ", "입력일            ", false, "1970-01-01"],
        ["insert_time       ", "time              ", "입력시            ", false],
        ["update_dt         ", "datetime          ", "수정일시          ", true],
        ["delete_flag       ", "flag              ", "삭제여부          ", false],
    ]
}
```