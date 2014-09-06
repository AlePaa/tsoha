<h1 class="page-header">Listing tasks</h1>
<div class="attempt">
    <a class="btn btn-default" href="task.php?new">New</a>
    <table border="1" cellpadding="10px" >
        <thead>
            <tr>
                <td>Name</td>
                <td>Priority</td>
                <td>Category</td>
                <td>Deadline</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody class="table table-striped">
            <?php foreach ($data->tasks as $task): ?>
                <tr>
                    <td><?php echo htmlspecialchars($task->getName()); ?></a></td>
                    <td><?php echo htmlspecialchars($task->getPriority()); ?></td>
                    <td><?php echo htmlspecialchars($task->getCategory()); ?></td>
                    <td><?php echo htmlspecialchars($task->getDeadline()); ?></td>
                    <td><?php echo htmlspecialchars($task->getDescription()); ?></td>
                    <td>
                        <a class="btn btn-default" href="task.php?edit&id=<?php echo $task->getId(); ?>">Edit</a>
                        <a class="btn btn-danger" href="task.php?delete&id=<?php echo $task->getId(); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>