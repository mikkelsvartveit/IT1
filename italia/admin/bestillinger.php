<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Se påmeldinger</title>
    <link href="admin.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>

<body>
    <?php
    if (!isset($_SERVER['PHP_AUTH_USER']) || !($_SERVER['PHP_AUTH_USER'] == "admin" && $_SERVER['PHP_AUTH_PW'] == "mikkel")) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo '<b>Du må logge inn for å få tilgang til denne siden</b>';
        exit;
    }
    
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
    
    <h1>Se påmeldinger</h1>
    
    <div>
        <div>
            <h2>Påmeldinger</h2>
            <table>
                <tr>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th>Klasse</th>
                    <th>Matretter</th>
                    <th>Sum</th>
                </tr>
                <?php 
                $data = $tilkobling->query("SELECT * FROM elev ORDER BY etternavn, fornavn");
                while($row = mysqli_fetch_array($data)) { 
                ?>
                <tr>
                    <td><?php echo $row["fornavn"]?></td>
                    <td><?php echo $row["etternavn"]?></td>
                    <td><?php echo $row["klasse"]?></td>
                    <td>
                        <ul>
                        <?php
                        $idelev = $row["idelev"];
                        $sql = "SELECT * FROM mat, matrett WHERE elev_idelev = $idelev AND idmatrett = matrett_idmatrett";
                        $data2 = $tilkobling->query($sql);
                        $pris = 0;
                        while($row2 = mysqli_fetch_array($data2)) {
                            echo "<li>" . $row2["navn"] . "</li>";
                            $pris += $row2["pris"];
                        }
                        ?>
                        </ul>
                    </td>
                    <td><?php echo "kr $pris,-" ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>
