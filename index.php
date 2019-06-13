<?php

try{
    // se connecter en local ->
    // $db = new PDO('mysql:host=localhost;dbname=regaia', 'root', 'root');

    $db = new PDO('mysql:host=localhost;dbname=regaia;', 'regaia', '4qyk0I4p');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){

}
include_once 'form/home.php';
include_once 'form/presentation.php';
include_once 'form/portfolio.php';
include_once 'form/services.php';
include_once 'form/contact.php';
include_once 'htmlElements.php';
// donne une valeur à $page
$page="index";

if (isset($_GET['page'])){
    $page = $_GET['page'];
}
// si page = index, affichage de la page index
if ($page=="index"){
    headerMenu();
// recuperation de l'image dans la db
    formHome($db);

};
// si page = presentation, affichage de la page presentation
if ($page=="presentation"){
    headerMenu();
// Récupération des données dans la db
    formPresentation($db);

};

// si page = services, affichage de la page services
if ($page=="services"){
    headerMenu();
// Récupération des données dans la db
    formServices($db);

};

// si page = portfolio, affichage de la page portfolio
if ($page=="portfolio"){
    headerMenu();
// Récupération des données dans la db
    formPortfolio($db);

};

// si page = contact, affichage de la page contact
if ($page=="contact"){
    headerMenu();
// Récupération des données dans la db
    formContact($db);

};


function crudDb(PDO $db, $request,$params =[])
{
    try {
        $reponse = $db->prepare($request);
        $reponse->execute($params);
    } catch (Exception $ex) {

    }
    return $reponse;
}

