<?php

require_once 'libs/common.php';
include'libs/models/PriorityModel';

if (checkLogin()) {
    $user = $_SESSION['logged'];
    showView('prioritiesview');
} else {
    redirect('index.php?nologin');
}