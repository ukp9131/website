# select SQL 생성 (2026.02.04)
## 규칙
- 너의 의견을 나한테 제시하지말고 내가 시키는대로 수행해라.
- 필드명이 대문자인경우에 소문자로 변환한다.
- 테이블명은 업로드한 파일명.
- 테이블 코멘트 접미어에 괄호로 묶여있는 값이 테이블 별칭이 된다.
- 테이블 별칭 없는경우 사용안함
- 정렬순서는 기본키 오름차순으로 정렬한다.
## 참고예제
### 입력값
- 파일명: admin_group.json
```json
{
    "comment": "어드민 관리자 그룹(ag)",
    "columns": [
        ["SNO           ", "primary     ", "pk                  ", true],
        ["group_name    ", "varchar     ", "그룹명              ", false],
        ["group_CNT     ", "int         ", "그룹카운트 합산     ", false],
        ["mod_dt        ", "datetime    ", "수정일시            ", false],
        ["reg_dt        ", "datetime    ", "등록일시            ", false]
    ]
}
```
### 출력값
```sql
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
```