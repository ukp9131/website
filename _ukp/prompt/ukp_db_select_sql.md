# 요청사항
- select sql 쿼리문 생성
# 규칙
- 결과물은 SQL 쿼리문만 출력한다.
- 필드명에 대문자가 포함되어 있으면 모두 소문자로 변환한다.
- 테이블명은 업로드한 파일명에서 확장자 `.json`을 제외한 값으로 한다.
- 단, 파일명 끝에 중복 업로드 등으로 자동 추가된 `(숫자)`가 있으면 해당 부분을 제거하여 테이블명으로 사용한다.
  + 예: `it_tag(4).json` → `it_tag`
  + 예: `admin_group.json` → `admin_group`
- 테이블명에 별도의 규칙으로 제거하도록 지정된 부분이 없다면 원본 파일명을 그대로 사용한다.
- 테이블 코멘트 마지막에 괄호로 묶인 값이 있으면 해당 값을 테이블 별칭으로 사용한다.
  + 예: `"어드민 관리자 그룹(ag)"` -> 별칭 `ag`
- 테이블 별칭이 없는 경우 별칭을 사용하지 않는다.
- 모든 컬럼을 `select` 절에 JSON의 `columns` 순서대로 출력한다.
- `primary` 자료형인 컬럼을 기본키로 판단한다.
- `order by` 절은 기본키 컬럼을 기준으로 오름차순 정렬한다.
- `primary` 자료형인 컬럼이 2개이상 나오는경우 sql 쿼리문대신 `primary` 자료형인 컬럼리스트 알려줘.
## 참고예제 입력값
- 파일명: admin_group.json
- json 값 정보
  + `[comment]` 테이블 코멘트
  + `[columns][][0]` 컬럼명
  + `[columns][][1]` 자료형
  + `[columns][][2]` 컬럼 코멘트
  + `[columns][][3]` 인덱스여부
  + `[columns][][4]` 기본값, 설정 안한경우 기본값 null
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
## 참고예제 출력값
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
<!--
# 마지막 수정일
- 2026.10.26
# 메모
- ddl 을 잘 작성하였는지 검토하는 부분도 이 md 파일에 작성
-->
