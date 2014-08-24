<?php

require_once 'libs/common.php';

if (checkLogin()) {
    $user = $_SESSION['logged'];
    showView('prioritiesview');
} else {
    redirect('index.php?nologin');
}