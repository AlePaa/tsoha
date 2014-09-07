<?php if (!empty($data->tasks)): ?>
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
                    <td>Placeholder</td>
                    <td><?php echo htmlspecialchars($task->getDeadline()); ?></td>
                    <td><?php echo htmlspecialchars($task->getDescription()); ?></td>
                    <td>
                        <a class="btn btn-default" href="task.php?edit&id=<?php echo $task->getId(); ?>">Edit</a>
                        <a class="btn btn-danger" href="#">Remove</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>