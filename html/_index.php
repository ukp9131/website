<?php
require_once dirname(__FILE__) . '/_.php';

$data["code"] = 1;
$data["msg"] = "성공";
echo $ukp->encode_json($data);