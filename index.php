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

function section($contenuto,$id){
    $stampa="<section id='$id'>".$contenuto."</section>";
    return $stampa;
}

function immagine($percorso,$alt,$width){
    // $percorso è l'url della mia immagine
    // $alt è il testo alternativo
    // $width è la larghezza dell'immagine
    $stampa="<img src='$percorso'  alt='$alt' width='$width'>";                   
    return $stampa;
}

function listadefinizioni($array){
    /* $array è un array di etichette e url
         ad es.
         $menu=array(
        'Anagrafica'=>'#anagrafica',
        'Studi'=>'#studi',
        'Esperienze pregresse'=>'#esperienzepregresse'
       );
     */
    $list.="<dl>";
    foreach ($array as $key => $value) {
        /*
         * <dt>Nome:</dt>
            <dd>Michele</dd>
        */
        $item="<dt>$key</dt>";
        $item="<dd>$value</dd>";
        $list.=$item;
    }
    $list.="</dl>";    
    return $list;
}

function menu($array){
    /* $array è un array di etichette e url
         ad es.
         $menu=array(
        'Anagrafica'=>'#anagrafica',
        'Studi'=>'#studi',
        'Esperienze pregresse'=>'#esperienzepregresse'
       );
     */
    $list="<nav id='menu'>";
    $list.=" <label for='tm' id='toggle-menu'>Navigation <span class='drop-icon'>▾</span></label>";
    $list.="<input type='checkbox' id='tm'>";
    $list.="<ul class='main-menu clearfix'>";
    foreach ($array as $key => $value) {
        $item="<li><a href= '$value'>$key</a></li>";
        $list.=$item;
    }
    $list.="</ul>";
    $list.="</nav>";
    
    return $list;
}

$menu=array(
    'Anagrafica'=>'#anagrafica',
    'Studi'=>'#studi',
    'Esperienze pregresse'=>'#esperienzepregresse'
);

$anagrafica=array(
    'Nome'=>'Michele',
    'Cognome'=>'Martinello',
    'Indirizzo'=>'#esperienzepregresse'
);

//print_r($menu);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Curriculum di Michele Martinello</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" type="text/css" href="css/stili.css">        
    </head>
    <body id="main">
        <?php 
        echo menu($menu);
        echo titoloh1('Michele Martinello');
        echo immagine('img/baffi.jpeg','il mio testo alternativo','300px'); 
        
        echo titoloh2('Anagrafica'); 
        echo section($contenuto, 'anagrafica');
        //echo paragrafo('Questo è il "mio primo paragrafo in php" visto?');       
        
        ?>
    </body>
</html>
