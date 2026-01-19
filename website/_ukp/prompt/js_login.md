# 자바스크립트 코드 작성
## 프롬프트
- 로그인버튼을 눌렀을때 ```_login.php``` url에 id, pw 값을 post로 전송하고 응답값으로 code=1을 받으면 ```dashboard.php``` 로 location.replace 함수를 이용해 이동한다.
- 아이디 저장여부가 체크되어있는경우 로그인 성공시 id 값을 admin_id 로 로컬스토리지에 저장한다.
- 로컬스토리지에 admin_id 값이 있는경우 아이디 저장여부 체크박스 체크 후 아이디 태그 value에 값을 설정한다.
## html 요소 (emmet: 설명)
- ```input[type=text].ukpj__content_id```: 아이디(id)
- ```input[type=password].ukpj__content_pw```: 비밀번호(pw)
- ```input[type=checkbox].ukpj__content_id_check```: 아이디 저장여부
- ```button[type=button].ukpj__content_login_btn```: 로그인버튼
## 규칙
- ```## html 요소``` 탭에 있는 태그 리스트를 참고하여 작성한다.
- post 요청은 모두 ajax로 하며 ajax 요청시 json 값을 받게된다.