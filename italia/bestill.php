<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bestill mat - Italiensk restaurant</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600|Open+Sans:300,400,700" rel="stylesheet"> 
</head>

<body id="top">
    <div class="menu" id="menu">
        <div class="menu-left">
            <a href="index.php">Italiensk restaurant</a>
        </div>
        <div class="menu-right">
            <a href="index.php#lesmer">Info</a>
            <a href="#top">Meny/bestill</a>
            <a href="admin/meny.php" target="_blank">Admin</a>
        </div>
    </div>
    
    <div class="cover">
        <h1>Meny</h1>
        <div>
            <a href="#forretter">Forretter</a>
            <a href="#hovedretter">Hovedretter</a>
            <a href="#desserter">Desserter</a>
        </div>
    </div>
    
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
    ?>
    
    <div class="content">
        <h2 id="forretter">Forretter</h2>
        <div class="flex">
            <?php 
            $sql = "SELECT * FROM matrett WHERE type='f' ORDER BY navn";
            $data = $tilkobling->query($sql);
            
            while($row = mysqli_fetch_array($data)) {
            ?>
            
            <div class="col-3">
                <div class="card">
                    <h3><?php echo $row["navn"] ?></h3>
                    <img src="<?php echo 'admin/upload/' . $row["bilde"]?>">
                    <p><?php echo $row["informasjon"] ?></p>
                    <a href="#">Velg rett</a>
                </div>
            </div>
            
            <?php } ?>
        </div>
        
        <h2 id="hovedretter">Hovedretter</h2>
        <div class="flex">
            <?php 
            $sql = "SELECT * FROM matrett WHERE type='h' ORDER BY navn";
            $data = $tilkobling->query($sql);
            
            while($row = mysqli_fetch_array($data)) {
            ?>
            
            <div class="col-3">
                <div class="card">
                    <h3><?php echo $row["navn"] ?></h3>
                    <img src="<?php echo 'admin/upload/' . $row["bilde"]?>">
                    <p><?php echo $row["informasjon"] ?></p>
                    <a href="#">Velg rett</a>
                </div>
            </div>
            
            <?php } ?>
        </div>
        
        <h2 id="desserter">Desserter</h2>
        <div class="flex">
            <?php 
            $sql = "SELECT * FROM matrett WHERE type='d' ORDER BY navn";
            $data = $tilkobling->query($sql);
            
            while($row = mysqli_fetch_array($data)) {
            ?>
            
            <div class="col-3">
                <div class="card">
                    <h3><?php echo $row["navn"] ?></h3>
                    <img src="<?php echo 'admin/upload/' . $row["bilde"]?>">
                    <p><?php echo $row["informasjon"] ?></p>
                    <a href="#">Velg rett</a>
                </div>
            </div>
            
            <?php } ?>
        </div>
    </div>
    
    <script>
        var menuShowing = false;
        
        window.onscroll = function() {
            var clientHeight = window.innerHeight;
            var scrollPosition = window.pageYOffset;
            
            if(scrollPosition >= clientHeight / 3 && !menuShowing) {
                var menu = document.getElementById("menu");
                menu.classList.add("menu-scrolled");
                menuShowing = true;
            } 
            
            else if(scrollPosition < clientHeight / 3 && menuShowing) {
                var menu = document.getElementById("menu");
                menu.classList.remove("menu-scrolled");
                menuShowing = false;
            }
        }
    </script>
</body>    

</html>