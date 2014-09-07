<fieldset >
    <legend><?php echo $data->header ?></legend>

    <form action=<?php echo $data->function ?> method='POST'>

        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name" value="<?php echo $data->name; ?>" placeholder="Name" autofocus />

        <label>Priority:</label>
        <input class="form-control" type="number" min="0" name="priovalue" id="priovalue" value="<?php echo $data->priovalue; ?>"
               <p>
            <label for="description">Description:</label>
            <textarea class="form-control" type="txtarea" name="description" id='description' cols="80" rows="5" placeholder="Description"><?php echo $data->desc; ?></textarea>
        <p>
            <button class="form-control" type="submit"><?php echo $data->button ?></button>
            <a class="form-control btn btn-default" href="priority.php?list">Cancel</a>
    </form>
</fieldset>

