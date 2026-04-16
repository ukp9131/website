<?php
$dir = dirname(__FILE__);
require_once "{$dir}/../_ukp/class.ukp.php";
//옵션 분기
$option = array();
$basename = basename($_SERVER["SCRIPT_FILENAME"]);
if ($basename == "_.php") {
    $option["session_bool"] = false;
} else if (substr($basename, 0, 1) == "_") {
    $option["api_bool"] = true;
}
//ukp 객체 생성
$ukp = new Ukp($option);
//전역변수 설정
$global = array();
$static_dir = array(
    "css" => "{$dir}/../css",
    "js" => "{$dir}/../js"
);
$global["dir_css"] = $static_dir["css"];
$global["dir_js"] = $static_dir["js"];
$global["dir_view"] = "{$dir}/../view";
$info = $ukp->input_current_php();
$global["dir_current"] = $info["dir"];
$global["dir_asset"] = "./asset";
$global["dir_upload"] = "./upload";
$global["base"] = $info["base"];
$global["lang"] = "ko";
$global["title"] = "website";
//빈 data배열 선언
$data = array();
//css, js 파일 출력
if (basename(__FILE__) == $info["base"]) {
    $charset = "utf-8";
    $param = "file";
    //file 요청 안한경우
    if (!isset($_GET[$param])) {
        header("HTTP/1.1 404 Not Found");
        exit;
    }
    //파일명만 추출
    $path = parse_url($_GET[$param], PHP_URL_PATH);
    $base = basename($path);
    //확장자 검증
    $ext = strtolower(pathinfo($base, PATHINFO_EXTENSION));
    $allow_ext = array("css", "js");
    if (!in_array($ext, $allow_ext)) {
        header("HTTP/1.1 404 Not Found");
        exit;
    }
    //파일존재 검증
    $file = $static_dir[$ext] . "/" . $base;
    if (!file_exists($file)) {
        header("HTTP/1.1 404 Not Found");
        exit;
    }
    header("Content-Type: text/" . ($ext == "css" ? "css" : "javascript") . "; charset={$charset}");
    header('Content-Length: ' . filesize($file));
    $last_mtime = filemtime($file);
    $etag = '"' . md5($last_mtime . $file) . '"';
    header("ETag: {$etag}");
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $last_mtime) . ' GMT');
    //Last-Modified 검증
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
        $if_msince = strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);
        if ($if_msince >= $last_mtime) {
            header('HTTP/1.1 304 Not Modified');
            exit;
        }
    }
    //ETag 검증
    if (isset($_SERVER["HTTP_IF_NONE_MATCH"])) {
        $if_nmatch = trim($_SERVER["HTTP_IF_NONE_MATCH"]);
        if ($if_nmatch == $etag) {
            header('HTTP/1.1 304 Not Modified');
            exit;
        }
    }
    //버퍼 제거 후 출력
    while (ob_get_level() > 0) {
        ob_end_clean();
    }
    readfile($file);
    exit;
}
