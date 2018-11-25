<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP Test</title>

    <style>
        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            text-align: center;
            padding: 5px;
        }
    </style>
</head>

<body>
    <h1>PHP intro</h1>
    <h2>PHP er lættis</h2>

    <?php
    $fornavn = "Mikkel";
    $etternavn = "Svartveit";
    echo "<p>Mitt navn er $fornavn $etternavn</p>";
    
    $tall1 = 67;
    $tall2 = 33;
    $sum = $tall1 + $tall2;
    echo("$tall1 + $tall2 = $sum");
    ?>

    <h2>Hvor mange kanter har min hatt?</h2>

    <?php
    $antall = 12;
    
    echo("Min hatt, den har $antall kanter, $antall kanter har min hatt. Og har den ei $antall kanter, så er det ei min hatt.");
    ?>

    <h2>Operatorer</h2>

    <?php
    $tall1 = 3456;
    $tall2 = 2347;
    $tekst1 = "Slække";
    $tekst2 = "Simen";
    
    $sum = $tall1 + $tall2;
    $differanse = $tall1 - $tall2;
    $produkt = $tall1 * $tall2;
    $kvotient = $tall1 / $tall2;
    
    $langtekst = $tekst1 . $tekst2;
    $bedretekst = $tekst1 . " " . $tekst2 . "'s gate";
    
    print("Summen blir $sum <br>");
    print("Differansen blir $differanse <br>");
    print("Produktet blir $produkt <br>");
    print("Kvotienten blir $kvotient <br>");
    
    print("<br><br>");
    
    print("$langtekst");
    print("<br>$bedretekst");
    ?>

    <h2>PHP-linker</h2>

    <?php
    echo "<a href='#'>Lenke</a>";
    ?>

    <h2>Valgsetninger</h2>

    <?php
    date_default_timezone_set("UTC");
    $date = date("m");
    $month;

    if ($date == "01") {
        $month = "januar";
    } else if ($date == "02") {
        $month = "februar";
    } else if ($date == "03") {
        $month = "mars";
    } else if ($date == "04") {
        $month = "april";
    } else if ($date == "05") {
        $month = "mai";
    } else if ($date == "06") {
        $month = "juni";
    } else if ($date == "07") {
        $month = "juli";
    } else if ($date == "08") {
        $month = "august";
    } else if ($date == "09") {
        $month = "september";
    } else if ($date == "10") {
        $month = "oktober";
    } else if ($date == "11") {
        $month = "november";
    } else if ($date == "12") {
        $month = "desember";
    } 

    $text = "Vi er i " . "<b>$month</b>.";
    echo "<p>$text<p>";
    
    $aar = 2001;
    if (date("Y") - $aar >= 18) {
        echo "<p>Du er over 18 år</p>";
    } else {
        echo "<p>Du er under 18 år</p>";
    }
    
    echo "<h3>Magic 8-ball</h3>";
        
    $tall = rand(1, 4);
    $svar;
    
    if($tall == 1) {
        $svar = "Ja";
    } else if($tall == 2) {
        $svar = "Nei";
    } else if($tall == 3) {
        $svar = "Kanskje";
    } else if($tall == 4) {
        $svar = "Vet ikke";
    }
    
    echo "Svaret er: $svar!";
    ?>

    <h2>Løkker</h2>

    <?php
    $i = 1;
    while($i <= 15) {
        echo "$i ";
        $i = $i + 1;
    }
    echo "<br>";
    
    for($i = 1; $i <= 15; $i++) {
        echo "$i ";
    }
    echo "<br>";
    
    $i = 0;
    while($i < 42) {
        echo "IT1 ";
        $i++;
    }
    echo "<br>";
    
    for($i = 0; $i < 42; $i++) {
        echo "IT1 ";
    }
    echo "<br>";
    
    for($i = 2; $i <= 20; $i += 2) {
        echo "$i ";
    }
    echo "<br><br>";
    
    echo "<table>";
    for($i = 1; $i <= 12; $i++) {
        echo "<tr><td>Rad $i kolonne 1</td><td>Rad $i kolonne 2</td></tr>";
    }
    echo "</table><br>";
    
    echo "<table>";
    for($i = 1; $i <= 10; $i++) {
        echo "<tr>";
        for($j = 1; $j <= 10; $j++) {
            $num = $i * $j;
            echo "<td>$num</td>";
        }
        echo "</tr>";
    }
    echo "</table><br>";
    ?>

    <h2>Arrayer</h2>

    <?php
    $figurer = array("Langbein", "Asterix", "Skrue McDuck", "Donald Duck", "Mikke Mus");
    
    echo "<h3>Noen tegneseriefigurer</h3>";
    for($i = 0; $i < count($figurer); $i++) {
        echo "Figur med indeks $i: $figurer[$i] <br>";
    }
    
    echo '<h3>Arrayen $figurer</h3>';
    var_dump($figurer);
    echo "<p>$figurer[2]</p>";
    ?>

    <?php
    $art = array("Langbein"=>"Hund", "Asterix"=>"Menneske", "Skrue McDuck"=>"And");
    
    echo "<p>Langbein er en " . $art["Langbein"] . ".</p>";
    
    echo '<h3>Arrayen $art</h3>';
    var_dump($art);
    echo "<br><br>";
    echo $art["Skrue McDuck"];

    $tall = array(2, 45, 12, 9, 79);
    $sum = 0;
    foreach($tall as $index) {
        $sum += $index;
    }
    echo "<p>Summen av tallene er $sum</p>";
    
    $farge = array("Spar", "Kløver", "Hjerter", "Ruter");
    $tall = array("ess", "2", "3", "4", "5", "6", "7", "8", "9", "10", "knekt", "dame", "konge");
    
    $randFarge = rand(0, 3);
    $randTall = rand(0, 12);
    
    $tilfeldigKort = $farge[$randFarge] . " " . $tall[$randTall];
    echo "Du trakk kortet $tilfeldigKort!";
    ?>
    
    <h2>Inkludere filer</h2>
    
    <?php
    include("inkluder.php");
    ?>
</body>

</html>
