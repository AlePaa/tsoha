<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">

        <?php if (!empty($data->title)): ?> <title><?php echo $data->title; ?></title>
        <?php endif; ?>
    </head>

    <body class="graybody">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <nav class="navbar navbar-default" role="navigation">
            <div class="panel panel-default">
                <?php if (isset($_SESSION['logged'])): ?>
                    <ul class = "nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logged in as <?php echo $_SESSION['name']; ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="login.php?logout">Logout</a></li>
                                <li><a href="#">Delete User</a></li>
                            </ul>
                        </li>
                        <a href="task.php?list">Tasks</a>
                        <a href="category.php?list">Categories</a>
                        <a href="priority.php?list">Priorities</a>
                        </li>

                    </ul>
                <?php endif ?>
            </div>
        </nav>
        <div class="container">
            <?php
            require ($page . '.php');
            ?>

        </div>

        <?php if (!empty($data->notify)): ?>
            <div class="alert alert-danger">
                <p><?php echo $data->notify; ?></p>
            </div>
        <?php endif; ?>
    </body>
</html> 