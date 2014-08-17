<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
        <?php if (!empty($data->title)): ?> <title><?php echo $data->title; ?></title>
        <?php endif; ?>
    </head>

    <body class="graybody">

        <div class="nav">
            <?php if (isset($_SESSION['logged'])): ?>
                <ul class = "rightul">
                    <li>Logged in as user</li>
                    <li><a href ="login.php?logout">Logout</a></li>
                </ul>
            <?php endif ?>
            <ul>
                <li><a href="tasks.php">Tasks</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="priorities.php">Priorities</a></li>
            </ul>
        </div>

        <div class="contempt">
            <?php
            require ($page . '.php');
            ?>

        </div>

        <?php if (!empty($data->notify)): ?>
            <div>
                <p class="error"><?php echo $data->notify; ?></p>
            </div>
        <?php endif; ?>
    </body>
</html> 