<?php

function showView($page, $data = array()) {
    $data = (object) $data;
    require 'views/template.php';
}

function redirect($page) {
    header("Location: $page");
    exit();
}

function checkLogin() {
    if (1) {
        return true;
    } else {
        redirect('index.php?nologin');
    }
}
