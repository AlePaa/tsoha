<h1>Create New User</h1>
<form action="user.php?create" method="POST">
    <div>
        <label for="username" >Username:</label>
        <input class="form-control" type="text" name="username" /><br>

        <label for="password" >Password:</label>
        <input class="form-control" type="password" name="password" /><br>

        <label for="password" >Confirm Password:</label>
        <input class="form-control" type="password" name="passwordconfirm" /><br>

        <button class="form-control" type="submit">Create user</button>
    </div>
</form>

