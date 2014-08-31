<h1>Listing categories</h1>
<div class="attempt">

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
                    <td><a href="categorydemo.php"><?php echo $category->getName(); ?></a></td>
                    <td><?php echo $category->getPriority(); ?></td>
                    <td><?php echo $category->getDescription(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>