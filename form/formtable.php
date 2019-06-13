<?php

include_once 'connectDb.php';

//coreUI script bootstrap
echo '
<link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
<link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">';

//================= formeTableHome
function formTableHome($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Titre</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Texte</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td class="border-bottom bg-white">'.$line['titre'].'</td>';
        echo '<td class="border-bottom bg-white">'.$line['texte'].'</td>';
        echo '<td class="border-bottom text-success bg-white"><a class="btn btn-success" href="?table=home&action=update&id='.$line['id'].'">Update</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//---------------- FormTableHome2 AFFICHAGE UPDATE
function formTableHome2($lines){

    foreach ($lines as $line){
        echo '<form method="post" action="">';
        echo '<label for="titre">Titre :</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['titre'].'" name="titre" >';
        echo '<br>';
        echo '<label for="titre">Texte :</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['texte'].'" name="texte" >';
        echo '<button class="btn btn-secondary" type="submit">Valider</button>';
        echo '</form>';
    }
}
//================= formeTableHobbys
function formTableHobbys($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Mes hobbys</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Delete</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){
        echo '<tr>';
        echo '<td class="border-bottom bg-white">'.$line['hobbys'].'</td>';
        echo '<td class="border-bottom bg-white"><a class="btn btn-success" href="?table=hobbys&action=update&id='.$line['id'].'">Update</a></td>';
        echo '<td class="border-bottom bg-white"><a class="btn btn-danger" href="?table=hobbys&action=delete&id='.$line['id'].'">Delete</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//---------------- FormTableHobbys2 AFFICHAGE UPDATE
function formTableHobbys2($db){
    $id = $_GET['id'];
    $request="SELECT * FROM `hobbys` WHERE `id` = $id";
    $reponse=crudDb($db,$request);
    $lines = $reponse->fetchAll();

    foreach ($lines as $line){
    echo '<form method="post" action="">';
    echo '<label for="hobbys">Hobby à update : </label>';
    echo '<input style="width:100%;" type="text" value="'.$line['hobbys'].'" name="hobbys" >';

    echo '<button class="btn btn-secondary" type="submit">Valider</button>';
    echo '</form>';
    }
}
//================= formeTableComp
function formTableComp($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Compétence(s)</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Delete</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){
        echo '<tr>';
        echo '<td class="border-bottom bg-white">'.$line['competence'].'</td>';
        echo '<td class="border-bottom text-success bg-white"><a class="btn btn-success" href="?table=competence&action=update&id='.$line['id'].'">Update</a></td>';
        echo '<td class="border-bottom text-danger bg-white"><a class="btn btn-danger" href="?table=competence&action=delete&id='.$line['id'].'">Delete</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//---------------- FormTableComp2 AFFICHAGE UPDATE
function formTableComp2($db){
    $id = $_GET['id'];
    $request="SELECT * FROM `competence` WHERE `id` = $id";
    $reponse=crudDb($db,$request);
    $lines = $reponse->fetchAll();

    foreach ($lines as $line){
        echo '<form method="post" action="">';
        echo '<label for="competence">Compétence à update:</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['competence'].'" name="competence" >';
        echo '<button class="btn btn-secondary" type="submit">Valider</button>';
        echo '</form>';
    }
}
//================= formTableContact
function formTableContact($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Nom</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Email</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Message</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Delete</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){
        echo '<tr>';
        echo '<td class="border-bottom bg-white">'.$line['nom'].'</td>';
        echo '<td class="border-bottom bg-white">'.$line['email'].'</td>';
        echo '<td class="border-bottom bg-white">'.$line['message'].'</td>';
        echo '<td class="border-bottom bg-white"><a class="btn btn-danger" href="?table=contact&action=delete&id='.$line['id'].'">Delete</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//============== formTableImage
function formTableImage($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white">Gestion des images logo page Compétences (services)</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Delete</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){
        echo '<tr>';
        echo '<td class="bg-white"><img class="border" style="width:5%;height:5%;" alt="#" src="https://regaia.bes-webdeveloper-seraing.be/cms3/'.$line['nom_dossier'].'/'.$line['nom_fichier'].'.'.$line['extension'].'"</img></td>';
        echo '<td class="bg-white"><a class="btn btn-success" href="?table=image&action=update&id='.$line['id'].'">Update</a></td>';
        echo '<td class="bg-white"><a class="btn btn-danger" href="?table=image&action=delete&id='.$line['id'].'">Delete</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//---------------- FormTableImage2 AFFICHAGE UPDATE
function formTableImages2($db){
    $id = $_GET['id'];
    $request="SELECT * FROM `image` WHERE `id` = $id";
    $reponse=crudDb($db,$request);
    $lines = $reponse->fetchAll();

    foreach ($lines as $line){
        echo '<form method="post" action="" enctype="multipart/form-data">';
        echo '<label for="nom_dossier">Nom dossier :</label>';
        echo '<input  style="width:100%" type="text" value="'.$line['nom_dossier'].'" name="nom_dossier">';
        echo '<br>';
        echo '<label for="nom_fichier">Nom fichier :</label>';
        echo '<input style="width:100%" type="text" value="'.$line['nom_fichier'].'" name="nom_fichier">';
        echo '<br>';
        echo '<label for="extension">Extension :</label>';
        echo '<input style="width:100%" type="text" value="'.$line['extension'].'" name="extension">';
        echo '<br>';
        echo '<label for="position">Quelle page? :</label>';
        echo '<input style="width:100%" type="text" value="'.$line['position'].'" name="position">';
        echo '<br>';
        echo '<br>';

        echo '<button class="btn btn-secondary" type="submit">Valider</button>';
        echo '</form>';
}

}
//============== formTableImagePresentation
function formTableImagePresentation($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white">Gestion des images sur la page Présentation (presentation)</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Delete</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){
        echo '<tr>';
        echo '<td class="bg-white"><img class="border" style="width:5%;height:5%;" alt="#" src="https://regaia.bes-webdeveloper-seraing.be/cms3/'.$line['nom_dossier'].'/'.$line['nom_fichier'].'.'.$line['extension'].'"</img></td>';
        echo '<td class="bg-white"><a class="btn btn-success" href="?table=image&action=update&id='.$line['id'].'">Update</a></td>';
        echo '<td class="bg-white"><a class="btn btn-danger" href="?table=image&action=delete&id='.$line['id'].'">Delete</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//============== formTableImagePortfolio
function formTablePortfolio($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white">Gestion des images de la page Portfolio (portfolio)</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Delete</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){
        echo '<tr>';
        echo '<td class="bg-white"><img class="border" style="width:5%;height:5%;" alt="#" src="https://regaia.bes-webdeveloper-seraing.be/cms3/'.$line['nom_dossier'].'/'.$line['nom_fichier'].'.'.$line['extension'].'"</img></td>';
        echo '<td class="bg-white"><a class="btn btn-success" href="?table=image&action=update&id='.$line['id'].'">Update</a></td>';
        echo '<td class="bg-white"><a class="btn btn-danger" href="?table=image&action=delete&id='.$line['id'].'">Delete</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//============== formTableImageHome
function formTableHomeImage($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white">Gestion de l\'image de la page Home (home)</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Delete</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){
        echo '<tr>';
        echo '<td class="bg-white"><img class="border" style="width:5%;height:5%;" alt="#" src="https://regaia.bes-webdeveloper-seraing.be/cms3/'.$line['nom_dossier'].'/'.$line['nom_fichier'].'.'.$line['extension'].'"</img></td>';
        echo '<td class="bg-white"><a class="btn btn-success" href="?table=image&action=update&id='.$line['id'].'">Update</a></td>';
        echo '<td class="bg-white"><a class="btn btn-danger" href="?table=image&action=delete&id='.$line['id'].'">Delete</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//================= formeTableFooter
function formTableFooter($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Email</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Linkedin</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Facebook</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td class="border-bottom bg-white">'.$line['email'].'</td>';
        echo '<td class="border-bottom bg-white">'.$line['linkedin'].'</td>';
        echo '<td class="border-bottom bg-white">'.$line['facebook'].'</td>';
        echo '<td class="border-bottom text-success bg-white"><a class="btn btn-success" href="?table=footer&action=update&id='.$line['id'].'">Update</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//---------------- FormTableFooter2 AFFICHAGE UPDATE
function formTableFooter2($lines){

    foreach ($lines as $line){
        echo '<form method="post" action="">';
        echo '<label for="email">Email :</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['email'].'" name="email" >';
        echo '<br>';
        echo '<label for="linkedin">Linkedin :</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['linkedin'].'" name="linkedin" >';
        echo '<br>';
        echo '<label for="facebook">Facebook :</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['facebook'].'" name="facebook" >';
        echo '<button class="btn btn-secondary" type="submit">Valider</button>';
        echo '</form>';
    }
}
//================= formeTableFooter
function formTablePresentation($lines){
    echo '<table class="table">';
    echo '<thead class="thead-dark">';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Age</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Commune</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Présentation</td>';
    echo '<td class="p-3 mb-2 bg-light bg-dark text-white" scope="col">Update</td>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($lines as $line){

        echo '<tr>';
        echo '<td class="border-bottom bg-white">'.$line['age'].'</td>';
        echo '<td class="border-bottom bg-white">'.$line['commune'].'</td>';
        echo '<td class="border-bottom bg-white">'.$line['presentation'].'</td>';
        echo '<td class="border-bottom text-success bg-white"><a class="btn btn-success" href="?table=presentation&action=update&id='.$line['id'].'">Update</a></td>';
        echo '</tr>';
    }
    echo '<tbody>';
    echo '</table>';
}
//---------------- FormTableFooter2 AFFICHAGE UPDATE
function formTablePresentation2($lines){

    foreach ($lines as $line){
        echo '<form method="post" action="">';
        echo '<label for="age">Age :</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['age'].'" name="age" >';
        echo '<br>';
        echo '<label for="commune">Commune :</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['commune'].'" name="commune" >';
        echo '<br>';
        echo '<label for="presentation">Présentation :</label>';
        echo '<input style="width:100%;" type="text" value="'.$line['presentation'].'" name="presentation" >';
        echo '<button class="btn btn-secondary" type="submit">Valider</button>';
        echo '</form>';
    }
}