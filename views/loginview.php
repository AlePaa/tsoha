<form action='login.php' method='POST'>
    <fieldset >
        <legend>Log in</legend>

        <label for="username" >Username:</label>
        <input type="text" name="username" id="username" value="<?php echo $data->user; ?>" />

        <label for="password" >Password:</label>
        <input type="password" name="password" id="password" />

        <button type="submit">Log in</button>
    </fieldset>

</form>