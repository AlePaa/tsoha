<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
        <title><?php echo $data->title ?></title>
    </head>

    <body class="graybody">
        <div class="nav">
            <ul>
                <li><a href="html-demo/tasksdemo.php">Tasks</a></li>
                <li><a href="html-demo/categoriesdemo.php">Categories</a></li>
                <li><a href="html-demo/prioritiesdemo.php">Priorities</a></li>
            </ul>
        </div>
        <div class="contempt">
            <?php
            require ($page . '.php');
            ?>

        </div>
        <?php if (!empty($data->virhe)): ?>
            <div class="contempt"><?php echo $data->virhe; ?></div>
        <?php endif; ?>

        <button onclick="location.href = 'html-demo/registerdemo.php'">New user</button>
    </body>
</html>