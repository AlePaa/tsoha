<?php

require_once 'libs/common.php';
include'libs/models/TaskModel';
include'libs/models/CategoryModel';
include'libs/models/PriorityModel';

if (checkLogin()) {
    $user = $_SESSION['logged'];
    showView('tasksview');
} else {
    redirect('index.php?nologin');
}
