# Create PHP variable
## Input
```php
$database_arr = array();
```
## Rule
### English
- Do not give me your opinion; just follow my instructions exactly.
- If a field name is in uppercase, convert it to lowercase.
- The value enclosed in parentheses in the table comment suffix becomes the table alias.
- The sorting order is ascending by the primary key.
### 한국어
- 너의 의견을 나한테 제시하지말고 내가 시키는대로 수행해라.
- 필드명이 대문자인경우에 소문자로 변환한다.
- 테이블 코멘트 접미어에 괄호로 묶여있는 값이 테이블 별칭이 된다.
- 정렬순서는 기본키 오름차순으로 정렬한다.
## Example
### Input
```php
$database_arr = array(
    "default" => array(
        "sample_table" => array(
            "comment" => "샘플테이블(st)",
            "columns" => array(
                array("sample_table_idx                 ", "primary     ", "pk                                  ", true),
                array("foreign_idx                      ", "foreign     ", "외래키                              ", true),
                array("FIELD                            ", "varchar     ", "컬럼명                              ", false),
                array("num                              ", "int         ", "숫자                                ", false),
                array("insert_date                      ", "date        ", "입력일                              ", false),
                array("insert_time                      ", "time        ", "입력시                              ", false),
                array("update_dt                        ", "datetime    ", "수정일시                            ", true),
                array("delete_flag                      ", "flag        ", "삭제여부                            ", false),
            )
        ),
        "test_tb" => array(
            "comment" => "테스트테이블(tt)",
            "columns" => array(
                array("test_tb_seq                      ", "primary     ", "pk                                  ", true),
                array("foo                              ", "varchar     ", "                                    ", false)
            )
        )
    ),
    "cart" => array(
        "admin_group" => array(
            "comment" => "어드민 관리자 그룹(ag)",
            "columns" => array(
                array("sno                              ", "primary     ", "pk                                  ", true),
                array("group_name                       ", "varchar     ", "그룹명                              ", false),
                array("group_cnt                        ", "int         ", "그룹카운트 합산                     ", false),
                array("mod_dt                           ", "datetime    ", "수정일시                            ", false),
                array("reg_dt                           ", "datetime    ", "등록일시                            ", false)
            )
        )
    )
);
```
### Output
```php
$list_sql_arr = array(
    "default" => array(
        "sample_table" => "
            select
                `st`.`sample_table_idx`,
                `st`.`foreign_idx`,
                `st`.`field`,
                `st`.`num`,
                `st`.`insert_date`,
                `st`.`insert_time`,
                `st`.`update_dt`,
                `st`.`delete_flag`
            from
                `sample_table` as `st`
            order by
                `st`.`sample_table_idx`
        ",
        "test_tb" => "
            select
                `tt`.`test_tb_seq`,
                `tt`.`foo`
            from
                `test_tb` as `tt`
            order by
                `tt`.`test_tb_seq`
        "
    ),
    "cart" => array(
        "admin_group" => "
            select
                `ag`.`sno`,
                `ag`.`group_name`,
                `ag`.`group_cnt`,
                `ag`.`mod_dt`,
                `ag`.`reg_dt`
            from
                `admin_group` as `ag`
            order by
                `ag`.`sno`
        "
    )
);
$cnt_sql_arr = array(
    "default" => array(
        "sample_table" => "
            select
                count(*) as `cnt`
            from
                `sample_table` as `st`
        ",
        "test_tb" => "
            select
                count(*) as `cnt`
            from
                `test_tb` as `tt`
        "
    ),
    "cart" => array(
        "admin_group" => "
            select
                count(*) as `cnt`
            from
                `admin_group` as `ag`
        "
    )
);
```