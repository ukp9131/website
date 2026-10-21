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
$global = array();
