# php 함수설명 markdown 형식에 맞게 출력
## 함수
```php
```
## 프롬프트
- 함수 주석에서 require, @version 제거 후 빈공간 제거
- ```function``` 키워드 ```$ukp->``` 로 변경 후 함수 중괄호 끝나는 부분에 세미콜론 입력
- ```### 출력값``` 에 나와있는 내용처럼 백틱 4개로 감싸서 생성, 출력값 시작하자마자 나오는 주석은 ```## {함수명} ({버전날짜})```
- 입력값에 들여쓰기가 있더라도 출력값에는 들여쓰기를 없애주고 *로 시작하는 경우 맨앞에 공백한칸 추가해줘.
## 참고예제
### 입력값
```php
/**
 * - set, into, values 컬럼 생성
 * - escape인경우 키가 is
 * 
 * require  2026.01.29
 * @version 2026.01.29
 * 
 * @param  array $row_arr row 배열(escape인경우 키가 is)
 * @param  int   $depth   들여쓰기 깊이
 * @return array          row 정보
 * - `string [set]`     추가 set문
 * - `string [into]`    추가 into문
 * - `string [values]`  추가 values문
 * - `array  [binding]` 추가 binding문
 */
function db_create_row($row_arr = array(), $depth = 1)
```
### 출력값
````markdown
## db_create_row (2026.01.29)
```php
/**
 * - set, into, values 컬럼 생성
 * - escape인경우 키가 is
 * @param  array $row_arr row 배열(escape인경우 키가 is)
 * @param  int   $depth   들여쓰기 깊이
 * @return array          row 정보
 * - `string [set]`     추가 set문
 * - `string [into]`    추가 into문
 * - `string [values]`  추가 values문
 * - `array  [binding]` 추가 binding문
 */
$ukp->$db_create_row($row_arr = array(), $depth = 1);
```
````