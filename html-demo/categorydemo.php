<html>
    <head>
        <title>Tsoha</title>
        <link href="../css/main.css" rel="stylesheet">
    </head>
    <body class="graybody">
        <div class="nav">
            <ul class="rightul">
                <li>Demogorgon</li>
                <li><a href="../index.php">Logout</a></li>
            </ul>
            <ul>
                <li><a href="tasksdemo.php">Tasks</a></li>
                <li><a href="categoriesdemo.php">Categories</a></li>
                <li><a href="prioritiesdemo.php">Priorities</a></li>
            </ul>
        </div>
        <h1>Tsoha</h1>
        <div class="entityinfo">
            <form>
                <label for="textarea">Description:</label>
                <div><textarea type="txtarea" name="address"cols="80" rows="5" >Tietokantasovelluksen kehitystyö</textarea></div><br>
                <label for="name">Name:</label>
                <input type="name" value="Tsoha"><br>

                <label for="prio">Priority:</label>
                <select type="prio">
                    <option value="kriittinen">Kriittinen</option>
                    <option value="toissijainen">Toissijainen</option>
                </select><br>

                <button type="submit">save</button><br>
                <button type="submit">delete</button>
            </form>
        </div>
    </body>
</html>
