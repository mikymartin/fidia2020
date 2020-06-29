<?php
require 'conf.php';
echo 'Array Post:<br>';
echo '<pre>';
print_r($_POST);
echo '</pre>';
// stabilisco una connessione con il DB
$link = mysqli_connect( _host_ , _username_ , _password_ , _dbname_);

if (!$link) {
    echo "Error: Unable to connect to MySQL. <br>";
    echo "Debugging errno: " . mysqli_connect_errno() . "<br>";
    echo "Debugging error: " . mysqli_connect_error() . "<br>";
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great.<br>";
echo "Host information: " . mysqli_get_host_info($link) . "<br>";

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

// verifichiamo se l'operazione chiesta è un inserimento e se i campi title e content sono popolati
// inizializzo le variabili in modo che siano vuote
$submit='';
$title='';
$content='';

if($_POST['submit']=='inserisci'){
    $submit=$_POST['submit'];
}

if($_POST['title']!=''){
    $title=$_POST['title'];
}

if($_POST['content']!=''){
    $content=$_POST['content'];
}

if(($submit=='inserisci')&&($title!='')&&($content!='')){
    $query="INSERT INTO post (title,content) VALUES ('$title','$content')";
    echo $query;
}

mysqli_close($link);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inserimento</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="css/stili.css">        
    </head>
    <body id="main">
        <form enctype="multipart/form-data" action="insert.php" method="POST">
            <label for="title">Titolo:</label>
             <input type="text" id="title" name="title" placeholder="Metti il titolo al tuo post">
             
             <label for="content">Contenuto:</label>
             <input type="textarea" id="content" name="content" placeholder="Metti il contenuto del tuo post">
             <button type="submit" id="submit" name="submit" value="inserisci">Inserisci post</button>
             <button type="reset" id="annulla" name="annulla" value="annulla">Annulla inserimento</button>
        </form>
    </body>
</html>
