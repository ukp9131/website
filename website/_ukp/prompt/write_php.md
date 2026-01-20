# ```$data``` 배열에 값을 입력하는 php 코드 작성
## 프롬프트
- 
## 이미 세팅 되어있는 변수 리스트 (```{자료형} {변수명}``` 변수 설명)
- ```Ukp $ukp```    ukp 객체참조변수
- ```array $data``` 실행 결과를 입력할 배열
## ```$data``` 배열에 입력할 값 (```{자료형} [{배열키}]``` 값 설명)
- ```string [code]``` 성공인경우 1, 실패인경우 2
- ```string [msg]```  code 값이 1 인경우 성공, 2 인경우 실패
## 규칙
- 업로드한 ```upload_ukp_function.md``` 파일에 나와있는 함수를 최대한 사용하여 작성해줘.
- ```$ukp->db_select_list()``` 함수 사용시 업로드한 ```upload_select_list_query.md``` 파일에 select 쿼리 참고해줘.
- ```$ukp->db_select_cnt()``` 함수 사용시 업로드한 ```upload_select_cnt_query.md``` 파일에 select 쿼리 참고해줘.
- ```$ukp``` 함수중에 where 배열, or_bool 설정하는 함수는 ```$ukp->db_create_where()``` 함수 사용하므로 해당 함수설명 참고하여 작성해줘.
- ```$data``` 배열에 값 입력은 코드 가장 마지막부분에서 해줘.
- php 5.2 버전 이상에서 동작하도록 작성해줘.