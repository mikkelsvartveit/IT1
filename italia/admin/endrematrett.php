<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Rediger matrett</title>
    <link href="admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>

<body>
    <h2>Rediger matrett</h2>

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
    
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
    } else {
        die();
    }
    
    if(isset($_POST["submit"])) {
        $navn = $_POST["navn"];
        $type = $_POST["type"];
        $pris = $_POST["pris"];
        $informasjon = $_POST["informasjon"];

        $sql = "UPDATE matrett SET navn='$navn', type='$type', pris=$pris, informasjon='$informasjon' WHERE idmatrett=$id";

        if($tilkobling->query($sql)) {
            echo "<script>location.href = 'meny.php'</script>";
        }
    }
    
    $data = $tilkobling->query("SELECT * FROM matrett WHERE idmatrett = $id");
    $row = mysqli_fetch_array($data);
    ?>
    
    <form action="" method="post">
    <table>
        <tr>
            <th>Bilde</th>
            <th>Navn</th>
            <th>Type</th>
            <th>Pris</th>
            <th>Beskrivelse</th>
        </tr>
        <tr>
            <td><img src="upload/<?php echo $row["bilde"]?>"></td>
            <td><input type="text" name="navn" value="<?php echo $row['navn']?>"></td>
            <td>
                <input type="radio" name="type" value="f" required>Forrett<br>
                <input type="radio" name="type" value="h" required>Hovedrett<br>
                <input type="radio" name="type" value="d" required>Dessert
            </td>
            <td><input type="number" name="pris" style="width: 80px" value="<?php echo $row['pris']?>"> kr</td>
            <td><textarea name="informasjon" cols="30" rows="6"><?php echo $row['informasjon']?></textarea></td>
        </tr>
    </table>
    <br>
    <input type="submit" name="submit" value="Lagre">
    </form>
    <button onclick="location.href = 'meny.php'">Avbryt</button>
    
    <?php
    $value = $row['type'];
    echo "<script>document.querySelector('input[value=$value]').checked = true;</script>"; 
    ?>
</body>

</html>
