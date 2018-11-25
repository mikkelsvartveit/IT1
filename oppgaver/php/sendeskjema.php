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
    <form method="GET">
        Hva er dine 3 favorittfilmer?
        <input type="text" name="film1">
        <input type="text" name="film2">
        <input type="text" name="film3">
        
        <input type="submit" name="sendinn" value="Send inn">
    </form>
    
    <?php
    if(isset($_GET["sendinn"])) {
        $film1 = $_GET["film1"];
        $film2 = $_GET["film2"];
        $film3 = $_GET["film3"];
        echo "<p>Dine favorittfilmer er:</p>";
        echo "<ol><li>$film1</li><li>$film2</li><li>$film3</li></ol>";
    }
    ?>
</body>

</html>
