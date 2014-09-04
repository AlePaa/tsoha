<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/TaskModel.php';

$id = (int) $_GET['id'];

$task = Task::findTask($id);

if ($task == NULL) {
    showView('');
} else if (!$task->isOwner($user, $id)) {
    
} else {
    $task->setName($_POST['name']);
    $task->setDescription($_POST['description']);
    $task->setDeadline($_POST['deadline']);

    if ($task->isValid()) {
        $task->update();
        redirect('tasks.php');
    }
}