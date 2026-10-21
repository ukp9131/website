# 요청사항
- `## 입력값` 에 맞춰서 JSON 문자열을 생성해줘.
## 입력값
```php
$foreign_postfix = "";
```
```sql
```
### 규칙
- 결과물에는 주석을 달지 않는다.
- `primary key` 설정이 되어있는 컬럼은 자료형이 `primary` 가 된다.
- `$foreign_postfix` 값을 접미어로 가지고 있는 컬럼은 자료형이 `foreign` 이 된다.
- 테이블 기본값은 아래 규칙에 따라 입력하며, 함수나 명령어는 소문자로 치환한다.
  + `default null` -> 입력안함.
  + `default 'n'` -> "n"
  + `default CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()` -> "current_timestamp() on update current_timestamp()"
  + `default '1970-01-01' ON UPDATE current_timestamp()` -> "'1970-01-01' on update current_timestamp()"
- 테이블 코멘트는 값이 없는경우 빈문자열로 입력한다.
- 컬럼 코멘트는 값이 없는경우 정렬용 공백이 들어간 빈 코멘트로 입력한다.
- 영문/숫자/기호는 1칸, 한글은 2칸으로 계산하여 컬럼명, 자료형, 코멘트를 공백으로 세로 정렬한다.
- 인덱스여부, 기본값은 세로정렬하지 않는다.
- `$type_dictionary`에 기본값이 정의된 자료형은 SQL의 자료형과 기본값이 모두 동일한 경우에만 해당 키로 치환한다.
- `$type_dictionary`에 기본값이 정의되지 않은 자료형은 SQL의 기본값이 `null`인 경우 해당 키로 치환한다.
- `$type_dictionary`와 SQL 자료형 비교는 대소문자를 구분하지 않는다.
- `$type_dictionary`의 기본값 비교 시 SQL 문자열 리터럴의 바깥쪽 따옴표는 제거하여 비교한다.
- `$foreign_postfix`가 빈 문자열이면 외래키 자료형 판정을 하지 않는다.
- `primary_type` 은 primary key 자료형이 `int` 인경우 생략해도 되며, `int` 가 아닌경우 해당 자료형에 맞게 변경한다.
- `date` 자료형 기본값이 `1970-01-01` 보다 적은경우 기본값은 `1970-01-01`이 된다, null 인경우 기본값을 설정하지 않는다.
- `datetime` 자료형 기본값이 `1970-01-01 00:00:00` 보다 적은경우 기본값은 `1970-01-01 00:00:00`이 된다, null 인경우 기본값을 설정하지 않는다.
- `date`, `datetime` 최소값 보정은 날짜 또는 datetime 리터럴에만 적용하며 함수나 명령어에는 적용하지 않는다.
- 기본값이 null이더라도 ON UPDATE 절이 존재하면 기본값을 생략하지 않고 `null on update ...` 형태로 입력한다.
- 자료형 판정 우선순위는 `primary` → `foreign` → `$type_dictionary` → 원본 SQL 자료형 순서이다.
- `primary key`, `index`, `key`, `unique index`, `unique key`에 포함된 컬럼은 인덱스여부를 `true`로 입력한다.
- 복합 인덱스에 포함된 모든 컬럼은 인덱스여부를 true로 입력한다.
### 참고변수
```php
/**
 * - [{자료형}][0]:string 자료형
 * - [{자료형}][1]:string 기본값, 설정되어있지 않은경우 default null
 *
 * @var array<string,array{0:string,1?:string}>
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
### 출력값 설명
- comment: 테이블 주석
- primary_type: 기본키 자료형, 기본값 int
- columns: 컬럼 정보
  + `[][0]`: 컬럼명
  + `[][1]`: 자료형
  + `[][2]`: 컬럼 코멘트
  + `[][3]`: 인덱스여부
  + `[][4]`: 기본값, 설정 안한경우 기본값 null
### 참고예제 입력값
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
    `insert_dt`        datetime     null     default current_timestamp()   comment '입력일시',
    `update_date`      date       null     default CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()   comment '수정일',
    `update_dt`        datetime     null     default null on update current_timestamp()   comment '수정일시',
    `delete_flag`      varchar(1)   null     default 'n'    comment '삭제여부',
    primary key (`sample_table_idx`),
    index (`foreign_idx`),
    index (`a_class`),
    index (`update_dt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='샘플테이블(st)';
```
### 참고예제 출력값
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
        ["insert_dt         ", "datetime          ", "입력일시          ", false, "current_timestamp()"],
        ["update_date       ", "date              ", "수정일            ", false, "current_timestamp() on update current_timestamp()"],
        ["update_dt         ", "datetime          ", "수정일시          ", true, "null on update current_timestamp()"],
        ["delete_flag       ", "flag              ", "삭제여부          ", false]
    ]
}
```
#### 마지막 수정일
- 2026.10.15
