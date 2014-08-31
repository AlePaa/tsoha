<?php

require_once 'libs/common.php';
require_once 'libs/session.php';

$id = (int) $_POST['id'];

$task = Task::findTask($id);

if ($task == NULL) {
    
} else if (!isOwner($user)) {
    
} else {
    $task->setName($_POST['name']);
    $task->setDescription($_POST['description']);

    if ($task->isValid()) {
        $task->update();
    }
}