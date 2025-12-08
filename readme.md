# English
# Vibe Coding Guide for web using PHP
## How to
1. Copy the ```.gitignore``` file and the ```_ukp``` folder, then paste them into your project.
2. Change the ```.gitignore``` file for your project folder.
3. Copy the files from ```www/website``` and paste them into your project.
4. Add the functions from ```class.ukp.php``` to your project if you plan to use them.
5. Write the prompt with reference to the contents of the ```prompt``` folder.
## Rule
- The prompt file must be written as a .md file.
- If database table has been created by another person, run the ```function_solution_table_create.md``` file.
## Directory
- The ```cli``` directory is executed out of the web.
- The ```prompt``` directory is referenced when writing a prompt.
- The ```_css``` and ```_js``` directory contain files that its are used by HTML code in the ```_view``` directory.
- The ```asset``` directory contains static files and the ```upload``` directory contains dynamic files.
- The ```_view``` directory contains PHP code for view page.
## File
- The ```_.php``` file is in the webroot directory
- The ```_.js``` file is in the ```_js``` directory.
- The prefix ```_``` files in the ```_view``` directory is applied in common to all web pages.
- The except prefix ```_``` files in the ```_view``` directory is each page.
- Files whose names contain two or more consecutive underscores will not be committed.
# 한국어
# PHP 언어를 이용한 웹 바이브코딩 가이드
## 세팅방법
1. ```.gitignore``` 파일과 ```_ukp``` 폴더를 복사 후 개발할 프로젝트에 붙여넣기.
2. ```.gitignore``` 파일 내 폴더 경로를 개발할 프로젝트에 맞게 변경.
3. ```www/website``` 폴더 내 파일 복사 후 개발할 프로젝트의 웹 접근 가능한 폴더에 붙여넣기.
4. 추가로 사용할 함수를 개발할 프로젝트의 ```class.ukp.php``` 파일 내에 추가하여 사용. 
5. ```prompt``` 폴더 내용을 참고해서 개발할 프로젝트의 ```prompt``` 폴더에 프롬프트 추가.
## 규칙
- 프롬프트 파일은 .md 확장자로 작성
- 데이터베이스를 다른사람이 설계했을때 ```function_solution_table_ddl.md``` 프롬프트 실행하여 DDL 생성
## 폴더구조 설명
- ```cli``` 파일들은 cli 환경에서 실행되고 웹접근이 불가능.
- ```prompt``` 파일들은 프롬프트 가이드.
- ```_css``` 와 ```_js``` 파일들은 ```_view``` 파일들에서 사용.
- ```asset``` 은 정적파일용 폴더, ```upload``` 은 동적파일용 폴더.
- ```_view``` 파일들은 뷰를 위해 사용.
## 파일구조 설명
- ```_.php``` 파일은 각각 웹루트에 위치하고 ```$global```, ```$data``` 변수 설정.
- ```_.js``` 파일은 ```_js``` 폴더 안에 위치.
- 웹루트에 접두어가 ```_``` 인 PHP 파일은 API용 파일.
- 접두어가 ```_``` 인 ```_view``` 폴더내 파일은 공통뷰를 의미, 아닌경우 페이지별 뷰.
- 파일명에 ```_``` 가 연속해서 두개이상 붙는경우 테스트용 파일이며 커밋되지 않는다.
## 프롬프트 작성 방법 (한국어)
- 한국어로 프롬프트 작성.
- 한국어 프롬프트 참고해서 영어로 프롬프트 작성 후 ```위 프롬프트에서 자연스럽지 않은 부분 있으면 알려줘.``` 프롬프트 입력하여 명령어 확인받기.
- ```위 프롬프트 한국어 버전으로 만들어줘.``` 프롬프트 입력하여 기존에 입력했던 한국어 프롬프트와 비교 확인.
- 생성된 한국어버전 프롬프트가 내가 작성한 프롬프트와 다른경우 ```너가 보내준 결과에서 이 부분을 이 부분으로 고치고 싶은데 그럴려면 내가 보냈던 영문 프롬프트를 어떻게 바꿔야돼?``` 프롬프트 입력.
## 개별파일 상세설명
### function_solution_table_ddl.md
- ddl 생성 후 아래 사항 순차적으로 확인.
1. 누락된 테이블 있는지 확인.
2. 테이블 별칭 설정.
3. 기본키 자료형 확인, int 아닌경우 ```primary_type``` 설정.
4. 기본키 없는경우 테이블에 맞게 설정, 두 개 이상(슈퍼키)인경우 기본키 추가 생성 후 슈퍼키는 외래키 처리.
5. 외래키 있는경우 ```primary_type``` 과 자료형 일치하는지 확인 후 일치하지 않는경우 원본 자료형으로 변경.
6. 탭 입력하여 줄맞춤.