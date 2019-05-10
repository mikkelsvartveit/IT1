<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Administrer meny</title>
    <link href="admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>

<body>
    <?php
    if (!isset($_SERVER['PHP_AUTH_USER']) || !($_SERVER['PHP_AUTH_USER'] == "admin" && $_SERVER['PHP_AUTH_PW'] == "mikkel")) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo '<b>Du må logge inn for å få tilgang til denne siden</b>';
        exit;
    }
    ?>
    
    <h1 style="text-align: center">Administrator</h1>
    <div class="flex">
        <a href="meny.php">
            <img src="img/food.svg">
            <h2>Administrer meny</h2>
        </a>
        <a href="bestillinger.php">
            <img src="img/users.svg">
            <h2>Vis påmeldinger</h2>
        </div>
    </div>
    <p class="center"><a href="../">Gå til forside</a></p>
</body>

</html>
