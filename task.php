<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/TaskModel.php';

if (isset($_GET['list'])) {
    listTasks($user);
}
if (isset($_GET['new'])) {
    newTask();
} else if (isset($_GET['create'])) {
    createTask();
} else if (isset($_GET['edit'])) {
    editTask();
} else if (isset($_GET['update'])) {
    updateTask($user);
} else if (isset($_GET['delete'])) {
    deleteTask();
}

function listTasks($user) {
    $tasks = Task::getUserTasks($user);
    showView('tasksview', array('tasks' => $tasks,
        'title' => "Tasks"));
}

function newTask() {
    showView('taskform', array('title' => 'Create new Task',
        'function' => 'task.php?create',
        'name' => '',
        'desc' => '',
        'dead' => '',
        'header' => 'Create New Task',
        'button' => 'Create'));
}

function createTask() {
    $newTask = new Task();
    $newTask->setName($_POST['name']);
    $newTask->setDescription($_POST['description']);
    $newTask->setPriority($_POST['priority']);
    $newTask->setDeadline($_POST['deadline']);

    if ($newTask->isValid()) {
        $newTask->insertIntoDb($_SESSION['logged']);
        redirect('task.php?list');
    } else {
        showView('newtaskform', $newTask->getErrors());
    }
}

function editTask() {
    $taskid = $_GET['id'];

    if (!is_numeric($taskid)) {
        notFound();
    } else {
        $task = Task::findTask($taskid);
    }

    if (!$task == NULL && $task->isOwner($_SESSION['logged'], $taskid)) {
        showView('taskform', array('title' => 'Edit Task',
            'task' => $task,
            'function' => "task.php?update&id=$taskid",
            'name' => htmlspecialchars($task->getName()),
            'desc' => htmlspecialchars($task->getDescription()),
            'dead' => htmlspecialchars($task->getDeadline()),
            'header' => 'Editing Task',
            'button' => 'Update'));
    } else {
        notFound();
    }
}

function updateTask($user) {
    $id = (int) $_GET['id'];

    $task = Task::findTask($id);

    if ($task == NULL || !$task->isOwner($user, $id)) {
        redirect('task.php?list');
    } else {
        $task->setName($_POST['name']);
        $task->setDescription($_POST['description']);
        $task->setDeadline($_POST['deadline']);

        if ($task->isValid()) {
            $task->update();
            redirect('task.php?list');
        }
    }
}

function deleteTask() {
    $taskid = $_GET['id'];

    $task = Task::findTask($taskid);

    if ($task->isOwner($_SESSION['logged'])) {
        $task->delete();
        redirect('task.php?list');
    } else {
        redirect('tasks.php?list');
    }
}

function notFound() {
    showView("tasks", array('notify' => "Task not found"));
}
