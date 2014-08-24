<?php

require_once 'libs/common.php';

if (checkLogin()) {
    $user = $_SESSION['logged'];
    showView('newtaskform');
} else {
    redirect('index.php?nologin');
}