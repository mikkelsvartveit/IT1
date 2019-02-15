<?php
if(isset($_POST["send"])) {
    $address = $_POST["email"];
    $message = $_POST["message"];
    
    $subject = "Someone sent you an anonymous message!";
    $body = "Hi there! Someone just sent you an anonymous message:" .
            "\n\n" .
            "\"$message\"" .
            "\n\n" .
            "To send your own anonymous messages, " .
            "visit secretchat.web-hotell.net";
    
    mail($address, $subject, $body);
}
?>

<!doctype html>
<html>
<head>
    <title>SecretChat</title>
    
    <style>
        * {
            text-align: center;
            font-family: sans-serif;
        }
        
        input, textarea {
            display: block;
            margin: 10px auto;
        }
        
        .green {
            color: darkgreen;
        }
    </style>
</head>
    
<body>
    <h1>SecretChat</h1>
    <p>Send anonymous messages to any email address!</p>
    
    <form action="index.php" method="post">
        <input type="email" name="email" placeholder="Email address" size="35" required>
        <textarea name="message" placeholder="Your message" rows="6" cols="40" required></textarea>
        <input type="submit" name="send" value="Send message">
    </form>
    
    <?php
    if(isset($_POST["send"])) {
        echo "<p class='green'><b>Your message was successfully sent!</b></p>";
    }
    ?>
</body>
</html>