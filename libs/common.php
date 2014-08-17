<?php

session_start();
require_once 'dbconnection.php';

function showView($page, $data = array()) {
    $data = (object) $data;
    require 'views/template.php';
}

function redirect($page) {
    header("Location: $page");
    exit();
}

function checkLogin() {
    if (isset($_SESSION['logged'])) {
        return true;
    } else {
        return false;
    }
}
