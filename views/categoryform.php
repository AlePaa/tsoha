<fieldset >
    <legend><?php echo $data->header ?></legend>

    <form action=<?php echo $data->function ?> method='POST'>

        <label for="name" >Name:</label>
        <input class="form-control" type="text" name="name" id="name" value="<?php echo $data->name; ?>" placeholder="Name" autofocus/>

        <label for="priority">Priority:</label>
        <select class="form-control" name="priority" id="priority">
            <?php foreach ($data->priorities as $prio): ?>
                <option value="<?php echo $prio->getId() ?>">
                    <?php echo $prio->getName() ?>
                </option>
            <?php endforeach; ?>
        </select>

        <p>
            <label for="description">Description:</label>
            <textarea class="form-control" type="txtarea" name="description" id='description' cols="80" rows="5"><?php echo $data->desc; ?></textarea>
        <p>
            <button class="form-control" type="submit"><?php echo $data->button ?></button>
            <a class="form-control btn btn-default" href="category.php?list">Cancel</a>
    </form>
</fieldset>
<?php
if (isset($_GET['edit'])) {
    include 'categoryformtable.php';
}