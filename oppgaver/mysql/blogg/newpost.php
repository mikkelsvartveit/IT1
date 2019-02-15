<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Blogg</title>
</head>
    
<body>
    <h1>Skriv nytt innlegg</h1>
    
    <form action="" method="post">
        <h3>Fornavn: </h3>
        <input type="text" name="firstname">
        
        <h3>Etternavn: </h3>
        <input type="text" name="lastname">
        
        <h3>Tittel: </h3>
        <input type="text" name="title">
        
        <h3>Skriv ditt innlegg: </h3>
        <textarea cols="80" rows="20" name="text"></textarea>
        
        <br><br>
        <input type="submit" name="publish" value="Publiser">
    </form>
    
    <?php
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "blog";
    
        $con = new mysqli($server, $username, $password, $dbname);
    
        if($con->connect_error) {
            die("Noe gikk galt. $con->connect_error");
        }
    
        if(isset($_POST["publish"])) {
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $title = $_POST["title"];
            $text = $_POST["text"];
            
            $sql = "INSERT INTO blogpost (firstname, lastname, datetime, title, text) VALUES ('$firstname', '$lastname', NOW(), '$title',  '$text')";
            
            if($con->query($sql)) {
                echo "<b>Ditt innlegg er nå publisert</b>";
                echo "<script>window.location = 'index.php'</script>";
            } else {
                echo "<b>Det oppstod en feil. $sql($con->error)</b>";
            }
        }
    ?>
</body>

</html>