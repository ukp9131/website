# 요청사항
- PHP `$arr` 변수 생성
## 입력값
```php
$database = "";
$prefix = "";
```
```txt
```
### 규칙
- `[]` 이 아닌 `array()` 를 이용한 배열을 생성해줘.
- 테이블명 에서 접두어를 뺀 값으로 배열 생성.
### 참고예제
- 입력값
```php
$database = "default";
$prefix = "tb_";
```
```txt
tb_foo
tb_bar
tb_hello_word
```
```php
$database = "test";
$prefix = "log_";
```
```txt
log_member
log_ip
log_useragent
```
- 출력값
```php
$arr = array(
    "default" => array(
        "foo",
        "bar",
        "hello_word"
    ),
    "test" => array(
        "member",
        "ip",
        "useragent"
    )
);
```
#### 마지막 수정일
- 2026.10.15
#### 입력값 text 추출방법
- DBeaver 에서 `show tables` 쿼리 결과 csv로 다운로드 후 메모장으로 열어서 복사 붙여넣기
