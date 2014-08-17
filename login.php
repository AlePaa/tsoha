<?php

require_once 'libs/common.php';
include 'libs/models/UserModel.php';

if (isset($_GET['login'])) {
    login();
} else if (isset($_GET['logout'])) {
    logout();
}

function login() {
    checkValidInput();
    $userid = User::verifyLogin($_POST['username'], $_POST['password']);
    if ($userid != NULL) {
        $_SESSION['logged'] = $userid;
        redirect('tasks.php');
    } else {
        redirect('index.php?loginfail');
    }
}

function checkValidInput() {
    if (empty($_POST['username'])) {
        redirect("index.php?noname");
    }

    if (empty($_POST['password'])) {
        redirect("index.php?nopwd");
        exit();
    }
}

function logout() {
    unset($_SESSION["logged"]);
    redirect('index.php?logout');
}
