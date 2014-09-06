<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/CategoryModel.php';

$categoryid = $_GET['id'];

if (!is_numeric($categoryid)) {
    notFound();
} else {
    $category = Category::findCategory($categoryid);
}

if (!$category == NULL && $category->isOwner($_SESSION['logged'], $categoryid)) {
    showView('categoryform', array('title' => 'Edit Category',
        'category' => $category,
        'function' => "categoryupdate.php?id=$categoryid",
        'name' => htmlspecialchars($category->getName()),
        'desc' => htmlspecialchars($category->getDescription()),
        'header' => 'Editing Category',
        'button' => 'Update'));
} else {
    notFound();
}

function notFound() {
    showView("tasks", array('notify' => "Task not found"));
}
