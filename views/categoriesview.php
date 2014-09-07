<h1 class="page-header">Listing categories</h1>
<div class="container">
    <a class="form-control btn btn-default" href="category.php?new">New</a>
    <table border="1" cellpadding="10px">
        <thead>
            <tr>
                <td>Name</td>
                <td>Priority</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->categories as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category->getName()); ?></td>
                    <td><?php echo htmlspecialchars($category->getPriority()); ?></td>
                    <td><?php echo htmlspecialchars($category->getDescription()); ?></td>
                    <td>
                        <a class="btn btn-default" href="category.php?edit&id=<?php echo $category->getId(); ?>">Edit</a>
                        <a class="btn btn-danger" href="category.php?delete&id=<?php echo $category->getId(); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>