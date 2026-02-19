<?php

/**
 * @version 2026.02.19
 * @author ukp
 */

$config["parking_start_dt"] = "";
$config["parking_end_dt"] = "";

$config["charset"] = "utf-8";
$config["time_zone"] = "Asia/Seoul";
$config["session_limit_time"] = 0;
$config["log_limit_day"] = 7;
$config["temp_limit_day"] = 7;

$config["table"] = array(
    array(
        "prefix" => "",
        "delete_flag" => "",
        "insert_date" => array(),
        "insert_time" => array(),
        "insert_dt" => array(),
        "update_date" => array(),
        "update_time" => array(),
        "update_dt" => array()
    )
);
$config["db"] = array(
    "default" => array(
        "host" => "",
        "username" => "",
        "password" => "",
        "database" => "",
        "port" => "",
        "charset" => "",
        "time_zone" => "+09:00",
        "base64_password_bool" => false,
        "table" => array()
    )
);
$config["api_url"] = "";
$config["api_token"] = "";