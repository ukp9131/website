<?php
$dir = dirname(__FILE__);
require_once "{$dir}/../_ukp/class.ukp.php";
//옵션 설정 안한경우 기본값
if (!isset($option)) {
    $option = array();
}
//ukp 객체 생성
$ukp = new Ukp($option);
//global
$ukp_g = array(
    "dir" => "",        //실행한 파일 폴더
    "base" => "",       //실행한 파일명
    "file" => "",       //확장자 제거한 실행한 파일명
    "dir_view" => "",   //_view 폴더경로
    "lang" => "",       //언어
    "title" => ""       //title 태그 내용
);
$result = $ukp->input_current_php();
$ukp_g["dir"] = $result["dir"];
$ukp_g["base"] = $result["base"];
$ukp_g["file"] = $result["file"];
$ukp_g["dir_view"] = "{$dir}/_view";
$ukp_g["lang"] = "ko";
$ukp_g["title"] = "website";

