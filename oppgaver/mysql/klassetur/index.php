<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Klassetur</title>
</head>
    
<body>
    <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "klassetur";
    
        $conn = new mysqli($server, $username, $password, $dbname);
    
        if($conn->connect_error) {
            echo "Tilkobling feilet: $conn->connect_error";
        }
    
        $conn->set_charset("utf-8");
    
        if(isset($_POST["registrer"])) {
            $fornavn = $_POST["fornavn"];
            $etternavn = $_POST["etternavn"];
            $adresse = $_POST["adresse"];
            $telefon = $_POST["telefon"];
            
            $sql = "INSERT INTO reisedeltaker (fornavn, etternavn, adresse, telefon) 
            VALUES ('$fornavn', '$etternavn', '$adresse', '$telefon')";

            if($conn->query($sql)) {
                echo "Du er nå registrert.";
            } else {
                echo "Det oppstod en feil: " . $conn->error;
            }
        }
    
        $sql = "SELECT * FROM reisedeltaker";
        $datasett = $conn->query($sql);
    
        if(isset($_POST["send_logg"])) {
            $deltaker_id = $_POST["deltaker_id"];
            $logg = $_POST["logg"];
            
            $sql = "INSERT INTO logg (dato, skrivefelt, deltakerid) VALUES (curdate(), '$logg', '$deltaker_id')";

            if($conn->query($sql)) {
                echo "Din logg er sendt inn!";
            } else {
                echo "Det oppstod en feil: " . $conn->error;
            }
        }
    ?>
    
    <h2>Registrer deg:</h2>
    <form action="" method="post">
        <h3>Fornavn:</h3>
        <input type="text" name="fornavn">
        <br>
        
        <h3>Etternavn:</h3>
        <input type="text" name="etternavn">
        <br>
        
        <h3>Adresse:</h3>
        <input type="text" name="adresse">
        <br>
        
        <h3>Telefonnummer:</h3>
        <input type="text" name="telefon">
        <br>
        
        <br>
        <input type="submit" name="registrer" value="Registrer">
    </form>
    
    <br><br>
    
    <h2>Skriv logg:</h2>
    <form action="" method="post">
        <h3>Velg elev:</h3>
        <select name="deltaker_id">
            <?php while($rad=mysqli_fetch_array($datasett)) { ?>
            <option value="<?php echo $rad["deltakerid"]; ?>">
                <?php echo $rad["fornavn"]; ?> 
                <?php echo $rad["etternavn"]; ?>
            </option>
            <?php } ?>
        </select>
        <br>
        
        <h3>Skriv din logg her:</h3>
        <textarea name="logg" rows="6" cols="50"></textarea>
        <br>
        
        <br>
        <input type="submit" name="send_logg" value="Send inn logg">
    </form>
    
    <br><br>
</body>
</html>