```php
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
 * - request
 * @param  string       $key        키, 공백인경우 배열전체
 * @param  bool         $array_bool 반환값형태, true - 배열, false - 문자열
 * @return string|array
 */
$ukp->input_request($key = "", $array_bool = false);
```