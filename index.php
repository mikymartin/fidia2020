<?php
/* 
 * prima scrivere una funzione che stampi un paragrafo
 * poi una immagine
 * poi una funzione che stampi una lista, una lista di definizione ed un menu
 * poi una funzione che faccia tutte le cose in base al tipo di elemento html richiesto
 */

function paragrafo($contenuto){
    $contenuto=addslashes($contenuto);
    $stampa="<p>".$contenuto."</p>";
    return $stampa;
}

function titoloh1($contenuto){
    $stampa="<h1>".$contenuto."</h1>";
    return $stampa;
}

function titoloh2($contenuto){
    $stampa="<h2>".$contenuto."</h2>";
    return $stampa;
}

function immagine($percorso,$alt,$width){
    // $percorso è l'url della mia immagine
    // $alt è il testo alternativo
    // $width è la larghezza dell'immagine
    $stampa="<img src='$percorso'  alt='$alt' width='$width'>";                   
    return $stampa;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Curriculum di Michlele Martinello</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type='text/css' href='css/stili.css'>        
    </head>
    <body id="main">
    <?php  echo'<h1>Titolo delle dfff pagina</h1>'; ?>
        <?php  echo titoloh2('Il mio titolo h2'); ?>
        <?php  echo paragrafo('Questo è il "mio primo paragrafo in php" visto?'); ?>       
        <?php  echo immagine('img/baffi.jpeg','il mio testo alternativo','300px'); ?>
    </body>
</html>
