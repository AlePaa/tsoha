<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/CategoryModel.php';
include 'libs/models/PriorityModel.php';

if (isset($_GET['list'])) {
    listCategories($user);
} else if (isset($_GET['new'])) {
    newCategory($user);
} else if (isset($_GET['create'])) {
    createCategory();
} else if (isset($_GET['edit'])) {
    editCategory($user);
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

function newCategory($user) {
    $priorities = Priority::getUserPriorities($user);
    showView('categoryform', array('title' => 'Create new Category',
        'function' => 'category.php?create',
        'priorities' => $priorities,
        'name' => '',
        'desc' => '',
        'header' => 'Create New Category',
        'button' => 'Create'));
}

function createCategory() {
    $newcategory = new Category();
    $newcategory->setName(htmlspecialchars($_POST['name']));
    $newcategory->setDescription(htmlspecialchars($_POST['description']));
    $newcategory->setPriority(htmlspecialchars($_POST['priority']));

    if ($newcategory->isValid()) {
        $newcategory->insertIntoDb($_SESSION['logged']);
        redirect('category.php?list');
    } else {
        redirect('category.php?new');
    }
}

function editCategory($user) {
    $categoryid = $_GET['id'];

    if (!is_numeric($categoryid)) {
        notFound();
    } else {
        $category = Category::findCategory($categoryid);
        $tasks = $category->getCategoryTasks();
    }
    $priorities = Priority::getUserPriorities($user);
    if (!$category == NULL && $category->isOwner($_SESSION['logged'], $categoryid)) {
        showView('categoryform', array('title' => 'Edit Category',
            'category' => $category,
            'tasks' => $tasks,
            'function' => "category.php?update&id=$categoryid",
            'priorities' => $priorities,
            'name' => s($category->getName()),
            'desc' => s($category->getDescription()),
            'header' => 'Editing Category',
            'button' => 'Update'));
    } else {
        notFound();
    }
}

function updateCategory($user) {
    $id = (int) $_GET['id'];

    $category = Category::findCategory($id);

    if ($category == NULL) {
        redirect('category.php?list');
    } else if (!$category->isOwner($user, $id)) {
        
    } else {
        $category->setName(s($_POST['name']));
        $category->setDescription(s($_POST['description']));
        $category->setPriority(s($_POST['priority']));

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

function notFound() {
    redirect('category.php?list');
}
