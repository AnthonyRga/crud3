<?php

include_once 'connectDb.php';

// Function pour afficher le form connexion
function displayForm(){

    echo '
    <!-- coreUI script bootstrap & Font awesome -->
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"><br><br>

    <!--  Connexion -->
    <div class="d-flex justify-content-center">
        <form class="card" style="width: 20rem;padding-top: 30px;;padding-bottom: 50px;padding-left:15px;" method="post" action="">
    <div class="border border-white rounded" style="width:93%;background-color:#60b3da;">
        <p class="text-white" style="padding-top:10px;padding-left:10px;">Entrez vos informations de connexion</p></div>

    <!-- User -->
    <div class="d-flex"><label class="text-muted" style="margin-top:25px;" for="login"><b>Nom d\'utilisateur</b></label></div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
        <span class="input-group-text border border-secondary" id="basic-addon1"><i class="fas fa-user"></i></span>
    </div>
        <input type="text" name="login" id="login" class="border border-secondary" style="width:80%;" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    
    <!-- Mdp -->
    <div class="d-flex"><label class="text-muted" for="password"><b>Mot de passe</b></label></div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text border border-secondary" id="basic-addon1"><i class="fas fa-lock"></i></span>
        </div>
            <input type="password" name="password" class="border border-secondary" style="width:80%;" aria-label="Username" aria-describedby="basic-addon1">
        </div>
            <div class="d-flex"><input type="submit" class="btn btn-secondary" value="Connexion"></div>
    </form>
</div>';

}

function isFormPosted(){
    if(count($_POST)>0){
        return true;
    }
    return false;
}
// Vérifie si les champs sont remplis
function isFormValid(){
    if (!isset($_POST['login']) || !isset($_POST['password'])) {
        echo 'Tous les champs doivent être remplis !';
        return false;
    }

    return true;

}

function regex(){
    $login='';
    $pass='';

if(preg_match('`^([a-zA-Z0-9-_]{2,12})$`', $login,$pass))
    echo 'OK!';
else
    echo '<div class="alert alert-danger text-center" role="alert">Informations invalides !<br> Veuillez réessayer.</div>';
}
// détruit la session
if (isset($_GET['logout'])){
    session_destroy();
    header('Location: /cms3/login.php');
}
// si le user est log, montre le contenu caché sinon redemande une connexion
if (isUserLogged()){
    displayProtectedContent($db);
}
else{
    if (isFormSubmitted()){
        regex();
    }
    displayForm();
}
// Fonction pour créer une session
function sessionExists(){
    return isset($_SESSION['token']);
}
// Fonction pour créer un token
function addSessionToken(){
    $_SESSION['token'] =   uniqid();
}
// Vérifie s'il y'a un post
function isFormSubmitted(){
    return count($_POST);
}
// Vérifie si l'user est logg
function isUserLogged(){
    if (sessionExists()){
        return true;
    }
    $login = 'anthony';
    $pass = "regaia1103";

    if (isset($_POST['login']) && isset($_POST['password'])){
        if ($_POST['login'] === $login && $_POST['password'] === $pass){
            addSessionToken();
            return true;
        }
    }

    return false;
}




