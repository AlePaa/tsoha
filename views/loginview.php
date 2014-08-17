<fieldset >
    <legend>Log in</legend>

    <form action='login.php?login' method='POST'>

        <label for="username" >Username:</label>
        <input type="text" name="username" id="username" value="<?php if (!empty($data->user)): ?> echo $data->user; <?php endif ?>" />

        <label for="password" >Password:</label>
        <input type="password" name="password" id="password" />

        <button type="submit">Log in</button>
    </form>
</fieldset>