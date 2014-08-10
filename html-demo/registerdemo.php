<html>
    <head>
        <title>Register new user</title>
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body class="graybody">
        <h1>New User</h1>
        <form>
            <div>
                <label for="username" >Username:</label>
                <input type="text" name="username" /><br>

                <label for="password" >Password:</label>
                <input type="password" name="password" /><br>

                <label for="password" >Confirm Password:</label>
                <input type="password" name="password" /><br>
            </div>
        </form>
        <button onclick="location.href = '../index.php'">Create user</button>
    </body>