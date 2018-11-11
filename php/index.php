<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>PHP Test</title>
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
    $tekst2 = "Simens";
    
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
        
    $tall = rand(1, 5);
    $svar;
    
    if($tall == 1) {
        $svar = "Ja";
    } else if($tall == 2) {
        $svar = "Nei";
    } else if($tall == 3) {
        $svar = "Kanskje";
    } else if($tall == 4) {
        $svar = "Vet ikke";
    } else if($tall == 5) {
        $svar = "Dra på fest";
    }
    
    echo "Svaret er: $svar!";
    ?>
    
    <h2>Løkker</h2>
    
    <?php
    $tall = 1;
    
    while($tall <= 15) {
        echo "$tall, ";
        $tall = $tall + 1;
    }
    ?>
</body>

</html>
