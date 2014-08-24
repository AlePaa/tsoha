<?php

require_once 'libs/common.php';
require 'libs/models/TaskModel.php';

if (checkLogin()) {
    $user = $_SESSION['logged'];
    $tasks = Task::getUserTasks($user);
    showView('tasksview', array('tasks' => $tasks));
} else {
    redirect('index.php?nologin');
}
