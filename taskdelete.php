<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/TaskModel.php';

$taskid = $_GET['id'];

$task = Task::findTask($taskid);

if ($task->isOwner($_SESSION['logged'])) {
    $task->delete();
    redirect('tasks.php');
} else {
    redirect('tasks.php');
}