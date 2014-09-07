<fieldset >
    <legend>Log in</legend>

    <form action='login.php?login' method='POST'>

        <label for="username" >Username:</label>
        <input class="form-control" type="text" name="username" id="username" value="<?php if (!empty($data->user)): ?> echo $data->user; <?php endif ?>" />

        <label for="password" >Password:</label>
        <input class="form-control" type="password" name="password" id="password" />

        <button class="form-control btn btn-default" type="submit">Log in</button>
    </form>
    <a class="form-control btn btn-default" href="user.php?new">New Account</a>
</fieldset>