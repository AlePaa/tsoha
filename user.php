<?php

require_once 'libs/common.php';
require_once 'libs/models/UserModel.php';

if (isset($_GET['new'])) {
    showView('newuserform');
} elseif (isset($_GET['create'])) {
    createUser();
} elseif (isset($_GET['delete'])) {
    deleteUser();
}

function createUser() {
    $pw = s($_POST['password']);
    $pwc = s($_POST['passwordconfirm']);
    $user = s($_POST['username']);

    if (empty($user)) {
        showView('newuserform', array('notify' => 'Please enter a username'));
    }
    // elseif (User::exists($user)) {
    //     showView('newuserform', array('notify' => 'Username already taken'));
    // }
    elseif (empty($pw) || empty($pwc) || !($pw == $pwc)) {
        showView('newuserform', array('notify' => 'password fields must match and not be empty'));
    } else {
        $newuser = new User();
        $newuser->setUsername($user);
        $newuser->setPassword($pw);
        $newuser->insertIntoDb();
        showView('login', array('notify' => 'Account creation success'));
    }
}

function deleteUser() {
    $id = $_SESSION['logged'];
    unset($_SESSION["logged"]);
    User::delete($id);
    redirect('index.php');
}
