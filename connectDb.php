<?php
function connectDb(){
try{
    // se connecter en local ->
    // $db = new PDO('mysql:host=localhost;dbname=regaia', 'root', 'root');

    $db = new PDO('mysql:host=localhost;dbname=regaia;', 'regaia', '4qyk0I4p');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){

}
}