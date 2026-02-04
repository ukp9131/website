<?php
require_once dirname(__FILE__) . '/_.php';
require_once $global["dir_ukp"] . '/class.ukp.php';
$ukp = new Ukp();

//remap
//remap용 기본값 세팅을 위한 함수 선언
$data["remap_base"] = basename(__FILE__);
$data["remap_lang"] = "ko";
$data["remap_title"] = "php";
require_once $global["dir_view"] . '/_remap.php';