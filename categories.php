<?php

require_once 'libs/common.php';
include'libs/models/CategoryModel';
include'libs/models/PriorityModel';

if (checkLogin()) {
    $user = $_SESSION['logged'];
    showView('categoriesview');
} else {
    redirect('index.php?nologin');
} 