# PHP 언어를 이용한 웹 바이브코딩 가이드 (2026.10.15)
- md 파일 작성시 마지막은 항상 개행문자로 끝남(종료표시)
## 세팅방법
- `.gitignore`, `.editorconfig` 파일과 `_ukp` 폴더를 복사 후 개발할 프로젝트에 붙여넣기.
  + `_ukp` 폴더는 반드시 웹접근 불가한 폴더에 추가
- `.gitignore` 파일 내 폴더 경로를 개발할 프로젝트에 맞게 변경.
- 추가로 사용할 함수를 개발할 프로젝트의 `class.ukp.php` 파일 내에 추가하여 사용.
## 신규 웹개발 하는경우 (현재 폴더구조 무시하고 아래 내용대로 진행)
- `asset`, `upload` 폴더와 `_view` 폴더(웹페이지 만드는 경우에만)를 웹접근 가능한 곳에 세팅
- `asset` 폴더 내 `js` 폴더에 `ukp.js` 파일 세팅 후 `_remap.php` 에서 불러오기
- 웹루트에 `_.php` 파일 추가, `$option` 설정 필요한 페이지는 변수값 설정 후 `_.php` 파일 require
- `_view` 페이지에 `_remap` 폴더 및 페이지별 폴더 추가 후 폴더내에 `index.php`, `style.css`, `script.js` 파일 추가
- 웹 접근 불가능한 곳에 `cli`, `prompt` 폴더 추가.
- `prompt` 폴더 내에 페이지별 폴더 및 아래 파일 추가, upload_db.md 파일 생성경로도 이 폴더로 수정
  + sample.css
  + sample.html
  + sample.js
  + upload_db.md
  + upload_ukp_js.md
  + upload_ukp_php.md
  + write_html.md
  + write_js.md
  + write_php.md
## 폴더구조 설명
- `cli`: cli 환경에서 실행되는 파일. 웹접근 불가.
- `prompt`: 소스생성을 위해 작성한 md 파일, 웹접근 불가.
- `_view` 는 페이지용 폴더, `asset` 는 정적파일용 폴더, `upload` 는 업로드 파일용 폴더.
## 파일구조 설명
- 웹루트에 접두어가 `_` 인 php 파일은 ajax 통신 전용 파일. `$data` 배열에 값 세팅 후 json으로 출력.
- `_view` 폴더내 접두어가 `_` 인 폴더는 공통뷰를 의미, 아닌경우 페이지별 뷰.
- 공통뷰는 `$ukp_g` 변수만 사용가능, 페이지별 뷰는 `$data` 변수만 사용가능
- 파일명에 `_` 가 연속해서 두개이상 붙는경우 테스트용 파일이며 커밋되지 않는다.
## 프롬프트 작성 방법
- 기존 프롬프트 참고하여 작성
- 프롬프트 결과가 의도한것과 다르게 나올때 왜 그렇게 나왔는지 물어본 후 프롬프트 수정
- 하나의 명령을 여러줄에 걸쳐서 설명하면 이해도가 떨어짐
- 프롬프트 설명은 각 프롬프트 하단에 작성
- 프롬프트 주제별 설명
  + `#` 요청사항: ai 한테 요청할 작업 작성
  + `##` 변수: 페이지별로 다르게 들어가는 변수 작성
  + `###` 규칙: 모든 페이지에 들어가는 공통규칙 작성
  + `####` 주석: 프롬프트 결과나 메모, 프롬프트에 포함되지 않는 내용 작성
- 아래 파일은 빠른 업로드를 위해 `prompt` 폴더에 저장 후 사용한다.
  + sample.css
  + sample.html
  + sample.js
  + sample.php
  + upload_db.md
  + upload_ukp_js.md
  + upload_ukp_php.md
  + write_html.md
  + write_js.md
  + write_php.md
