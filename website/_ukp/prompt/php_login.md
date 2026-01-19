# PHP 로 json 문자열을 출력하도록 작성해줘.
## 프롬프트
- post 로 넘어온 id, pw 값으로 admin 테이블을 조회 후 조회 성공 유무에 따라 변수 세팅해줘.
- pw 값은 mysql_password 값으로 처리해서 조회
- 테이블 조회 성공(로그인 성공)시 admin_idx 값을 session 에 저장
## 이미 세팅 되어있는 변수 리스트
- ```$ukp```  ukp 객체참조변수
- ```$data``` 실행 결과를 입력할 배열
## ```$data``` 배열에 입력할 값
- ```string [code]``` 성공인경우 1, 실패인경우 2
- ```string [msg]```  code 값이 1 인경우 성공, 2 인경우 실패
## 규칙
- 업로드한 ```upload_ukp_function.md``` 파일에 나와있는 함수를 최대한 사용하여 작성해줘.
- ```$ukp->db_select_list()``` 함수 사용시 업로드한 ```upload_select_list_query.md``` 파일에 select 쿼리 참고해줘.
- ```$ukp->db_select_cnt()``` 함수 사용시 업로드한 ```upload_select_cnt_query.md``` 파일에 select 쿼리 참고해줘.
- ```$ukp``` 함수중에 where 배열, or_bool 설정하는 함수는 ```$ukp->db_create_where()``` 함수 사용하므로 해당 함수설명 참고하여 작성해줘.
- php 5.2 버전 이상에서 동작하도록 작성해줘.