<h1 class="page-header">Listing priorities</h1>
<div class="attempt">
    <a class="btn btn-default" href="prioritynew.php">New</a>
    <table border="1" cellpadding="10px">
        <thead>
            <tr>
                <td>Name</td>
                <td>Description</td>
                <td>Value</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->priorities as $prio): ?>
                <tr>
                    <td><?php echo htmlspecialchars($prio->getName()); ?></a></td>
                    <td><?php echo htmlspecialchars($prio->getDescription()); ?></td> 
                   <td><?php echo htmlspecialchars($prio->getPriovalue()); ?></td>
                    <td>
                        <a class="btn btn-default" href="priorityedit.php?id=<?php echo $prio->getId(); ?>">Edit</a>
                        <a class="btn btn-danger" href="prioritydelete.php?id=<?php echo $prio->getId(); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
