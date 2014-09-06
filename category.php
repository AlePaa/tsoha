<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require 'libs/models/CategoryModel.php';

if (isset($_GET['list'])) {
    listCategories($user);
} else if (isset($_GET['new'])) {
    newCategory();
} else if (isset($_GET['create'])) {
    createCategory();
} else if (isset($_GET['edit'])) {
    editCategory();
} else if (isset($_GET['update'])) {
    updateCategory($user);
} else if (isset($_GET['delete'])) {
    deleteCategory();
}

function listCategories($user) {
    $categories = Category::getUserCategories($user);
    showView('categoriesview', array('title' => "Categories",
        'categories' => $categories));
}

function newCategory() {
    showView('categoryform', array('title' => 'Create new Category',
        'function' => 'category.php?create',
        'name' => '',
        'desc' => '',
        'header' => 'Create New Category',
        'button' => 'Create'));
}

function createCategory() {
    $newcategory = new Category();
    $newcategory->setName($_POST['name']);
    $newcategory->setDescription($_POST['description']);
    $newcategory->setPriority($_POST['priority']);

    if ($newcategory->isValid()) {
        $newcategory->insertIntoDb($_SESSION['logged']);
        redirect('category.php?list');
    } else {
        showView('categoryform', $newTask->getErrors());
    }
}

function editCategory() {
    $categoryid = $_GET['id'];

    if (!is_numeric($categoryid)) {
        notFound();
    } else {
        $category = Category::findCategory($categoryid);
    }

    if (!$category == NULL && $category->isOwner($_SESSION['logged'], $categoryid)) {
        showView('categoryform', array('title' => 'Edit Category',
            'category' => $category,
            'function' => "category.php?update&id=$categoryid",
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

}

function updateCategory($user) {
    $id = (int) $_GET['id'];

    $category = Category::findCategory($id);

    if ($category == NULL) {
        redirect('category.php?list');
    } else if (!$category->isOwner($user, $id)) {
        
    } else {
        $category->setName($_POST['name']);
        $category->setDescription($_POST['description']);

        if ($category->isValid()) {
            $category->update();
            redirect('category.php?list');
        }
    }
}

function deleteCategory() {
    $categoryid = $_GET['id'];

    $category = Category::findCategory($categoryid);

    if ($category->isOwner($_SESSION['logged'])) {
        $category->delete();
        redirect('category.php?list');
    } else {
        redirect('category.php?list');
    }
}
