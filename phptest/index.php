<!doctype html>

<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:300|Open+Sans:400,500,600|Raleway:200,400,500,600" rel="stylesheet">

    <title>Nettside</title>
</head>

<body>
    <h1>Dette er en PHP-nettside.</h1>
    
    <?php
        $tall1 = 10;
        $tall2 = 4;
        
        $sum = $tall1 + $tall2;
        $differanse = $tall1 - $tall2;
        $produkt = $tall1 * $tall2;
        $kvotient = $tall1 / $tall2;
        
        echo "<h2>Dine tall er $tall1 og $tall2.</h2>";
        echo "<p>Summen er $sum</p>";
        echo "<p>Differansen er $differanse</p>";
        echo "<p>Produktet er $produkt</p>";
        echo "<p>Kvotienten er $kvotient</p>";
    ?>
    
    <h2>Hvilken måned er det?</h2>
    
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
    ?>
    
    <h2>Terning</h2>
    
    <?php
        $tall = rand(1, 6);
    
        if($tall == 1) {
            echo "<img src='bilder/1.png'>";
        } else if ($tall == 2) {
            echo "<img src='bilder/2.png'>";
        } else if ($tall == 3) {
            echo "<img src='bilder/3.png'>";
        } else if ($tall == 4) {
            echo "<img src='bilder/4.png'>";
        } else if ($tall == 5) {
            echo "<img src='bilder/5.png'>";
        } else if ($tall == 6) {
            echo "<img src='bilder/6.png'>";
        }
    ?>
</body>

</html>
