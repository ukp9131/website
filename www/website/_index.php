<?php
require_once dirname(__FILE__) . '/_.php';
require_once $global["ukp_dir"] . '/class.ukp.php';
$ukp = new Ukp(array("api_bool" => true));

$data["code"] = 1;
$data["msg"] = "성공";
echo $ukp->encode_json($data);