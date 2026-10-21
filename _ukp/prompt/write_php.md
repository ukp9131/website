# 요청사항
- `index.php` 파일을 생성해줘.
# 세부 요청사항
## 설정할 $data 변수
```php
$data = array(
    "code" => 0,  //1인경우 성공, 2이상인경우 실패
    "msg" => ""   //"성공" 또는 실패사유
);
```
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
- `index.php` 파일은 `$data` 배열에 값을 설정하고 전체 배열 값을 JSON 형태로 출력하는 파일이다.
- 데이터베이스 테이블 정보를 가지고 있는 변수는 업로드한 `upload_db.md` 파일 참고해줘.
- 업로드한 `upload_ukp_php.md` 파일에 나와있는 함수를 최대한 사용하여 작성해줘.
- php 코드만 생성하므로 코드 마지막에 `?>` 을 작성하지 않는다.
- `$data` 배열에 값을 설정하기 전에 PHP 코드 상단에 사용할 배열 변수들을 아래 예시와 같은 형태로 먼저 선언한다.
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
$option = array("api_bool" => true);
require_once dirname(__FILE__) . '/_.php';
```
#### 마지막 수정일
- 2026.10.15
#### 업로드 필요한 파일
- upload_db.md
- upload_ukp_php.md
