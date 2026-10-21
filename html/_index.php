<?php
/**
 * @var Ukp $ukp
 * @var array $ukp_g
 */
$option = array("api_bool" => true);
require_once dirname(__FILE__) . '/_.php';
//request
//data
$data = array(
    "code" => 1,        //1: 성공, 그 외: 실패
    "msg" => "성공"     //결과설명
);
echo $ukp->encode_json($data);
