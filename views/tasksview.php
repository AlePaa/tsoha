<h1>Listing tasks</h1>
<div class="attempt">
    <a href="tasknew.php">Create new task</a>
    <table border="1" cellpadding="10px" >
        <thead>
            <tr>
                <td>Name</td>
                <td>Priority</td>
                <td>Category</td>
                <td>Description</td>
                <td>Deadline</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->tasks as $task): ?>
                <tr>
                    <td><a href="taskedit.php?id=<?php echo $task->getId(); ?>"><?php echo htmlspecialchars($task->getName()); ?></a></td>
                    <td><?php echo htmlspecialchars($task->getPriority()); ?></td>
                    <td><?php echo htmlspecialchars($task->getCategory()); ?></td>
                    <td><?php echo htmlspecialchars($task->getDescription()); ?></td>
                    <td><?php echo htmlspecialchars($task->getDeadline()); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>