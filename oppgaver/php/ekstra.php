<!doctype html>
<html>

<head>
    <title>PHP oppgaver</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Ekstraoppgaver</h1>
    
    <h2>Yatzy</h2>
    <?php
    $yatzy = false;
    $antall = 0;
    while(!$yatzy) {
        $terninger = array();
        for($i = 0; $i < 5; $i++) {
            array_push($terninger, mt_rand(1, 6));
        }
        // "$terninger[0], $terninger[1], $terninger[2], $terninger[3], $terninger[4] <br>";
        
        if(count(array_unique($terninger)) == 1) {
            $yatzy = true;
        }
        
        $antall++;
    }
    
    echo "Yatzy! Du fikk yatzy etter $antall kast"
    ?>
    
    
</body>

</html>