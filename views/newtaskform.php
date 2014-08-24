<fieldset >
    <legend>Create New Task</legend>

    <form action='taskcreate.php' method='POST'>

        <label for="name" >Name:</label>
        <input type="text" name="name" id="name" />

        <label>Priority:</label>
        <select name="priority">
            <option>Kriittinen</option>
        </select>

        <label>Category:</label>
        <select name="category">
            <option>Tsoha</option>
        </select>
        <p>
            <label for="textarea">Description:</label>
            <textarea type="txtarea" name="description" cols="80" rows="5"></textarea>

            <button type="submit">Create</button>
    </form>
</fieldset>