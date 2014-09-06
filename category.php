<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require 'libs/models/CategoryModel.php';

if (isset($_GET['list'])) {
    $categories = Category::getUserCategories($user);
    showView('categoriesview', array('title' => "Categories",
        'categories' => $categories));
} else if (isset($_GET['new'])) {
    showView('categoryform', array('title' => 'Create new Category',
        'function' => 'categorycreate.php',
        'name' => '',
        'desc' => '',
        'header' => 'Create New Category',
        'button' => 'Create'));
} else if (isset($_GET['create'])) {
    $newcategory = new Category();
    $newcategory->setName($_POST['name']);
    $newcategory->setDescription($_POST['description']);
    $newcategory->setPriority($_POST['priority']);

    if ($newcategory->isValid()) {
        $newcategory->insertIntoDb($_SESSION['logged']);
        redirect('categories.php');
    } else {
        showView('categoryform', $newTask->getErrors());
    }
} else if (isset($_GET['edit'])) {
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

} else if (isset($_GET['update'])) {
    $id = (int) $_GET['id'];

    $category = Category::findCategory($id);

    if ($category == NULL) {
        showView('');
    } else if (!$category->isOwner($user, $id)) {
        
    } else {
        $category->setName($_POST['name']);
        $category->setDescription($_POST['description']);

        if ($category->isValid()) {
            $category->update();
            redirect('categories.php');
        }
    }
} else if (isset($_GET['delete'])) {
    $categoryid = $_GET['id'];

    $category = Category::findCategory($categoryid);

    if ($category->isOwner($_SESSION['logged'])) {
        $category->delete();
        redirect('categories.php');
    } else {
        redirect('categories.php');
    }
}