# 요청사항
- 업로드한 `sample.html` 파일을 기반으로 `view.php`, `script.js` 파일을 생성해줘.
## 세부 요청사항
## 클래스 접두어
- ukpj__content_
# 규칙
## 공통 규칙
- 세부 요청사항과 아래 규칙이 충돌하면 세부 요청사항을 우선한다.
- 결과는 `view.php`, `script.js` 각각 전체 코드로 출력한다.
## view.php 파일 생성 규칙
- `sample.html`의 HTML, PHP 구조(요소, 순서, 속성, PHP 코드)를 그대로 유지한다.
- 세부 요청사항에 명시된 경우를 제외하고 요소를 추가·삭제하지 않는다.
### class 요소 추가 규칙
- `# 요청사항 > ## 클래스 접두어` 항목의 값을 접두어로 사용한다.
- 클래스명 형식: `접두어 + 역할`이며, 역할 부분은 소문자 스네이크 케이스로 작성한다.
  + 예: 접두어가 `ukpj__content_`이면 `ukpj__content_btn_save`, `ukpj__content_input_name`
- `script.js`에서 실제로 선택하거나 제어(이벤트 바인딩, 값 조회 등)하는 요소에만 접두어 클래스를 추가한다.
- 접두어 클래스가 아닌 기존 class, id, name, data-* 속성은 변경·삭제하지 않는다. (세부 요청사항에 명시된 경우 제외)
## script.js 파일 생성 규칙
- 최상단에 아래 코드가 없으면 추가한다.
  ```js
  /// <reference path="../../asset/js/ukp.js" />
  const ukp = new Ukp();
  ```
- 모든 코드는 `ukp.ready(function() {});` 안에 작성한다.
- `sample.js`가 업로드된 경우 기존 코드를 유지하고 요청 사항만 추가한다.
- `upload_ukp_js.md`에 있는 기능은 반드시 해당 함수를 사용한다.
  + md에 없는 기능만 바닐라 JS로 작성하며, jQuery 등 외부 라이브러리는 사용하지 않는다.
  + md에 없는 `ukp` 함수를 만들어 쓰지 않는다.
- 요소 선택은 접두어 클래스로만 한다.
- POST 요청은 모두 ajax로 하며 응답은 JSON 문자열이다. (JSON.parse 필요)
<!--
# 마지막 수정일
- 2026.10.26
# 업로드 필요한 파일
- sample.html
- sample.js(선택사항)
- upload_ukp_js.md
-->
