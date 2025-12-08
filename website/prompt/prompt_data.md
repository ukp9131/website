# Print JSON using PHP
## Prompt
- Login with id and pw value, and return token value.
## Input
- id: ID
- pw: Password
## Output
- code: A value of 1 means success; any other value means failure.
- msg: Contains detailed descriptions of the ```code``` variable.
- token: Unique string for identity user.
## Rule
- Create code between ```$ukp = new Ukp();``` and ```echo $ukp->encode_json($data);``` in ```# Example``` section.
- Add data in ```$data``` array.
## Functions
```php
/**
 * Get $_REQUEST value  
 *   
 * @param  string       $key        Array key. If key is empty, return $_REQUEST variable
 * @param  bool         $array_bool Ignore this value If key is empty. true: array, falue: string
 * @return string|array             Return request value.
 */
$ukp->input_request($key = "", $array_bool = false);
/**
 * Get value of table  
 *   
 * @param  string $table             Table name
 * @param  array  $option            Describe how to get value from the table.  
 *                [where=array()]            This is array that key is column name and value is for where clause.
 *                [or_bool=]          How to link where, true: or, false: and
 *                [order_by]         정렬 배열(기본정렬인경우 빈배열)  
 *                [limit]            표시갯수  
 *                [start]            표시 시작점, limit 있는경우에만  
 *                [delete_flag_bool] true(기본) - 삭제여부 사용, false - 삭제여부 사용안함  
 *                [info_bool]        true: info, false(기본): list  
 *                [where_table_bool] true(기본): where 문에 테이블명 또는 축약테이블명 필수, false: 필수아님
 * @param  string $database          사용 데이터베이스
 * @return array                     테이블 리스트
 */
$ukp->solution_table_list($table, $option = array(), $database = "default");
```
## Databases
```php
```
## Example
```php
<?php
require_once dirname(__FILE__) . '/_.php';
require_once $global["ukp_dir"] . '/class.ukp.php';
$ukp = new Ukp();
// Write code in here
echo $ukp->encode_json($data);
```