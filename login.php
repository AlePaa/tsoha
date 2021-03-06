<?php

require_once 'libs/common.php';
include_once 'libs/models/UserModel.php';

if (isset($_GET['login'])) {
    login();
} else if (isset($_GET['logout'])) {
    logout();
}

function login() {
    checkValidInput();
    $username = $_POST['username'];
    $userid = User::verifyLogin($username, $_POST['password']);
    if ($userid != NULL) {
        $_SESSION['logged'] = $userid;
        $_SESSION['name'] = $username;
        redirect('task.php?list');
    } else {
        showView('loginview', array('notify' => "Invalid username or password",
            'title' => 'login to Muistilista'));
        exit();
    }
}

function checkValidInput() {
    if (empty($_POST['username'])) {
        showView('loginview', array('notify' => "Please enter a username",
            'title' => 'login to Muistilista'));
        exit();
    }

    if (empty($_POST['password'])) {
        showView('loginview', array('notify' => "Please enter a password",
            'title' => 'login to Muistilista'));
        exit();
    }
}

function logout() {
    unset($_SESSION["logged"]);
    showView('loginview', array('notify' => "Bye!",
        'title' => 'login to Muistilista'));
    exit();
}
