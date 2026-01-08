# HTML, CSS 코드 생성
## 프롬프트
- 
## 규칙
- 아래 css 가 기본적으로 설정되어있다.
```css
* { margin: 0; padding: 0; box-sizing: border-box; }
```
- ```body``` 태그 내 html 요소를 생성하는 것이므로 body 태그로 시작하지 않는다. 
- 최상단 태그는 ```ukpb__content``` 클래스를 가지고 시작한다.
- 상위요소 css 와 겹치는 것을 막기위해 생성된 css의 모든 선택자는 ``` ukpb__content > ``` 로 시작한다.
- 모바일 레이아웃을 기본으로 한 반응형으로 작성한다.