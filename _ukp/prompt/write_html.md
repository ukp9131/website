# 요청사항
- `index.php`, `view.php`, `style.css` 파일을 생성해줘.
# 세부 요청사항
## 페이지명
- index.php
## 최상단 클래스명
- .ukpb__content
## 이미 세팅되어있는 변수
```php
//ukp 객체 생성
$ukp = new Ukp($option);
//global
$ukp_g = array(
    "dir" => "",        //실행한 파일 폴더
    "base" => "",       //실행한 파일명
    "file" => "",       //확장자 제거한 실행한 파일명
    "view_dir" => "",   //_view 폴더경로
    "lang" => "",       //언어
    "title" => ""       //title 태그 내용
);
```
### 공통규칙
- 모바일 레이아웃을 기본으로 한 반응형 웹으로 작성해줘.
- `sample.html`, `sample.css` 파일이 같이 업로드되는 경우 해당코드와 유사한 스타일로 페이지 생성해줘.
- php 코드 사용시 5.2 버전 이상에서 동작하도록 작성해줘.
- DB 쿼리 결과 변수는 여러줄 인경우 `array(array("컬럼" => "값", "컬럼" => "값"...)...)` 과 같은 형태이고 1줄 인경우 `array("컬럼" => "값", "컬럼" => "값"...)` 와 같은 형태이다.
- DB 쿼리 결과 변수는 항상 초기화되어 있다고 가정한다.
  + 1줄 결과: 데이터가 없더라도 쿼리의 모든 컬럼명이 키(key)로 존재하며 값은 null로 세팅된다. **데이터 존재 여부는 기본키(PK) 컬럼 값이 null인지 확인하여 판단해줘.**
  + 여러 줄 결과: 데이터가 없으면 빈 배열(`array()`)임이 보장된다. **데이터 존재 여부는 결과값이 빈 배열인지 확인하여 판단해줘.** (is_array()나 isset() 검사 없이 바로 foreach문 사용 가능)
- ukp 데이터베이스 함수 설명
  + where 배열, or_bool 설정하는 함수는 `$ukp->db_create_where()` 함수 사용하므로 해당 함수설명 참고하여 작성해줘.
  + row 배열 설정하는 함수는 `$ukp->db_create_row()` 함수 사용하므로 해당 함수설명 참고하여 작성해줘.
  + `$option` 매개변수 설정시 prefix, delete_flag, insert_date, insert_time, insert_dt, update_date, update_time, update_dt 값은 설정하지 않는다.(기본값 그대로 사용)
  + `$ukp->db_select_list()`, `$ukp->db_select_cnt()` 함수는 where 조건문 키값에 반드시 테이블별칭 붙여주고, 업로드한 `upload_db.md` 파일에 list query 참고하면 돼.
  + `$ukp->db_insert()`, `$ukp->db_update()`, `$ukp->db_delete()` 함수 사용 시 where 조건문 키값에 테이블 축약어(alias)를 붙이지 마.
### index.php 파일 생성 규칙
- `index.php` 파일은 `$data` 배열에 값을 설정하는 파일이다.
- 데이터베이스 테이블 정보를 가지고 있는 변수는 업로드한 `upload_db.md` 파일 참고해줘.
- 업로드한 `upload_ukp_php.md` 파일에 나와있는 함수를 최대한 사용하여 작성해줘.
- `$data` 배열에 값을 설정하기 전에 PHP 코드 상단에 사용할 배열 변수들을 아래 예시와 같은 형태로 먼저 선언한다, `$data` 배열 설정이 필요없는경우 빈 배열로 선언해둔다.
```php
$data = array(
    "foo" => "",
    "hello" => 0,
    "key" => false
);
```
- 코드를 작성하기 전 최상단에 아래 코드를 추가한다.
```php
<?php
/**
 * @var Ukp $ukp
 * @var array $ukp_g
 */
require_once dirname(__FILE__) . '/_.php';
```
- 코드 작성 후 최하단에 아래 코드를 추가한다
```php
require_once $ukp_g["dir_view"] . '/_remap/index.php';
```
### view.php 파일 생성 규칙
- `view.php` 파일은 `index.php` 파일에서 생성한 `$data` 배열 값을 사용하여 html 코드를 작성한 파일이다.
- body 태그 내부에 있는 특정 레이아웃에 페이지를 제작하므로 `## 최상단 클래스명` 클래스를 가지고있는 div 태그를 최상위 태그로 시작해줘.
- 너가 임의로 생성하는 클래스명 접두어에 `ukp`는 절대 사용할 수 없다.
- php 코드 사용시 아래 규칙을 준수한다.
  + `<?`, `<?=` 사용 불가하며 `<?php` 만 사용 가능하다.
  + PHP 제어 구조(if, for, foreach, while) 작성 시 가독성을 위해 중괄호({ }) 대신 콜론(:)과 종료 키워드(endif;, endforeach; 등)를 사용하는 대체 문법(Alternative syntax)을 사용해줘.
- HTML 태그 전체를 echo로 출력하지 말고, PHP 태그를 닫고(?>) 순수 HTML로 작성해줘. 데이터 출력이나 로직이 필요한 부분에만 <?php ... ?>를 열어서 작성해줘.
- HTML 내 PHP 출력에서 if/else 두 분기로 단순 값을 출력하는 경우에는 if/else 대신 삼항 연산자를 사용한다. elseif가 포함되거나 여러 문장을 실행하는 조건문에는 적용하지 않는다.
- 코드를 작성하기전 최상단에 아래 코드를 추가한다, {페이지명} 자리에 `## 페이지명` 에 써있는 값에 확장자 제거하여 입력한다.
```php
<?php

/**
 * @var array $data
 */
if (!isset($data)) {
    exit;
}
?>
<link rel="stylesheet" href="_view/{페이지명}/style.css">
```
- 코드 작성 후 최하단에 아래 코드를 추가한다, {페이지명} 자리에 `## 페이지명` 에 써있는 값에 확장자 제거하여 입력한다.
```php
<script type="module" src="_view/{페이지명}/script.js">
```
### style.css 파일 생성 규칙
- `style.css` 파일은 `view.php` 에 사용되는 css 코드 파일이다.
- font-weight 속성은 thin, normal, bold 사용 가능하다.
- 상위요소 css 와 겹치는 것을 막기위해 생성된 css의 모든 선택자는 `## 최상단 클래스명` class 선택자로 시작한다.
- 최상단 요소에 `position: relative;` css 값을 기본으로 추가한다.
- 아래 css 코드가 이미 전역으로 설정되어있다.
```css
* { margin: 0; padding: 0; box-sizing: border-box; font-family: "Noto Sans KR", sans-serif;}
```
#### 마지막 수정일
- 2026.10.15
#### 업로드 필요한 파일
- sample.css(선택사항)
- sample.html(선택사항)
- upload_db.md
- upload_ukp_php.md
