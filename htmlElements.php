<?php

include_once 'connectDb.php';

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