<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/TaskModel.php';

$newTask = new Task();
$newTask->setName($_POST['name']);
$newTask->setDescription($_POST['description']);
$newTask->setPriority($_POST['priority']);

if ($newTask->isValid()) {
    $newTask->insertIntoDb($_SESSION['logged']);
    redirect('tasks.php');
} else {
    showView('newtaskform', $newTask->getErrors());
}