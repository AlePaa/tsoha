<?php

if (empty($_POST["username"])) {
    showView("login", array(
        'error' => "Login failed! You did not enter a username.",
    ));
}
$user = $_POST["username"];

if (empty($_POST["password"])) {
    showView("login", array(
        'user' => $user,
        'error' => "Login failed! You did not enter a password.",
    ));
}
$password = $_POST["password"];

if ($user == 'rakettimies' && password == 'nestekaasu') {
    header('Location: views/tasksview.php');
} else {
    showView("login", array(
        'user' => $user,
        'error' => "Login failed! Invalid username or password.", request
    ));
}