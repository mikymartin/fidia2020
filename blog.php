<?php
// stabilisco una connessione con il DB
$link = mysqli_connect("192.168.64.2", "fidia", "12345", "test");

if (!$link) {
    echo "Error: Unable to connect to MySQL. <br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great.<br>";
echo "Host information: " . mysqli_get_host_info($link) . "<br>";

mysqli_close($link);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Il blog</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="css/stili.css">        
    </head>
    <body id="main">
        <h1>Il mio blog</h1>
    </body>
</html>
