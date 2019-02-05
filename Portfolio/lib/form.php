<?php
/**
 * Une fonction qui me pertmet d'afficher l'id de l'username dans le champ même après un _POST
 */
function input($id){
    $value = isset($_POST[$id]) ? $_POST[$id] : '';
    return "<input type='text' class='form-control' id='$id' name='$id' value='$value'>";
}


?>