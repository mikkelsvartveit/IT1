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
    <?php
    if(isset($_GET["sendinn"])) {
        $navn = $_GET["dittnavn"];
        $film = $_GET["favorittfilm"];
        echo "<p>Du heter $navn. Din favorittfilm er $film.</p>";
    }
    ?>
</body>

</html>
