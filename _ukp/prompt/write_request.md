# 입력받은 json 객체 또는 form 요소를 PHP 변수설정으로 변환 (2026.02.11)
## json 객체 또는 form 요소
```
```
## 규칙
- json 객체 인경우 최상위 레벨의 'Key'를 추출합니다.
- form 요소 인경우 `input`, `select`, `textarea` 등 값을 가질 수 있는 태그의 `name` 속성값을 추출합니다.
- PHP 변수명으로 사용할 수 없는 문자(하이픈 `-` 등)가 키값에 포함된 경우, 변수명에서는 언더스코어 `_`로 치환하세요. (예: `user-id` -> `$user_id`)
- HTML name이 `data[]`와 같은 배열 형태인 경우, 변수명에서는 `[]`를 제거하고 `$ukp->input_request()` 함수 두번째 파라미터 값을 true로 설정하세요.
- 데이터의 실제 값(value)은 무시하고 오직 키(name)만 변수화하세요.
- 설명 없이 오직 PHP 코드 블록만 출력하세요.
## 참고예제 (json)
### 입력값
```
{foo: "bar", hello: "world"}
```
### 출력값
```php
$foo = $ukp->input_request("foo");
$hello = $ukp->input_request("hello");
```
## 참고예제 (form)
### 입력값
```
<form>
    <input type="hidden" name="foo" value="bar">
    <select name="hello">
        <option value="world">
    </select>
    <input type="checkbox" name="agree_terms[]" value="y">
    <input type="submit" name="btn" value="Save">
</form>
```
### 출력값
```php
$foo = $ukp->input_request("foo");
$hello = $ukp->input_request("hello");
$agree_terms = $ukp->input_request("agree_terms", true);
```
