<?php
require_once dirname(__FILE__) . '/_.php';
require_once $global["ukp_dir"] . '/class.ukp.php';
$ukp = new Ukp();

//remap
//remap용 기본값 세팅을 위한 함수 선언
$data["remap_lang"] = "ko";
$data["remap_title"] = "php";
$data["remap_base"] = basename(__FILE__);
require_once $global["view_dir"] . '/_remap.php';