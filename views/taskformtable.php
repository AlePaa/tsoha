<form id="addform" action="task.php?add" method='POST'>
    <input type="hidden" name="id" value="<?php echo $data->task->getId(); ?>" />
    <label for="category">Category:</label>
    <select class="form-control" name="category" id="category">
        <?php foreach ($data->categories as $cate): ?>
            <option value="<?php echo $cate->getId() ?>">
                <?php echo $cate->getName() ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button class="form-control btn btn-default" type="submit">Add</button>
</form>


<?php if (!empty($data->taskcategories)): ?>
    <table border="1" cellpadding="10px">
        <thead>
            <tr>
                <td>Name</td>
                <td>Priority</td>
                <td>Description</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data->taskcategories as $category): ?>
                <tr>
                    <td><?php echo s($category->getName()); ?></td>
                    <td><?php echo s($category->getPriority()); ?></td>
                    <td><?php echo s($category->getDescription()); ?></td>
                    <td>
                        <a class="btn btn-default" href="category.php?edit&id=<?php echo $category->getId(); ?>">Edit</a>
                        <a class="btn btn-danger" href="#">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
