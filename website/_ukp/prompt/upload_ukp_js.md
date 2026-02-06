# 자바스크립트 ukp 함수 리스트 (2026.02.06)
## ajax (2025.01.17)
```js
/**
 * - ajax 전송
 * - Content-Type: multipart/form-data
 * @param {string}        url      url
 * @param {object|string} data     formdata객체, form요소 셀렉터, json객체 가능
 * @param {function}      com_func 완료함수, 첫번째 매개변수에 결과(text) 전달
 * @param {function}      pro_func 진행함수, 첫번째 매개변수에 퍼센트숫자 전달
 */
ukp.ajax(url, data, com_func, pro_func = null);
```
## decode_base64 (2025.03.06)
```js
/**
 * - base64 디코딩
 * @param   {string} text base64 문자열
 * @returns {string}      문자열
 */
ukp.decode_base64(text);
```
## add_class (2025.01.17)
```js
/**
 * - 클래스 값 추가
 * @param   {object|string} target     요소 또는 셀렉터
 * @param   {string}        class_name 추가할 클래스명
 */
ukp.add_class(target, class_name);
```
## has_class (2025.01.17)
```js
/**
 * - 클래스 값 가지고 있는지 확인
 * - 쿼리셀렉터인경우 첫번째 요소만 확인
 *
 * @param   {object|string} target     요소 또는 셀렉터
 * @param   {string}        class_name 확인할 클래스명
 * @returns {boolean}                  true: 클래스가 있음, false: 클래스가 없음
 */
ukp.has_class(target, class_name);
```
## remove_class (2025.01.17)
```js
/**
 * - 클래스 값 삭제
 * @param   {object|string} target     요소 또는 셀렉터
 * @param   {string}        class_name 삭제할 클래스명
 */
ukp.remove_class(target, class_name);
```
## toggle_class (2026.02.04)
```js
/**
 * - 클래스 값 없는경우 추가, 있는경우 삭제
 * @param   {object|string} target     요소 또는 셀렉터
 * @param   {string}        class_name 클래스명
 */
ukp.toggle_class(target, class_name);
```
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
## each (2025.01.17)
```js
/**
 * - 배열 또는 객체 반복
 * - ukp 내에서 forEach 대신 이 함수 사용
 * @param {object} arr 배열 또는 객체
 * @param {function} fun 반복할 함수, false 리턴시 break, 첫번째 매개변수: 값, 두번째 매개변수: 키
 */
ukp.each(arr, fun);
```
## find (2024.11.07)
```js
/**
 * - querySelector
 * - ukp 내에서 document.querySelector 대신 이 함수 사용
 * @param   {string} selector 셀렉터
 * @returns {object}          html 요소객체
 */
ukp.find(selector);
```
## find_all (2024.11.07)
```js
/**
 * - querySelectorAll
 * - ukp 내에서 document.querySelectorAll 대신 이 함수 사용
 * @param   {string} selector 셀렉터
 * @returns {array}           html 요소객체리스트
 */
ukp.find_all(selector);
```
## http_build_query (2026.02.06)
```js
/**
 * - json 객체를 쿼리스트링으로 변환
 * - `{foo:"bar", hi:"hello"}` -> `foo=bar&hi=hello`
 * @param {object} json json 객체
 * @returns {string} 쿼리스트링
 */
ukp.http_build_query(json);
```
## on (2025.01.17)
```js
/**
 * - addEventListener
 * - ukp 내에서 addEventListener 대신 이 함수 사용
 * @param {string}        event_name 이벤트 유형
 * @param {object|string} target     대상객체 또는 쿼리셀렉터
 * @param {function}      fun        실행함수, 첫번째 매개변수에 이벤트객체
 */
ukp.on(event_name, target, fun);
```
## ready (2025.01.17)
```js
/**
 * - window ready
 * @param {function} fun 실행함수, 첫번째 매개변수에 이벤트객체
 */
ukp.ready(fun);
```
## get_storage (2026.02.04)
```js
/**
 * - 스토리지 불러오기
 * - 현지시간 기준으로 만료
 * - 값은 문자열로 강제변경
 * 
 * @param   {string}        key 키, null인경우 전체 스토리지
 * @returns {string|object}     값, 없는 키인경우 공백문자열
 */
ukp.get_storage(key = null);
```
## set_storage (2026.02.04)
```js
/**
 * - 스토리지 저장
 * - 현지시간 기준으로 저장
 * - 값은 문자열로 강제변경
 * @param {string} key           키
 * @param {string} value         값
 * @param {string} expiration_dt 만기일시, 공백인경우 영구, "session" 인경우 세션스토리지
 */
ukp.set_storage(key, value, expiration_dt = "");
```
## unset_storage (2026.02.04)
```js
/**
 * - 스토리지 삭제
 * @param {string} key 키, null인경우 전체 스토리지 삭제
 */
ukp.unset_storage(key = null);
```

