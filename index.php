<?php
/* 
 * prima scrivere una funzione che stampi un paragrafo
 * poi una immagine
 * poi una funzione che stampi una lista, una lista di definizione ed un menu
 * poi una funzione che faccia tutte le cose in base al tipo di elemento html richiesto
 */
// genera un paragrafo <p>
function paragrafo($contenuto){
    $contenuto=addslashes($contenuto);
    $stampa="<p>".$contenuto."</p>";
    return $stampa;
}
// genera un titolo <h1>
function titoloh1($contenuto){
    $stampa="<h1>".$contenuto."</h1>";
    return $stampa;
}
// genera un titolo <h2>
function titoloh2($contenuto){
    $stampa="<h2>".$contenuto."</h2>";
    return $stampa;
}
// genera una section <section id='$id'>
function section($contenuto,$id,$array=NULL){
        // se passo $param['title'], un titolo, lo stampo altrimenti no
        if(array_key_exists('title',$array)&&($array['title']!='')){
        $titolo=$array['title'];
        $sectiontitle=titoloh2($titolo);
        }else{
        $sectiontitle='';
        }
    $stampa="<section id='$id'>".$sectiontitle.$contenuto."</section>";
    return $stampa;
}

//genera un immagine <img src='$percorso'  alt='$alt' width='$width'>";    
function immagine($percorso,$alt,$width){
    $stampa="<img src='$percorso'  alt='$alt' width='$width'>";                   
    return $stampa;
}
//genera una lista <dl>, <dt><dd>
function listadefinizioni($array){
    $list="<dl>";
    foreach ($array as $key => $value) {
        $item="<dt>$key</dt>";
        $item.="<dd>$value</dd>";
        $list.=$item;
    }
    $list.="</dl>";    
    return $list;
}
// genera un menu <ul>....<li><a href= '$value'>$key</a></li>...</ul>
function menu($array){
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

// genera una lista <ul class='$class'><li><a href= '$value'>$key</a></li>...</ul>
function lista($array,$class=NULL){
    if($class != NULL){
      $list="<ul class='$class'>";   
    }else{
      $list="<ul>";  
    }
    foreach ($array as $key => $value) {
        $item="<li><a href= '$value'>$key</a></li>";
        $list.=$item;
    }
    $list.="</ul>";
    return $list;
}



function element($tipo,$contenuto,$array=NULL){
    if($tipo=='titolo1'){
        $result= titoloh1($contenuto);
    }
    if($tipo=='titolo2'){
        $result= titoloh2($contenuto);
    }
    if($tipo=='paragrafo'){
        $result= paragrafo($contenuto);
    }
    if($tipo=='sezione'){
        if(array_key_exists('id',$array)&&($array['id']!='')){
            $id=$array['id'];
            $result= section($contenuto,$id,$array);
        }else{
            $result="<p>Ti sei dimenticato l'id</p>";
        }
        
    }   
    if($tipo=='img'){
        if(array_key_exists('url',$array)&&($array['url']!='')&&(array_key_exists('alt',$array)&&($array['alt']!=''))&&(array_key_exists('width',$array)&&($array['width']!=''))){
            $url=$array['url'];
            $alt=$array['alt'];
            $width=$array['alt'];
            $result= immagine($url,$alt,$width);
        }else{
            $result="<p>Ti sei dimenticato uno dei parametri immagine</p>";
        }
    }
    
    if($tipo=='listadef'){
        $result= listadefinizioni($contenuto);
    }
    
    return $result;
}

//element('titolo1', 'Il mio titolo 1', NULL)

$menu=array(
    'Anagrafica'=>'#anagrafica',
    'Studi'=>'#studi',
    'Esperienze pregresse'=>'#esperienzepregresse'
);

$anagrafica=array(
    'Nome'=>'Michele',
    'Cognome'=>'Martinello',
    'Indirizzo'=>'Via G. di Vittorio 29, Locate di Triulzi, 20085 (MI)'
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
            /*echo titoloh1('Michele Martinello');
            echo immagine('img/baffi.jpeg','il mio testo alternativo','300px'); 

            echo titoloh2('Anagrafica'); 
            echo section(listadefinizioni($anagrafica), 'anagrafica');

            echo section(paragrafo('Ho messo un paragrafo qui'), 'altrasezione');
            //echo paragrafo('Questo è il "mio primo paragrafo in php" visto?');*/
            
            //definisco il valore della variabile $param, per inizializzarla utilizzo un array vuoto
            $param=array();
            echo element('titolo1','Michele Martinello');
            echo element('img',NULL,array('url'=>'img/baffi.jpeg','alt'=>'il mio testo alternativo','width'=>'40%'));

            // questo funziona
            echo element('sezione', 'contenuto della sezione', array('id'=>'anagrafica','title'=>'Titolo della sezione'));
            
            //provo a rimuovere il valore di ['id'], nell'array rimane solo la width
            $param['id']=null;
            // non trovando id non stamperà la sezione
            echo element('sezione', 'contenuto della seconda sezione', $param);
        ?>
    </body>
</html>
