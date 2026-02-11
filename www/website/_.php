<?php
$global = array();
$global["dir_ukp"] = dirname(__FILE__) . '/../../website/_ukp';
$global["dir_css"] = dirname(__FILE__) . '/../../website/css';
$global["dir_js"] = dirname(__FILE__) . '/../../website/js';
$global["dir_view"] = dirname(__FILE__) . '/../../website/view';
//css, js 파일 출력
if (realpath(__FILE__) == realpath($_SERVER["SCRIPT_FILENAME"])) {
    $charset = "utf-8";
    //file 요청 안한경우
    if (!isset($_GET["file"])) {
        header("HTTP/1.1 404 Not Found");
        exit;
    }
    //파일명만 추출
    $path = parse_url($_GET["file"], PHP_URL_PATH);
    $base = basename($path);
    //확장자 검증
    $ext = strtolower(pathinfo($base, PATHINFO_EXTENSION));
    $allow_ext = array("css", "js");
    if (!in_array($ext, $allow_ext)) {
        header("HTTP/1.1 404 Not Found");
        exit;
    }
    //파일존재 검증
    $file = $global["dir_{$ext}"] . "/" . $base;
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
    if (ob_get_level()) {
        ob_end_clean();
    }
    readfile($file);
    exit;
}
$data = array();