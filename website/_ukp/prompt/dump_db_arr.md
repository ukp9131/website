# PHP ```$arr``` 변수 생성 (2026.02.04)
## 입력값
```php
$database = "";
$prefix = "";
```
```txt
```
## 프롬프트
- 테이블명 에서 접두어를 뺀 값으로 배열 생성.
## 참고예제
### 입력값
```php
$database = "test";
$prefix = "tb_";
```
```txt
tb_foo
tb_bar
tb_hello_word
```
### 출력값
```php
$arr = array(
    "test" => array(
        "foo",
        "bar",
        "hello_word"
    )
);
```