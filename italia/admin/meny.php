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
    
    $servernavn = "localhost";
    $brukernavn = "root";
    $passord = "";
    $dbnavn = "italia";

    $tilkobling = mysqli_connect($servernavn, $brukernavn, $passord, $dbnavn);

    if($tilkobling->connect_error) {
        die("Noe gikk galt: " . $tilkobling->connect_error);
    }

    $tilkobling->set_charset("utf8");
    
    if(isset($_GET["slett"])) {
        $slettid = $_GET["slett"];
        $tilkobling->query("DELETE FROM matrett WHERE idmatrett=$slettid");
    }
    ?>
    
    <h1>Administrer meny</h1>
    
    <div>
        <div>
            <h2>Legg til matrett</h2>
            <form action="" method="post" enctype="multipart/form-data">
                Navn på matrett: <input type="text" name="navn" required><br><br>

                Type: <input type="radio" name="type" value="f" required>Forrett
                <input type="radio" name="type" value="h" required>Hovedrett
                <input type="radio" name="type" value="d" required>Dessert<br><br>

                Pris: <input type="number" name="pris" style="width: 80px" required> kr<br><br>

                Bilde: <input type="file" name="file" id="file"><br><br>

                Beskrivelse: <br><textarea name="beskrivelse" cols="40" rows="6"></textarea><br><br>

                <input type="submit" name="submit" value="Legg til matrett">
            </form>

            <br>

            <?php
            if(isset($_POST["submit"])) {
                //Start opplasting
                $allowedExts = array("gif", "jpeg", "jpg", "png");
                $temp = explode(".", $_FILES["file"]["name"]);
                $extension = end($temp);

                //Her kan du slette eller legge til de filformatene du ønsker skal godtas.
                if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/png"))
                && ($_FILES["file"]["size"] < 10000000) //Her kan du endre max filstørrelse. 
                && in_array($extension, $allowedExts)) { 
                    if ($_FILES["file"]["error"]> 0) { //Feilmelding hvis filformat/størrelse er feil.
                        echo "Return

                        Code: " . $_FILES["file"]["error"] . "<br>";
                    }

                    if (file_exists("upload/" . $_FILES["file"]["name"])) {
                        echo $_FILES["file"]["name"] . " finnes allerede i mappen. "; //Melding: Filen eksisterer.
                    }
                    else {
                        move_uploaded_file($_FILES["file"]["tmp_name"], //Filen flyttes fra variabelen $_FILES til katalogen "upload".
                        "upload/" . $_FILES["file"]["name"]);
                    }
                }

                $navn = $_POST["navn"];
                $type = $_POST["type"];
                $pris = $_POST["pris"];
                $beskrivelse = $_POST["beskrivelse"];
                $filnavn = $_FILES["file"]["name"];

                $sql = "INSERT INTO matrett(navn, type, pris, informasjon, bilde)
                VALUES('$navn', '$type', $pris, '$beskrivelse', '$filnavn')";

                if($tilkobling->query($sql)) {
                    echo "<b>Matrett lagt til</b>";
                }
                else {
                    echo "<b>Noe gikk galt: $sql($tilkobling->error)</b>";
                }
            }
            ?>
            
            <br>
        </div>

        <div>
            <h2>Gjeldende meny</h2>
            <table>
                <tr>
                    <th>Bilde</th>
                    <th>Navn på rett</th>
                    <th>Type</th>
                    <th>Pris</th>
                    <th>Beskrivelse</th>
                    <th></th>
                </tr>
                <?php 
                $data = $tilkobling->query("SELECT * FROM matrett ORDER BY type, navn");
                while($row = mysqli_fetch_array($data)) { ?>
                <tr>
                    <td><img src="upload/<?php echo $row["bilde"]?>"></td>
                    <td><?php echo $row["navn"]?></td>
                    <td><?php echo $row["type"]?></td>
                    <td><?php echo $row["pris"]?> kr</td>
                    <td><?php echo $row["informasjon"]?></td>
                    <td>
                        <button onclick="location.href='endrematrett.php?id=<?php echo $row["idmatrett"]?>'">Endre</button>
                        <br><br>
                        <button onclick="location.href='?slett=<?php echo $row["idmatrett"]?>'">Fjern</button>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>
