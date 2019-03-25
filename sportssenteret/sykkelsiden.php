<!doctype html>
<html>

<head>
    <title>Stor konkurranse - Sportssenteret A/S</title>
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
            <h1>Stor konkurranse</h1>
        </div>

        <div class="content">
            <div class="flex align-center">
                <div>
                    <h2>Vinn en sykkel</h2>
                    <p>Vi arrangerer en stor konkurranse for våre besøkende. Premien er en ny sykkel fra Merida. Vi trekker ut vinneren i vår forretning 22.12.2018.</p>

                    <h2>Regler</h2>
                    <p>Det eneste du trenger å gjøre er å besøke vår forening og fylle ut et registreringsskjema. Vi trekker ut den heldige vinneren blant de innleverte skjemaene. Lykke til!
                    <a href="deltakere.php">Vis deltakere.</a></p>
                </div>
                <div>
                    <img class="full-width" src="bilder/merida.jpg">
                </div>
            </div>
            
            <h2>Fyll ut skjema her!</h2>
            
            <form action="" method="post">
                <h3>Fornavn</h3>
                <input type="text" name="fornavn" placeholder="Fornavn">
                
                <h3>Etternavn</h3>
                <input type="text" name="etternavn" placeholder="Etternavn">
                
                <h3>Telefon</h3>
                <input type="text" name="telefon" placeholder="Telefon">
                
                <h3>Hvilket merke har sykkelen?</h3>
                <input type="text" name="s1" placeholder="Skriv inn svar">
                
                <h3>Når ble Sportssenteret etablert?</h3>
                <input type="text" name="s2" placeholder="Skriv inn svar">
                
                <h3>Hvorfor fortjener du å vinne sykkelen?</h3>
                <input type="text" name="s3" placeholder="Skriv inn svar">
                
                <br><br>
                <input type="submit" name="submit" value="Meld deg på">
            </form>
            
            <?php
                $servernavn = "localhost";
                $brukernavn = "root";
                $passord = "";
                $dbnavn = "konkurranse";

                $tilkobling = mysqli_connect($servernavn, $brukernavn, $passord, $dbnavn);

                if($tilkobling->connect_error) {
                    die("Noe gikk galt: " . $tilkobling->connect_error);
                }

                $tilkobling->set_charset("utf8");

                if(isset($_POST["submit"])) {
                    $fornavn = $_POST["fornavn"];
                    $etternavn = $_POST["etternavn"];
                    $telefon = $_POST["telefon"];
                    $s1 = $_POST["s1"];
                    $s2 = $_POST["s2"];
                    $s3 = $_POST["s3"];

                    $sql = sprintf("INSERT INTO deltaker (fornavn, etternavn, telefon, sporsmol1, sporsmol2, sporsmol3) VALUES ('$fornavn', '$etternavn', '$telefon', '$s1', '$s2', '$s3')", 
                    $tilkobling->real_escape_string($fornavn),
                    $tilkobling->real_escape_string($etternavn),
                    $tilkobling->real_escape_string($telefon),
                    $tilkobling->real_escape_string($s1),
                    $tilkobling->real_escape_string($s2),
                    $tilkobling->real_escape_string($s3));

                    if($tilkobling->query($sql)) {
                        echo "<p><b>Du er nå påmeldt!</b></p>";

                    } 
                    else {
                        echo "<p><b>Noe gikk galt. $sql($tilkobling->error).</b></p>";
                    }
                }
            ?>
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