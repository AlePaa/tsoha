<?php

require_once 'libs/common.php';
include 'libs/models/TaskModel.php';

$newTask = new Task();
$newTask->setName($_POST['name']);
$newTask->setDescription($_POST['description']);
$newTask->setPriority($_POST['priority']);

if ($newTask->isValid()) {
    $newTask->insertIntoDb($_SESSION['logged']);
    redirect('tasks.php');
} else {
    redirect('tasks.php');
}

