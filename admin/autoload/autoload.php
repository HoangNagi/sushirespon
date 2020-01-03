<?php
    // Những phần chung để xài cho tất cả các trang đều bỏ vào đây

    session_start();

    // Lấy dữ liệu từ file Database.php, Function.php
    require_once __DIR__. "/../../libraries/Database.php";
    require_once __DIR__. "/../../libraries/Function.php";

    $db = new Database;

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/sushiweb/public/uploads/");
?>