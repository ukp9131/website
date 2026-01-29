# 자바스크립트 ukp 함수 리스트
## css (2025.01.17)
```js
/**
 * - 태그내 style 속성 변경
 * @param {object|string} target 대상객체 또는 쿼리셀렉터
 * @param {string} key css 속성
 * @param {string} value 속성값, 없거나 공백인경우 해제
 */
ukp.css(target, key, value = "");
```
## ready (2025.01.17)
```js
/**
 * - window ready
 * @param {function} fun 실행함수, 첫번째 매개변수에 이벤트객체
 */
ukp.ready(fun);
```
