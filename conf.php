<?php
/* Parametri di connessione al DB */
define("_host_", "192.168.64.2");
define("_username_", "fidia");
define("_password_", "12345");
define("_dbname_", "test");

function excerpt($string,$length)
{
    /*  Questa funzione serve a crare un excerpt, una versione accorciata di un testo,
        un riassunto...
        prevede due parametri:
        
        $string, tipo stringa, corrisponde al testo da troncare
        $lenght, tipo numerico intero, corrisponde al numero di caratteri da conservare (la lunghezza del riassunto)
    */
    
    $str_len = strlen($string); // misura la lunghezza della stringa (cercate strlen nel manuale di php.net)
    $string = strip_tags($string); // rimuove i tag html che trova, 
    //per evitare che la troncatura spezzi a metà un tag (cercate strip_tags su php.net)

    if ($str_len > $length) {

        // substr preleva una parte della string $string, da 0 al numero inserito come $lenght -15
        $stringCut = substr($string, 0, $length-15);
        $string = $stringCut.'...'; // concateniamo i tre puntini (in inglese si chiamano ellipses) alla fine della stringa tagliata
    }
    return $string;
}

?>
