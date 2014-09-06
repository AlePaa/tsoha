<?php

require_once 'libs/common.php';
require_once 'libs/session.php';

showView('taskform', array('title' => 'Create new Task',
    'function' => 'taskcreate.php',
    'name' => '',
    'desc' => '',
    'dead' => '',
    'header' => 'Create New Task',
    'button' => 'Create'));
