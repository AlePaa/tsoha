<h1>Listing priorities</h1>
<div class="attempt">
    <a href="prioritynew.php">Create new priority</a>
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
                    <td><a href="prioritydemo.php"><?php echo htmlspecialchars($prio->getName()); ?></a></td>
                    <td><?php echo htmlspecialchars($prio->getDescription()); ?></td>
                    <td><?php echo htmlspecialchars($prio->getPriovalue()); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
