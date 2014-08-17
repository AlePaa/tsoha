<?php

require_once 'libs/common.php';

$data = array("title" => "Log in to Muistilista");

if (isset($_GET['noname'])) {
    $data['notify'] = "Please enter a username";
} else if (isset($_GET['nopwd'])) {
    $data['notify'] = "Please enter a password";
} else if (isset($_GET['loginfail'])) {
    $data['notify'] = "Invalid username or password";
} else if (isset($_GET['nologin'])) {
    $data['notify'] = "Need to be logged in to access page";
} else if (isset($_GET['logout'])) {
    $data['notify'] = "Bye!";
}

showView('loginview', $data);

