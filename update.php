<?php
require 'conf.php';
// inizializzo le variabili in modo che siano vuote
$submit='';
$title='';
$content='';
$messaggio='';
$id=0;

if(isset($_GET['id'])&&($_GET['id']!='')){
    $id=$_GET['id'];
}

if(isset($_POST['submit'])&&($_POST['submit']=='modifica')){
    $submit=$_POST['submit'];
}

if(isset($_POST['title'])&&($_POST['title']!='')){
    $title=$_POST['title'];
}

if(isset($_POST['content'])&&($_POST['content']!='')){
    $content=$_POST['content'];
}

echo 'Array Get:<br>';
echo '<pre>';
print_r($_GET);
echo '</pre>';

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

/*echo "Success: A proper connection to MySQL was made! The my_db database is great.<br>";
echo "Host information: " . mysqli_get_host_info($link) . "<br>";*/
if($id){
    /*Query che seleziona il record con id fornito*/
$query = "SELECT * FROM post WHERE id=$id";
//echo $query;
/* eseguo la query con la funzione mysqli_query e salvo il risultato in una variabile $result
    la funzione accetta due parametri:
    il primo ($link) è l'oggetto che rappresenta la connessione con il DB, il secondo è la query
    con cui viene interrogato il DB
*/
$result=mysqli_query($link,$query);/*i risultati dell'interrogazione 
/*vengono salvati in un oggetto di tipo risorsa di database ed assegnati alla 
variabile $result*/
}


// verifichiamo se l'operazione chiesta è un inserimento e se i campi title e content sono popolati

if(($submit=='modifica')&&($title!='')&&($content!='')){
    $query="UPDATE  post SET title='$title', content='$content' WHERE id=";
    echo $query;
    
    //$result=mysqli_query($link,$query);
    
    $messaggio="<p class='evidenzia'>Modifica riuscita</p>";
}

while($row = mysqli_fetch_assoc($result)){
    $title=$row['title'];
    $content=$row['content'];
}

mysqli_close($link);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="css/stili.css">        
    </head>
    <body id="main">
        <form enctype="multipart/form-data" action="update.php" method="POST">
            <label for="title">Titolo:</label>
            <input type="text" id="title" name="title" placeholder="Metti il titolo al tuo post" value="<?php echo $title ?>">
             
             <label for="content">Contenuto:</label>
           
             <textarea rows="4" cols="50" id="content" name="content" placeholder="Metti il contenuto del tuo post"><?php echo $content ?></textarea>
             
             <button type="submit" id="submit" name="submit" value="modifica">Modifica post</button>
             <button type="reset" id="annulla" name="annulla" value="annulla">Annulla inserimento</button>
        </form>
        <?php echo $messaggio; ?>
    </body>
</html>
