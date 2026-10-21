<?php

/**
 * @version 2026.02.19
 * @author ukp
 * @var Ukp $this
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
        "host" => $this->custom_env("DB_DEFAULT_HOST"),
        "username" => $this->custom_env("DB_DEFAULT_USERNAME"),
        "password" => $this->custom_env("DB_DEFAULT_PASSWORD"),
        "database" => $this->custom_env("DB_DEFAULT_DATABASE"),
        "port" => $this->custom_env("DB_DEFAULT_PORT"),
        "charset" => $this->custom_env("DB_DEFAULT_CHARSET"),
        "time_zone" => "+09:00",
        "base64_password_bool" => false,
        "prefix" => "",
        "delete_flag" => "",
        "insert_date" => array(),
        "insert_time" => array(),
        "insert_dt" => array(),
        "update_date" => array(),
        "update_time" => array(),
        "update_dt" => array(),
        "table" => array()
    )
);

$config["api_url"] = $this->custom_env("API_URL");
$config["api_token"] = $this->custom_env("API_TOKEN");
