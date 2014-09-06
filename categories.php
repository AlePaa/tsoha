<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require 'libs/models/CategoryModel.php';

$categories = Category::getUserCategories($user);
showView('categoriesview', array('title' => "Categories",
    'categories' => $categories));
