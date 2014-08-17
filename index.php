<?php

require_once 'libs/common.php';

$data = array("title" => "Log in to Muistilista");

if (isset($_GET['noname'])) {
    $data['error'] = "Please enter a username";
} else if (isset($_GET['nopwd'])) {
    $data['error'] = "Please enter a password";
} else if (isset($_GET['loginfail'])) {
    $data['error'] = "Invalid username or password";
} else if (isset($_GET['nologin'])) {
    $data['error'] = "Need to be logged in to access page";
}

showView('loginview', $data);

