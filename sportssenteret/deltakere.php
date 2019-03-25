<!doctype html>
<html>

<head>
    <title>Deltakere - Sportssenteret A/S</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Baumans|Nunito:400,500,600,700" rel="stylesheet">
</head>

<body>
    <div class="page">
        <div class="nav">
            <div class="logo">
                <a href="index.html"><img src="bilder/logo.png"></a>
            </div>

            <div>
                <a href="#">Ski</a>
                <a href="#">Sko</a>
                <a href="sykkelsiden.php">Sykler</a>
                <a href="#">Ishockey</a>
                <a href="#">Om oss</a>
            </div>
        </div>

        <div class="banner">
            <h1>Deltakere</h1>
        </div>

        <div class="content">
            <?php
            $servernavn = "localhost";
            $brukernavn = "root";
            $passord = "";
            $dbnavn = "konkurranse";

            $conn = new mysqli($servernavn, $brukernavn, $passord, $dbnavn);

            if($conn->connect_error) {
                die("Noe gikk galt: " . $conn->connect_error);
            }

            $conn->set_charset("utf8");
            
            if(isset($_GET["slettid"])) {
                $slettid = $_GET["slettid"];
                $conn->query("DELETE FROM deltaker WHERE iddeltaker = $slettid");
            }

            $sql = "SELECT iddeltaker, fornavn, etternavn FROM deltaker ORDER BY etternavn, fornavn";
            $data = $conn->query($sql);
            ?>

            <table>
                <tr>
                    <th>Deltaker-ID</th>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th></th>
                </tr>
                <?php while($rad=mysqli_fetch_array($data)) { ?>
                <tr>
                    <td><?php echo $rad["iddeltaker"];?></td>
                    <td><?php echo $rad["fornavn"];?></td>
                    <td><?php echo $rad["etternavn"];?></td>
                    <td><a href="?slettid=<?php echo $rad["iddeltaker"]?>">Slett</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <div class="ads">
            <img src="bilder/nike.png">
            <img src="bilder/adidas.png">
            <img src="bilder/puma.png">
            <img src="bilder/head.png">
        </div>
    </div>

    <div class="kildekode">
        <a href="index.txt" target="_blank">index.html</a>
        <a href="sykkelsiden.txt" target="_blank">sykkelsiden.html</a>
        <a href="style.css" target="_blank">style.css</a>
    </div>
</body>

</html>