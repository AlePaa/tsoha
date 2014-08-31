<fieldset >
    <legend>Create New Task</legend>

    <form action='taskcreate.php' method='POST'>

        <label for="name" >Name:</label>
        <input type="text" name="name" id="name" autofocus/>

        <label>Priority:</label>
        <select name="priority">
           
        </select>

        <label>Category:</label>
        <select name="category">
            <option>Tsoha</option>
        </select>
        <p>
            <label for="description">Description:</label>
            <textarea type="txtarea" name="description" id='description' cols="80" rows="5"></textarea>
        <p>
            <label for="deadline">Deadline: </label>
            <input type="date" name='deadline' id='deadline'/> 

            <button type="submit">Create</button>
    </form>
</fieldset>