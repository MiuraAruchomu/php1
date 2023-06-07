<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>

<body>
    <h1><?= $pageHeader ?></h1>

    <?php if ($isUserAuth === false) : ?>
        <a href="/?controller=security">Sign in</a>
    <?php endif ?>

    <?php if (isset($_SESSION['user'])) : ?>
        <a href="/?controller=todo">ToDo</a>
        <a href="/?action=logout">Exit</a>
    <?php endif ?>
</body>