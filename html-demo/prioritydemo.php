<html>
    <head>
        <title>Kriittinen</title>
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
        <h1>Kriittinen</h1>
        <div class="entityinfo">
            <form>
                <label for="textarea">Description:</label>
                <div><textarea type="txtarea" name="address"cols="80" rows="5" >Tehtäväkriittinen. Kaikki on mennyttä jos epäonnistun.</textarea></div><br>
                <label for="name">Name:</label>
                <input type="name" value="Kriittinen"><br>

                <label for="prio">Priority value:</label>
                <input type="prio" value="9999"><br>

                <button type="submit">save</button><br>
                <button type="submit">delete</button>
            </form>
        </div>
    </body>
</html>


