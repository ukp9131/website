<?php
/**
 * @var Ukp $ukp
 * @var array $ukp_g
 */
require_once dirname(__FILE__) . '/_.php';
//request
//data
$data = array(
    "foo" => ""     //sample
);
$data["foo"] = "bar";
//remap
require_once $ukp_g["dir_view"] . '/_remap/index.php';
