<?php
/**
 * @var Ukp $ukp
 * @var array $ukp_g
 */
require_once dirname(__FILE__) . '/_.php';
//request
//data
$data = array(
    "g_file" => ""
);
$data["g_file"] = $ukp_g["file"];
//remap
require_once $ukp_g["dir_view"] . '/_remap/index.php';
