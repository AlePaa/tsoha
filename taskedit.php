<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/TaskModel.php';

$taskid = $_GET['id'];

if (!is_numeric($taskid)) {
    notFound();
} else {
    $task = Task::findTask($taskid);
}

if (!$task == NULL && $task->isOwner($_SESSION['logged'], $taskid)) {
    showView('taskform', array('title' => 'Edit Task',
        'task' => $task,
        'function' => "taskupdate.php?id=$taskid",
        'name' => htmlspecialchars($task->getName()),
        'desc' => htmlspecialchars($task->getDescription()),
        'dead' => htmlspecialchars($task->getDeadline()),
        'header' => 'Editing Task',
        'button' => 'Update'));
} else {
    notFound();
}

function notFound() {
    showView("tasks", array('notify' => "Task not found"));
}
