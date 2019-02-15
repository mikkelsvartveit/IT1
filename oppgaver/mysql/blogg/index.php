<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Blogg</title>
</head>
    
<body>
    <h1>Blogg</h1>
    
    <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blog";
    
        $con = new mysqli($server, $username, $password, $dbname);
    
        if($con->connect_error) {
            die("Noe gikk galt. $con->connect_error");
        }
    
        $sql = "SELECT * FROM blogpost";
        $data = $con->query($sql);
    
        while($row = mysqli_fetch_array($data)) {
            echo "<div>";
            echo "<h3>$row[title]</h3>";
            echo "<p><small><b>Publisert av $row[firstname] $row[lastname] <br>$row[datetime]</b></small></p>";
            echo "<p>$row[text]</p>";
            echo "<br></div>";
        }
    ?>
</body>

</html>