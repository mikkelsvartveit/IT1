<!doctype html>
<html>
    
<head>
    <meta charset="utf8">
    <style>
        table {
            border-collapse: collapse;
        }
        
        th, td {
            border: 1px solid black;
            padding: 5px 10px;
        }
    </style>
</head>
    
<body>
    <?php
    $servernavn = "localhost";
    $brukernavn = "root";
    $passord = "";
    $dbnavn = "elever";

    $conn = new mysqli($servernavn, $brukernavn, $passord, $dbnavn);

    if($conn->connect_error) {
        die("Noe gikk galt: " . $conn->connect_error);
    }

    $conn->set_charset("utf8");
    
    if(isset($_GET["slettelev"])) {
        $conn->query("DELETE FROM elev WHERE fodselsnr = $_GET[slettelev]");
        echo $conn->error;
    }
    
    if(isset($_GET["slettfag"])) {
        $conn->query("DELETE FROM fag WHERE fagkode = '$_GET[slettfag]'");
        echo $conn->error;
    }
    
    if(isset($_GET["slettfagvalg"])) {
        $slett = explode(";", $_GET["slettfagvalg"]);
        $conn->query("DELETE FROM fagvalg WHERE elev_idelev = '$slett[0]' AND fag_fagkode = '$slett[1]' AND aar = '$slett[2]' AND termin = '$slett[3]'");
        echo $conn->error;
    }
    ?>
    
    <h2>Elev</h2>
    <?php
    $data = $conn->query("SELECT * FROM elev");
    ?>
    <table>
        <tr>
            <th>Fødselsnr</th>
            <th>Fornavn</th>
            <th>Etternavn</th>
            <th>Mobil</th>
            <th></th>
        </tr>
        
        <?php while($rad = mysqli_fetch_array($data)) { ?>
        <tr>
            <td><?php echo $rad["fodselsnr"]?></td>
            <td><?php echo $rad["fornavn"]?></td>
            <td><?php echo $rad["etternavn"]?></td>
            <td><?php echo $rad["mobil"]?></td>
            <td><a href="?slettelev=<?php echo $rad['fodselsnr']?>">Slett</a></td>
        </tr>
        <?php } ?>
    </table>
    
    <h2>Fag</h2>
    <?php
    $data = $conn->query("SELECT * FROM fag");
    ?>
    <table>
        <tr>
            <th>Fagkode</th>
            <th>Fagnavn</th>
            <th>Timetall</th>
            <th></th>
        </tr>
        
        <?php while($rad = mysqli_fetch_array($data)) { ?>
        <tr>
            <td><?php echo $rad["fagkode"]?></td>
            <td><?php echo $rad["fagnavn"]?></td>
            <td><?php echo $rad["timetall"]?></td>
            <td><a href="?slettfag=<?php echo $rad['fagkode']?>">Slett</a></td>
        </tr>
        <?php } ?>
    </table>
    
    <h2>Fagvalg</h2>
    <?php
    $data = $conn->query("SELECT * FROM fagvalg");
    ?>
    <table>
        <tr>
            <th>Elev-ID</th>
            <th>Fagkode</th>
            <th>År</th>
            <th>Termin</th>
            <th>Karakter</th>
            <th>Annet</th>
            <th></th>
        </tr>
        
        <?php while($rad = mysqli_fetch_array($data)) { ?>
        <tr>
            <td><?php echo $rad["elev_idelev"]?></td>
            <td><?php echo $rad["fag_fagkode"]?></td>
            <td><?php echo $rad["aar"]?></td>
            <td><?php echo $rad["termin"]?></td>
            <td><?php echo $rad["karakter"]?></td>
            <td><?php echo $rad["annet"]?></td>
            <td><a href="?slettfagvalg=<?php echo $rad['elev_idelev'] . ";" . $rad['fag_fagkode'] . ";" . $rad['aar'] . ";" . $rad['termin']?>">Slett</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>