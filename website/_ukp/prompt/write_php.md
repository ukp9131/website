# 변수에 값을 입력하는 php 코드 작성
## 프롬프트
- 
## 이미 세팅 되어있는 변수 리스트 (변수명: 변수 설명)
```
$ukp: ukp 객체참조변수
$data: 빈 배열
```
## 값을 입력할 변수 (변수명: 값 설명)
```
$data["code"]: 성공인경우 1, 실패인경우 2
$data["msg"]: code 값이 1 인경우 성공, 2 인경우 실패
```
## 규칙
- 업로드한 ```upload_ukp_function_php.md``` 파일에 나와있는 함수를 최대한 사용하여 작성해줘.
- ```$ukp->db_select_list()``` 함수 사용시 업로드한 ```upload_select_list_query.md``` 파일에 select 쿼리 참고해줘.
- ```$ukp->db_select_cnt()``` 함수 사용시 업로드한 ```upload_select_list_query.md``` 파일에 select 부분만 ``` count(*) as `cnt` ``` 로 변경한 select 쿼리 참고해줘.
- 데이터베이스 테이블 구조는 업로드한 ```upload_table_ddl.md``` 파일에 json 형태로 표현되어있고 json 구조 설명은 ```$ukp->db_table_ddl()`` 함수 주석 참고해줘.
- ```$ukp``` 함수중에 where 배열, or_bool 설정하는 함수는 ```$ukp->db_create_where()``` 함수 사용하므로 해당 함수설명 참고하여 작성해줘.
- 만약 ```## 값을 입력할 변수``` 중에 ```$data``` 배열이 있는경우 코드 가장 아래에서 배열값 입력해줘, 없는경우 ```$data``` 배열에 값 설정하지 말아줘
- ```$ukp->db_select_list()```, ```$ukp->db_select_cnt()``` 함수에서 where 조건문 키값에는 반드시 테이블별칭 붙여줘.
- php 5.2 버전 이상에서 동작하도록 작성해줘.