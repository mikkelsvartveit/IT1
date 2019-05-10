<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bestill mat - Italiensk restaurant</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600|Open+Sans:300,400,600" rel="stylesheet"> 
</head>

<body id="top">
    <div class="menu" id="menu">
        <div class="menu-left">
            <a href="index.php">Italiensk restaurant</a>
        </div>
        <div class="menu-right">
            <a href="index.php#lesmer">Info</a>
            <a href="#top">Meny/bestill</a>
            <a href="admin" target="_blank">Admin</a>
        </div>
    </div>
    
    <div class="cover cover-half">
        <h1>Meny</h1>
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
        <!-- <div class="center">
            <a href="#forretter" class="button">Forretter</a>
            <a href="#hovedretter" class="button">Hovedretter</a>
            <a href="#desserter" class="button">Desserter</a>
        </div> -->
        
        <h2 id="forretter">Forretter</h2>
        <div class="flex">
            <?php 
            $sql = "SELECT * FROM matrett WHERE type='f' ORDER BY navn";
            $data = $tilkobling->query($sql);
            
            while($row = mysqli_fetch_array($data)) {
            ?>
            
            <div class="col-3">
                <div class="card" id="<?php echo $row["idmatrett"] ?>">
                    <h3><?php echo $row["navn"] ?></h3>
                    <img src="<?php echo 'admin/upload/' . $row["bilde"]?>">
                    <p class="info"><?php echo $row["informasjon"] ?></p>
                    <p><b><?php echo "kr " . $row["pris"] . ",-" ?></b></p>
                    <a href="javascript:velgRett(<?php echo $row["idmatrett"] ?>)">Velg rett</a>
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
                <div class="card" id="<?php echo $row["idmatrett"] ?>">
                    <h3><?php echo $row["navn"] ?></h3>
                    <img src="<?php echo 'admin/upload/' . $row["bilde"]?>">
                    <p class="info"><?php echo $row["informasjon"] ?></p>
                    <p><b><?php echo "kr " . $row["pris"] . ",-" ?></b></p>
                    <a href="javascript:velgRett(<?php echo $row["idmatrett"] ?>)">Velg rett</a>
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
                <div class="card" id="<?php echo $row["idmatrett"] ?>">
                    <h3><?php echo $row["navn"] ?></h3>
                    <img src="<?php echo 'admin/upload/' . $row["bilde"]?>">
                    <p class="info"><?php echo $row["informasjon"] ?></p>
                    <p><b><?php echo "kr " . $row["pris"] . ",-" ?></b></p>
                    <a href="javascript:velgRett(<?php echo $row["idmatrett"] ?>)">Velg rett</a>
                </div>
            </div>
            
            <?php } ?>
        </div>
        
        <div class="center">
            <a href="javascript:bestill()" class="button">Gå videre</a>
            <br>
            <p id="error">Du må velge mat først!</p>
        </div>
    </div>
    
    <script>
        var handlevogn = [];
        
        function velgRett(id) {
            var button = document.getElementById(id).getElementsByTagName("a")[0];
            
            if(!button.classList.contains("selected")) {
                button.innerHTML = "Valgt!";
                button.classList.add("selected");
                handlevogn.push(id);
            } else {
                button.innerHTML = "Velg rett";
                button.classList.remove("selected");
                handlevogn.splice(handlevogn.indexOf(id), 1);
            }
        }
        
        function bestill() {
            var handlevognString = handlevogn.join(",");
            if(handlevognString) {
                var url = "registrer.php?handlevogn=" + handlevognString;
                location.href = url;
            } else {
                document.getElementById("error").style.display = "block";
            }
        }
        
        // Gjør menyen hvit når brukeren scroller nedover
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