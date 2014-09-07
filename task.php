<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/TaskModel.php';
include 'libs/models/PriorityModel.php';
include 'libs/models/CategoryModel.php';

if (isset($_GET['list'])) {
    listTasks($user);
}
if (isset($_GET['new'])) {
    newTask($user);
} else if (isset($_GET['create'])) {
    createTask();
} else if (isset($_GET['edit'])) {
    editTask($user);
} else if (isset($_GET['update'])) {
    updateTask($user);
} else if (isset($_GET['add'])) {
    addLink($user);
} else if (isset($_GET['delete'])) {
    deleteTask();
} else if (isset($_GET['remove'])) {
    removeLink($user);
}

function listTasks($user) {
    $tasks = Task::getUserTasks($user);
    showView('tasksview', array('tasks' => $tasks,
        'title' => "Tasks"));
}

function newTask($user) {
    $categories = Category::getUserCategories($user);
    $priorities = Priority::getUserPriorities($user);
    showView('taskform', array('title' => 'Create new Task',
        'function' => 'task.php?create',
        'categories' => $categories,
        'priorities' => $priorities,
        'name' => '',
        'desc' => '',
        'dead' => '',
        'header' => 'Create New Task',
        'button' => 'Create'));
}

function createTask() {
    $newTask = new Task();
    $newTask->setName(s($_POST['name']));
    $newTask->setDescription(s($_POST['description']));
    if (isset($_POST['priority'])) {
        $newTask->setPriority($_POST['priority']);
    }
    $newTask->setDeadline($_POST['deadline']);

    if ($newTask->isValid()) {
        $newTask->insertIntoDb($_SESSION['logged']);
        redirect('task.php?list');
    } else {
        redirect('task.php?new');
    }
}

function editTask($user) {
    $taskid = $_GET['id'];

    if (!is_numeric($taskid)) {
        notFound();
    } else {
        $task = Task::findTask($taskid);
    }

    $categories = Category::getUserCategories($user);
    $priorities = Priority::getUserPriorities($user);
    $taskcategories = $task->getTaskCategories();
    if (!$task == NULL && $task->isOwner($_SESSION['logged'], $taskid)) {
        showView('taskform', array('title' => 'Edit Task',
            'task' => $task,
            'function' => "task.php?update&id=$taskid",
            'categories' => $categories,
            'priorities' => $priorities,
            'taskcategories' => $taskcategories,
            'name' => s($task->getName()),
            'desc' => s($task->getDescription()),
            'dead' => s($task->getDeadline()),
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
        $task->setName(s($_POST['name']));
        $task->setDescription(s($_POST['description']));
        $task->setDeadline($_POST['deadline']);
        $task->setPriority($_POST['priority']);

        if ($task->isValid()) {
            $task->update();
            redirect('task.php?list');
        } else {
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
        redirect('task.php?list');
    }
}

function addLink($user) {
    $category = s($_POST['category']);
    $taskid = s($_POST['id']);
    $task = Task::findTask($taskid);
    if ($task->isOwner($user)) {
        $task->addLink($category);
        redirect('task.php?list');
    } else {
        redirect('task.php?list');
    }
}

function removeLink($user) {
    $taskid = $_GET['id'];
    $task = Task::findTask($taskid);

    if ($task->isOwner($user)) {
        $task->removeLink();
        redirect('task.php?edit&id=$taskid');
    } else {
        redirect('task.php?edit&id=$taskid');
    }
}

function notFound() {
    redirect('task.php?list');
}
