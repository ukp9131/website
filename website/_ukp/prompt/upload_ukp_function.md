# ukp 함수 리스트
```php
/**
 * - 입력받은 where 배열에 맞는 sql where 쿼리문 생성
 * - 테이블명, 필드명, 연산자는 소문자로 강제 변경
 * - 필드명에 백틱(`) 입력하지 않아도 자동입력됨, where 배열 설명에는 백틱 생략되어있음
 * - where 배열 설명
 * - 기본적으로 배열 키는 컬럼명, 값은 컬럼값으로 구성된다
 * + `array("tb_name.foo" => "bar")` -> where: `tb_name.foo = ?`, binding: `array("bar")`
 * - 배열 키가 여러개인 경우 `$or_bool` 값에 따라 조건문이 이어진다
 * + `array("tb_name.foo" => "bar", "hello" => "world")`
 * + `$or_bool=true` -> where: `tb_name.foo = ? or hello = ?`, binding: `array("bar", "world")`
 * + `$or_bool=false` -> where: `tb_name.foo = ? and hello = ?`, binding: `array("bar", "world")`
 * - 연산자는 컬럼명 다음에 공백 한칸 추가 후 작성 가능하며 생략시 `=` 으로 처리된다
 * + `array("foo >" => "10")` -> where: `foo > ?`, binding: `array("10")`
 * - 연산자가 between 인경우 값에오는 배열값이 순서대로 입력된다
 * + `array("foo between" => array("1", "10"))` -> where: `foo between ? and ?`, binding: `array("1", "10")`
 * - 연산자가 in 이면서 값이 배열인경우 배열값이 순서대로 입력된다
 * + `array("foo in" => array("1", "10"))` -> where: `foo in(?, ?)`, binding: `array("1", "10")`
 * - 연산자가 is 이면서 값이 null 또는 not null인경우 아래와 같이 생성된다
 * + `array("foo is" => "null", "hello is" => "not null")` -> where: `foo is null and hello is not null`, binding: `array()`
 * - 연산자가 is 이면서 값이 null 또는 not null이 아닌경우 값이 escape 처리되지 않고 그대로 입력된다
 * - 사용할 연산자는 is 다음에 공백 한칸 추가 후 작성 가능하며 생략시 `=` 으로 처리된다
 * + `array("foo is" => "now()", "hello is <" => "abs('10')")` => where: `foo = now() and hello < abs('10')`, binding: `array()`
 * - 배열 키가 중복되는 조건문은 아래와 같이 설정할 수 있다
 * + `array(array("foo >" => "1"), array("foo <" => "10"))` -> where: `foo > ? and foo < ?`, binding: `array("1", "10")`
 * - 서브쿼리가 존재하는 경우 다음과같이 처리된다
 * + `array(array("id" => "foo@bar.com", "email" => "foo@bar.com"), "pw" => "1234")`
 * + `$or_bool=true` -> where: `(id = ? and email = ?) or pw = ?`, binding: `array("foo@bar.com", "foo@bar.com", "1234")`
 * + `$or_bool=false` -> where: `(id = ? or email = ?) and pw = ?`, binding: `array("foo@bar.com", "foo@bar.com", "1234")`
 * - dot_bool 은 모든 키에 점이 포함된 경우에만 true로 반환되고 테이블명 또는 alias를 모두 입력하였는지 검증용으로 사용된다
 * + `array("tb.foo" => "bar", "mb.hello" => "world")` -> true
 * + `array("tb.foo" => "bar", "hello" => "world")` -> false
 * @param  array  $where_arr where 배열
 * @param  bool   $or_bool   true: or(서브쿼리 and), false: and(서브쿼리 or)
 * @return array             where 정보
 * - `string [where=""]`        where 쿼리
 * - `array  [binding=array()]` binding 배열
 * - `bool   [dot_bool=true]`   true 인경우 모든 키에 점 포함
 */
$ukp->db_create_where($where_arr = array(), $or_bool = false);
/**
 * - 테이블 삭제(1개)
 * - delete_flag 변경시 update_dt도 갱신
 * - where 설정 안한경우 아무것도 삭제 안됨
 * @param  string $table    테이블명
 * @param  array  $option   옵션
 * - `array  [where=array()]`    삭제 조건문, 키는 컬럼명, 값은 컬럼값
 * - `bool   [or_bool=false]`    true: where or문, false: where and문
 * - `bool   [force_bool=false]` true: 삭제, false(기본값): delete_flag 변경, delete_flag 없는경우 force_bool true로 변경
 * - `string [prefix=null]`      테이블 접두어, 세팅 안한경우 설정값
 * - `string [delete_flag=null]` 삭제여부컬럼, 세팅 안한경우 설정값
 * - `array  [update_date=null]` 수정일, 세팅 안한경우 설정값
 * - `array  [update_time=null]` 수정시, 세팅 안한경우 설정값
 * - `array  [update_dt=null]`   수정일시, 세팅 안한경우 설정값
 * @param  string $database 사용할 db명
 * @return int              affected_rows(수정 안된경우 0)
 */
