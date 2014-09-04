<?php

require_once 'libs/common.php';
require_once 'libs/session.php';

showView('categoryform', array('title' => 'Create new Category',
    'function' => 'categorycreate.php',
    'name' => '',
    'desc' => '',
    'header' => 'Create New Task'));
