<?php
/**
 * Connexion à ma BDD (myISAM = boost perf)
 */
try {
$db = new PDO('mysql:host=localhost;dbname=portfolio', 'symfony', 'root' ); 
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Mon tableau associatif
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch(Exception $e){
    echo 'Impossible de se connecter à la base de donnée';
    echo $e->getMessage();
    die();
}

?>