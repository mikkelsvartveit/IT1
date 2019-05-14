<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bestill mat - Italiensk restaurant</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600|Open+Sans:300,400,600" rel="stylesheet"> 
</head>

<body id="top">
    <?php
    $servernavn = "localhost";
    $brukernavn = "root";
    $passord = "";
    $dbnavn = "italia";

    $tilkobling = mysqli_connect($servernavn, $brukernavn, $passord, $dbnavn);

    if($tilkobling->connect_error) {
        die("Noe gikk galt: " . $tilkobling->connect_error);
    }

    $tilkobling->set_charset("utf8");

    if(isset($_POST["submit"])) {
        $fornavn = $_POST["fornavn"];
        $etternavn = $_POST["etternavn"];
        $trinn = $_POST["trinn"];
        $ukedag = $_POST["ukedag"];
        $handlevognString = $_POST["handlevogn"];
        $handlevogn = explode(",", $handlevognString);

        $sql = "INSERT INTO elev (fornavn, etternavn, trinn, ukedag) VALUES ('$fornavn', '$etternavn', '$trinn', '$ukedag')";
        $tilkobling->query($sql);

        $idelev = mysqli_fetch_array($tilkobling->query("SELECT @@identity"))[0];

        foreach($handlevogn as $idmatrett) {
            $sql = "INSERT INTO mat (matrett_idmatrett, elev_idelev) VALUES ('$idmatrett', '$idelev')";
            $tilkobling->query($sql);
        }
    } 
    else {
        die();
    }
    ?>
    
    <div class="menu" id="menu">
        <div class="menu-left">
            <a href="index.php">Italiensk restaurant</a>
        </div>
        <div class="menu-right">
            <a href="index.php#lesmer">Info</a>
            <a href="bestill.php">Meny/bestill</a>
            <a href="admin" target="_blank">Admin</a>
        </div>
    </div>
    
    <div class="content">
        <h1>Takk!</h1>
        <img src="img/complete.svg" id="complete">
        <p class="big">Din bestilling er registrert.</p>
        <p class="big"><a href="index.php" class="button center">Gå til forside</a></p>
    </div>
    
    <script>
        menu.classList.add("menu-scrolled");
    </script>
</body>    

</html>