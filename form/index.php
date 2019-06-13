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

// fonction pour l'header et le menu
function headerMenu(){
    echo'<html>
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" type="text/css" href="style.css">
            <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet"> 
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
            <!-- jquery 2.1.1 -->
            <script src="https://code.jquery.com/jquery-2.1.1.min.js" integrity="sha256-h0cGsrExGgcZtSZ/fRz4AwV+Nn6Urh/3v3jFRQ0w9dQ=" crossorigin="anonymous"></script>
            <title>REGAIA Anthony</title>
        </head>
            
        <!-- Start horizontal navigation -->
        <nav>
            <div id="op-horizontalnav">
                <ul class="op-sectionlist">
                    <li class="op-v-item"><a class="op-v-link" href="index.php?page=index">Home</a></li>
                    <li class="op-v-item"><a class="op-v-link" href="?page=presentation">Qui suis-je</a></li>
                    <li class="op-v-item"><a class="op-v-link" href="?page=services">Compétences</a></li>
                    <li class="op-v-item"><a class="op-v-link" href="?page=portfolio">Réalisations</a></li>
                    <li class="op-v-item"><a class="op-v-link" href="?page=contact">Contact</a></li>
                </ul>
            </div>
        </nav>';

}
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

