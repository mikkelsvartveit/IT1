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
    
    if(isset($_GET["handlevogn"])) {
        $handlevognString = $_GET["handlevogn"];
        $handlevogn = explode(",", $handlevognString);
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
        <h1>Bestill mat</h1>
        <div class="flex">
            <div class="col-2">
                <table>
                    <tr>
                        <th>Nr.</th>
                        <th>Matrett</th>
                        <th>Type</th>
                        <th>Pris</th>
                    </tr>
                    
                    <?php
                    $pris = 0;
                    foreach($handlevogn as $rett) {
                        $sql = "SELECT * FROM matrett WHERE idmatrett=$rett";
                        $data = $tilkobling->query($sql);
                        $row = mysqli_fetch_array($data);
                        
                        $pris += $row["pris"];
                    ?>
                    
                    <tr>
                        <td><?php echo $row["idmatrett"] ?></td>
                        <td><?php echo $row["navn"] ?></td>
                        <td><?php echo $row["type"] ?></td>
                        <td><?php echo "kr " . $row["pris"] . ",-" ?></td>
                    </tr>
                    
                    <?php } ?>
                    
                    <tr>
                        <td><br></td>
                    </tr>
                    
                    <tr>
                        <th></th>
                        <th>Totalt</th>
                        <th></th>
                        <th><?php echo "kr " . $pris . ",-" ?></th>
                    </tr>
                </table>
            </div>
            
            <div class="col-2">
                <form action="bekreftelse.php" method="post">
                    <b>Fornavn: </b><br><input type="text" name="fornavn" required><br>
                    <b>Etternavn: </b><br><input type="text" name="etternavn" required><br>
                    
                    <select name="trinn" required>
                        <option value="" disabled selected>--Velg trinn/ansatt--</option>
                        <option value="vg1">VG1</option>
                        <option value="vg2">VG2</option>
                        <option value="vg3">VG3</option>
                        <option value="ansatt">Ansatt</option>
                    </select>
                    
                    <select name="ukedag" required>
                        <option value="" disabled selected>--Velg dag--</option>
                        <option value="mandag">Mandag</option>
                        <option value="tirsdag">Tirsdag</option>
                        <option value="onsdag">Onsdag</option>
                        <option value="torsdag">Torsdag</option>
                        <option value="fredag">Fredag</option>
                    </select><br><br>
                    
                    <input class="hidden" name="handlevogn" value="<?php echo $handlevognString ?>">
                    <input class="button" type="submit" name="submit" value="Bekreft bestilling">
                </form>
            </div>
        </div>
    </div>
    
    <script>
        menu.classList.add("menu-scrolled");
    </script>
</body>    

</html>