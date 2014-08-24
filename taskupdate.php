<?php

$id = (int) $_POST['id'];

$task = Task::findTask($id);
$user = $_SESSION('logged');

if ($task == NULL) {
    
} else if (!isOwner($user)) {
    
} else {
    $task->setName($_POST['name']);
    $task->setDescription($_POST['description']);

    if ($task->isValid()) {
        $task->update();
    }
}