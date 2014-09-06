<fieldset >
    <legend><?php echo $data->header ?></legend>

    <form action=<?php echo $data->function ?> method='POST'>

        <label for="name" >Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $data->name; ?>" autofocus />

        <label>Priority:</label>
        <select name="priority", id="priority">

        </select>

        <p>
            <label for="description">Description:</label>
            <textarea type="txtarea" name="description" id='description' cols="80" rows="5"><?php echo $data->desc; ?></textarea>
        <p>
            <button type="submit"><?php echo $data->button ?></button>
    </form>
</fieldset>