$ukp->db_delete($table, $option = array(), $database = "default");
/**
 * - 테이블 인서트(1개)
 * @param  string $table    테이블명
 * @param  array  $option   옵션
 * - `array  [row=array()]`      입력할 row, db_create_row 사용
 * - `array  [where=array()]`    중복 조건문, 키는 컬럼명, 값은 컬럼값
 * - `bool   [or_bool=false]`    true: 중복체크 where or문, false: 중복체크 where and문
 * - `string [prefix=null]`      테이블 접두어, 세팅 안한경우 설정값
 * - `array  [insert_date=null]` 입력일, 세팅 안한경우 설정값
 * - `array  [insert_time=null]` 입력시, 세팅 안한경우 설정값
 * - `array  [insert_dt=null]`   입력일시, 세팅 안한경우 설정값
 * - `array  [update_date=null]` 수정일, 세팅 안한경우 설정값
 * - `array  [update_time=null]` 수정시, 세팅 안한경우 설정값
 * - `array  [update_dt=null]`   수정일시, 세팅 안한경우 설정값
 * @param  string $database 사용할 db명
 * @return int              insert_id(입력 안된경우 0)
 */
$ukp->db_insert($table, $option = array(), $database = "default");
/**
 * - cnt 쿼리 결과
 * - db/cnt 폴더 내 {$database}/{$table}.sql 파일 sql 사용
 * - delete_flag 설정 안한경우 delete_flag_bool 무시함
 * @param  string $table    테이블명
 * @param  array  $option   옵션  
 * - array  `[where=array()]`         where문, 키는 컬럼명, 값은 컬럼값
 * - bool   `[or_bool=false]`         true: where or문, false: where and문
 * - bool   `[delete_flag_bool=true]` true - 삭제여부 사용, false - 삭제여부 사용안함, 삭제여부는 y, n 값으로 판단
 * - bool   `[where_table_bool=true]` true 인경우 where 문에 축약테이블명 필수, ex) array("`st`.`field`" => "value")
 * - string `[prefix=null]`           테이블 접두어, 세팅 안한경우 설정값
 * - string `[delete_flag=null]`      삭제여부 컬럼, 세팅 안한경우 설정값
 * @param  string $database 사용 데이터베이스
 * @return array            쿼리결과 배열, 배열 키가 컬럼명이고 값이 컬럼값인 1차원 배열
 */
$ukp->db_select_cnt($table, $option = array(), $database = "default");
/**
 * - list 쿼리 결과
 * - db/list 폴더 내 {$database}/{$table}.sql 파일 sql 사용
 * - delete_flag 설정 안한경우 delete_flag_bool 무시함
 * @param  string $table    테이블명
 * @param  array  $option   옵션
 * - `array  [where=array()]`         where문, 키는 컬럼명, 값은 컬럼값
 * - `bool   [or_bool=false]`         true: where or문, false: where and문
 * - `array  [order_by=array()]`      정렬 배열(기본정렬인경우 빈배열)
 * - `int    [limit]`                 표시갯수
 * - `int    [start]`                 표시 시작점, limit 있는경우에만
 * - `bool   [delete_flag_bool=true]` true - 삭제여부 사용, false - 삭제여부 사용안함, 삭제여부는 y, n 값으로 판단
 * - `bool   [info_bool=false]`       true: 하나의 row 배열 반환, false: 다중 row 배열 반환
 * - `bool   [where_table_bool=true]` true 인경우 where 문에 축약테이블명 필수, ex) array("`st`.`field`" => "value")
 * - `string [prefix=null]`           테이블 접두어, 세팅 안한경우 설정값
 * - `string [delete_flag=null]`      삭제여부 컬럼, 세팅 안한경우 설정값
 * @param  string $database 사용 데이터베이스
 * @return array            쿼리결과 배열
 * - info_bool 값이 true 인경우 배열 키가 컬럼명이고 값이 컬럼값인 1차원 배열 반환
 * - info_bool 값이 false 인경우 1차원 배열 리스트(2차원 배열)를 반환
 */
$ukp->db_select_list($table, $option = array(), $database = "default");
/**
 * - 테이블 업데이트(1개)
 * - add_where 설정 안한경우 중복체크 안함
 * @param  string $table    테이블명
 * @param  array  $option   옵션
 * - `array  [row=array()]`       수정할 row, db_create_row 사용
 * - `array  [where=array()]`     수정 조건문(중복체크 하는경우 기본키 필수), 키는 컬럼명, 값은 컬럼값
 * - `bool   [or_bool=false]`     true: where or문, false: where and문
 * - `string [primary=""]`        기본키 컬럼명(공백인경우 중복체크 안함)
 * - `array  [add_where=array()]` 중복체크 조건문(없는경우 중복체크 안함), 키는 컬럼명, 값은 컬럼값
 * - `bool   [add_or_bool=false]` true: 중복체크 where or문, false: 중복체크 where and문
 * - `string [prefix=null]`       테이블 접두어, 세팅 안한경우 설정값
 * - `array  [update_date=null]`  수정일, 세팅 안한경우 설정값
 * - `array  [update_time=null]`  수정시, 세팅 안한경우 설정값
 * - `array  [update_dt=null]`    수정일시, 세팅 안한경우 설정값
 * @param  string $database 사용할 db명
 * @return int              affected_rows(수정 안된경우 0)
 */
$ukp->db_update($table, $option = array(), $database = "default");
/**
 * - JSON 디코딩
 * @param  string $json JSON형태의 문자열
 * @return array        배열
 */
$ukp->decode_json($json);
/**
 * - JSON 인코딩
 * @param  array  $arr 배열
 * @return string      JSON형태의 문자열
 */
$ukp->encode_json($arr);
/**
 * - 세션 값 저장
 * @param string $key   키
 * @param string $value 값
 */
$ukp->session_set($key, $value);
/**
 * - 세션 값 제거
 * - `$key` 값이 null 인경우 전체 제거
 * @param string $key
 */
$ukp->session_unset($key = null);
/**
 * - mysql password 함수
 * @param  string $pw  비밀번호
 * @param  bool   $old old_password 여부
 * @return string
 */
$ukp->common_mysql_password($pw, $old = false);
```