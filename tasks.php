<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require 'libs/models/TaskModel.php';

$tasks = Task::getUserTasks($user);
showView('tasksview', array('tasks' => $tasks,
    'title' => "Tasks"));
