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
                    <td><a href="#"><?php echo htmlspecialchars($task->getName()); ?></a></td>
                    <td>Kriittinen</td>
                    <td>Tsoha</td>
                    <td><?php echo htmlspecialchars($task->getDescription()); ?></td>
                    <td>10.08.2014 (0 days left)</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>