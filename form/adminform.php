<?php

//coreUI script bootstrap
echo '<link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">';
echo '<link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">';
echo '<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>';
echo '<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>';
echo '<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>';

// formHome
function formHome()
{
    echo '<form method="post" action="">';
    echo '<label for="titre">Titre&nbsp;&nbsp;:</label>';
    echo '<input type="text" name="titre">';
    echo '<br>';
    echo '<label for="texte">Texte :</label>';
    echo '<input type="text" name="texte">';
    echo '<br>';
    echo '<button class="btn btn-secondary" type="submit">Valider</button>';
    echo '</form>';
}
// formHobbys "ajouter un hobby"
function formHobbys()
{
    echo '<form method="post" action="">';
    echo '<label for="hobbys">Ajouter un hobby</label>';
    echo '<input style="width:100%;" type="text" name="hobbys">';
    echo '<button class="btn btn-secondary" type="submit">Envoyer</button>';
    echo '</form>';
}
// formHobbys2 "update un hobby"
function formHobbys2()
{
    echo '<form method="post" action="">';
    echo '<label for="hobbys">Update un hobby</label>';
    echo '<input style="width:100%;" type="text" name="hobbys">';
    echo '<button class="btn btn-secondary" type="submit">Envoyer</button>';
    echo '</form>';
}
// formComp "insérer une compétence"
function formComp()
{
    echo '<form method="post" action="">';
    echo '<label for="competence">Ajouter une compétence</label>';
    echo '<input style="width:100%;" type="text" name="competence">';
    echo '<button class="btn btn-secondary" type="submit">Envoyer</button>';
    echo '</form>';
}
// forComp2 "update une compétence"
function formComp2()
{
    echo '<form method="post" action="">';
    echo '<label for="competence">Update une compétence</label>';
    echo '<input type="text" name="competence">';
    echo '<button class="btn btn-pill btn-primary" type="submit">Envoyer</button>';
    echo '</form>';
}
// formImage
function formImage(){
    echo '<form method="post" action="" enctype="multipart/form-data">';
    echo '<label for="nom_dossier">Nom dossier&nbsp;&nbsp;</label>';
    echo '<input style="width:100%;" type="text" name="nom_dossier" required>';
    echo '<br>';
    echo '<label for="nom_fichier">Nom fichier&nbsp;&nbsp;&nbsp;</label>';
    echo '<input style="width:100%;" type="text" name="nom_fichier" required>';
    echo '<br>';
    echo '<label for="extension">Extension&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>';
    echo '<input style="width:100%;" type="text" name="extension" required>';
    echo '<br>';
    echo '<label for="position">Veuillez confirmer la page de l\'image</label>';
    echo '<input style="width:100%;" type="text" name="position" required>';
    echo '<br>';
    echo '<label for="avatar">Choisir image</label>';
    echo '<input type="file" name="avatar" id="avatar" required>';
    echo '<br>';
    echo '<button class="btn btn-secondary" type="submit">Envoyer</button>';
    echo '</form>';
}
function formFooter()
{
    echo '<form method="post" action="">';
    echo '<label for="email">Nouvel email :</label>';
    echo '<input type="text" name="email">';
    echo '<br>';
    echo '<label for="linkedin">Nouveau Linkedin :</label>';
    echo '<input type="text" name="linkedin">';
    echo '<br>';
    echo '<label for="facebook">Nouveau Facebook :</label>';
    echo '<input type="text" name="facebook">';
    echo '<br>';
    echo '<button class="btn btn-secondary" type="submit">Valider</button>';
    echo '</form>';
}
// formPresentation
function formPresentation()
{
    echo '<form method="post" action="">';
    echo '<label for="age">Nouvel âge :</label>';
    echo '<input type="text" name="age">';
    echo '<br>';
    echo '<label for="commune">Nouvelle commune :</label>';
    echo '<input type="text" name="commune">';
    echo '<br>';
    echo '<label for="presentation">Nouvelle présentation :</label>';
    echo '<input type="text" name="presentation">';
    echo '<br>';
    echo '<button class="btn btn-secondary" type="submit">Valider</button>';
    echo '</form>';
}