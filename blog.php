<?php
require 'conf.php';

// stabilisco una connessione con il DB
$link = mysqli_connect( _host_ , _username_ , _password_ , _dbname_);

if (!$link) {
    echo "Error: Unable to connect to MySQL. <br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}

/*echo "Success: A proper connection to MySQL was made! The my_db database is great.<br>";
echo "Host information: " . mysqli_get_host_info($link) . "<br>";*/

/*Query che seleziona tutti i record della tabella post*/
$query = "SELECT * FROM post";

/* eseguo la query con la funzione mysqli_query e salvo il risultato in una variabile $result
    la funzione accetta due parametri:
    il primo ($link) è l'oggetto che rappresenta la connessione con il DB, il secondo è la query
    con cui viene interrogato il DB
*/
$result=mysqli_query($link,$query);/*i risultati dell'interrogazione 
vengono salvati in un oggetto di tipo risorsa di database ed assegnati alla 
variabile $result*/



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
    <?php
        while($row = mysqli_fetch_assoc($result)){
        echo'<article>';
        echo '<h2>'.$row['title'].'</h2>';
        echo '<div class="content">'.excerpt($row['content'], 140).'</div>';
        echo'<a href="update.php?id='.$row['id'].'" class="button">Modifica</a>';
        echo'</article>';     
        }
    ?>
    </body>
</html>
