<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
        <?php if (!empty($data->title)): ?> <title><?php echo $data->title; ?></title>
        <?php endif; ?>
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

        <?php if (!empty($data->error)): ?>
            <div>
                <p class="error"><?php echo $data->error; ?></p>
            </div>
        <?php endif; ?>
    </body>
</html>