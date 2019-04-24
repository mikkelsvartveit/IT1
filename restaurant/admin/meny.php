<!doctype html>
<html>
    
<head>
    <meta charset="utf-8">
    <title>Administrer meny</title>
</head>
<body>
    <h1>Administrer meny</h1>
    
    <h2>Legg til matrett</h2>
    <form action="" method="post" enctype="multipart/form-data">        
        Navn på matrett: <input type="text" name="navn"><br><br>
        
        Type: <input type="radio" name="type" value="f">Forrett
        <input type="radio" name="type" value="h">Hovedrett
        <input type="radio" name="type" value="d">Dessert<br><br>
        
        Pris: <input type="number" name="navn"> kr<br><br>
        
        Bilde: <input type="file" name="fil" id="fil"><br><br>            
        
        Beskrivelse: <br><textarea name="beskrivelse" id="beskrivelse" cols="40" rows="6"></textarea><br><br>
        
        <input type="submit" name="submit" id="submit" value="Legg til matrett">
    </form>
    
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
</body>
    
</html>