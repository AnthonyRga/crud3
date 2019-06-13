<?php
session_start();
try{
    // se connecter en local ->
    // $db = new PDO('mysql:host=localhost;dbname=regaia', 'root', 'root');

    $db = new PDO('mysql:host=localhost;dbname=regaia;', 'regaia', '4qyk0I4p');
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){

}

include_once 'form/adminform.php';
include_once 'form/formtable.php';
include_once 'loginverif.php';


// Contenu afficher si l'utilisateur est connecté
function displayProtectedContent($db){

    // echo coreUI script bootstrap - Menu navigation
    echo'
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Template Coreui & icons Font Awesome -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
        <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- Header -->
        </head>
        <div class="text-white bg-dark">
            <p class="d-inline h2">CMS</p><br>
        </div>
        <div class="text-white" style="background-color:#cb132c;">
            <a target="_blank" class="d-inline text-white" style="text-decoration:none;margin-left:20px;" href="https://regaia.bes-webdeveloper-seraing.be/cms3/"><i class="fas fa-sign-out-alt"></i>&nbsp;Voir site</a>
            <a class="d-inline text-white" style="text-decoration:none;margin-left:20px;" href="?logout=1"><i class="fas fa-times"></i>&nbsp;Déconnexion</a>
        </div>
    </head>';

    // Menu navigation
    echo' <div class="row">
    
    <!-- Admnistration du footer -->
    <div class="card" style="width: 18rem;margin-left:30px;margin-top:15px;">
        <div class="col">
            <ul class="nav flex-column">
                <p class="text-center">Administration du Footer</p>
                <li class="nav-item">
                    <a class="nav-link bg-info border border-white" href="?table=footer">Liens sociaux Footer</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Administration Home -->
    <div class="card" style="width: 18rem;margin-left:10px;margin-top:15px;">
        <div class="col">
            <ul class="nav flex-column">
                <p class="text-center">Administration de la page Home</p>
                    <li class="nav-item">
                        <a class="nav-link active bg-info border border-white" href="?table=home">Modifier titre et texte</a>
                    </li>
        </div>
    </div>

    <!-- Administration Qui suis-je-->
    <div class="card" style="width: 18rem;margin-left:10px;margin-top:15px;">
        <div class="col">
            <ul class="nav flex-column">
                <p class="text-center">Administration de la page Qui suis-je</p>
                    <li class="nav-item">
                        <a class="nav-link bg-info border border-white" href="?table=presentation">Présentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-info border border-white" href="?table=hobbys">Gestion des hobbys</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Administration Compétences -->
    <div class="card" style="width: 18rem;margin-left:10px;margin-top:15px;">
        <div class="col">
            <ul class="nav flex-column">
                <p class="text-center">Administration de la page Compétences</p>
                    <li class="nav-item">
                        <a class="nav-link active bg-info border border-white" href="?table=competence">Gestion des compétences</a>
                    </li>
            </ul>        
        </div>
    </div>

    <!-- Administration Images -->
    <div class="card" style="width: 18rem;margin-left:10px;margin-top:15px;">
        <div class="col">
            <ul class="nav flex-column">
                <p class="text-center">Administration des Images</p>
                <li class="nav-item">
                    <a class="nav-link active bg-info border border-white" href="?table=image">Gestion des Images</a>
                </li>
            </ul>     
        </div>
    </div>

    <!-- Administration Contact -->
    <div class="card" style="width: 18rem;margin-left:10px;margin-top:15px;">
        <div class="col">
            <ul class="nav flex-column">
                <p class="text-center">Administration de la page Contact</p>
                <li class="nav-item">
                    <a class="nav-link active bg-info border border-white" href="?table=contact">Administration des messages</a>
                </li>
            </ul>    
        </div>
    </div>

    </div>';


    $table = filter_input(INPUT_GET, "table", FILTER_SANITIZE_STRING);


        //====================== Si on clique sur Home ====================//
        if ($table == 'home') {

            // Affichage de la table
            $requestSelect = 'SELECT * FROM `home`';
            $reponse = crudDb($db, $requestSelect);
            $lines = $reponse->fetchAll();
            formTableHome($lines);

    // Insérer titre texte - Home
            $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
            if ($action == "insert") {
                formHome();
                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
                $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);
                if (!empty($titre && $texte)) {
                    $request = "INSERT INTO `home`(`titre`,`texte`) VALUES (:titre,:texte)";
                    crudDb($db, $request, ['titre' => $_POST['titre'], 'texte' => $_POST['texte']]);
                    header('Location: login.php?table=home');
                }

            }
    // Update titre texte - Home
            if ($action == "update") {
                formTableHome2($lines);
                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_STRING);
                $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_STRING);
                if (!empty($titre && $texte)) {
                    $request = 'UPDATE `home` SET `titre` = :titre,`texte` = :texte WHERE `id` = :id';
                    crudDb($db, $request, ['titre' => $_POST['titre'], 'texte' => $_POST['texte'], 'id' => $_GET['id']]);
                    header('Location: login.php?table=home');

                }

            }


        }
        //------------------------------------------------------------------------
    //====================== Si on clique sur Présentation ====================//
    if ($table == 'presentation') {

        // Affichage de la table
        $requestSelect = 'SELECT * FROM `presentation`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();
        formTablePresentation($lines);

        // Insérer age commune présentation - Qui suis je
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
        if ($action == "insert") {
            formPresentation();
            $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_STRING);
            $commune = filter_input(INPUT_POST, "commune", FILTER_SANITIZE_STRING);
            $presentation = filter_input(INPUT_POST, "presentation", FILTER_SANITIZE_STRING);
            if (!empty($age && $commune && $presentation)) {
                $request = "INSERT INTO `presentation`(`age`,`commune`,`presentation`) VALUES (:age,:commune,:presentation)";
                crudDb($db, $request, ['age' => $_POST['age'], 'commune' => $_POST['commune'], 'presentation' => $_POST['presentation']]);
                header('Location: login.php?table=presentation');
            }

        }
        // Update age commune présentation - Qui suis je
        if ($action == "update") {
            formTablePresentation2($lines);
            $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_STRING);
            $commune = filter_input(INPUT_POST, "commune", FILTER_SANITIZE_STRING);
            $presentation = filter_input(INPUT_POST, "presentation", FILTER_SANITIZE_STRING);
            if (!empty($age && $commune && $presentation)) {
                $request = 'UPDATE `presentation` SET `age` = :age,`commune` = :commune,`presentation` = :presentation WHERE `id` = :id';
                crudDb($db, $request, ['age' => $_POST['age'], 'commune' => $_POST['commune'], 'presentation' => $_POST['presentation'], 'id' => $_GET['id']]);
                header('Location: login.php?table=presentation');

            }
        }
    }
    //====================== Si on clique sur Hobbys  ====================//
    if ($table == 'hobbys') {
        // Message insérer hobby
        echo '<a class="h3 bg-info border" style="text-decoration:none;margin-bottom:10px;" href="?table=hobbys&action=insert"> Voulez-vous ajouter un hobby?</a> <br>';

        // Affichage de la table
        $requestSelect = 'SELECT * FROM `hobbys`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();
        formTableHobbys($lines);

        // Insérer des hobbys - Qui suis-je
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
        if ($action == "insert") {
            formHobbys();
            $hobbys = filter_input(INPUT_POST, "hobbys", FILTER_SANITIZE_STRING);
            if (!empty($hobbys)){
                $request = "INSERT INTO `hobbys`(`hobbys`) VALUES (:hobbys)";

                crudDb($db, $request,['hobbys'=>$_POST['hobbys']]);
                header('Location: login.php?table=hobbys');
            }

        }

        // Update hobbys - Qui suis-je
        if ($action == "update") {
            formTableHobbys2($db);
            $hobbys= filter_input(INPUT_POST, "hobbys", FILTER_SANITIZE_STRING);
            if (!empty($hobbys)) {
                $request = 'UPDATE `hobbys` SET `hobbys` = :hobbys WHERE `id` = :id';
                crudDb($db, $request, ['hobbys' => $_POST['hobbys'], 'id' => $_GET['id']]);
                header('Location: login.php?table=hobbys');
            }
        }

        // Delete un hobby
        if ($action == "delete") {
            $request = 'DELETE FROM `hobbys` WHERE `id` = :id';
            crudDb($db, $request, ['id' => $_GET['id']]);
            header('Location: login.php?table=hobbys');
        }
    }

    //====================== Si on clique sur Compétences  ====================//
    if ($table == 'competence') {

        // Demander insérer compétence
        echo '<a class="h3 bg-info border" style="text-decoration:none;margin-bottom:10px;" href="?table=competence&action=insert">Voulez-vous ajouter une compétence?</a> <br>';

        // Affichage de la table
        $requestSelect = 'SELECT * FROM `competence`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();
        formTableComp($lines);

        // Insérer une compétence - Services
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
        if ($action == "insert") {
            formComp();
            $competence = filter_input(INPUT_POST, "competence", FILTER_SANITIZE_STRING);
            if (!empty($competence)){
                $request = "INSERT INTO `competence`(`competence`) VALUES (:competence)";
                crudDb($db, $request,['competence'=>$_POST['competence']]);
                header('Location: login.php?table=competence');
            }

        }

        // Update compétence - Services
        if ($action == "update") {
            formTableComp2($db);
            $competence= filter_input(INPUT_POST, "competence", FILTER_SANITIZE_STRING);
            if (!empty($competence)) {
                $request = 'UPDATE `competence` SET `competence` = :competence WHERE `id` = :id';
                crudDb($db, $request, ['competence' => $_POST['competence'], 'id' => $_GET['id']]);
                header('Location: login.php?table=competence');
            }
        }

        // Delete une compétence
        if ($action == "delete") {
            $request = 'DELETE FROM `competence` WHERE `id` = :id';
            crudDb($db, $request, ['id' => $_GET['id']]);
            header('Location: login.php?table=competence');
        }
    }
    //====================== Si on clique sur Contact ====================//
     if ($table == 'contact') {
        $action = filter_input(INPUT_GET,"action",FILTER_SANITIZE_STRING);

        // Affichage de la table
        $requestSelect = 'SELECT * FROM `contact`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();
        formTableContact($lines);


        // Supprimer un message
        if ($action== "delete") {
            $request= 'DELETE FROM `contact` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: login.php?table=contact');
        }
    }

//--------------------------------------------------

// Si on clique sur les images
    if ($table == 'image') {

        echo '<a class="h3 bg-info border" style="text-decoration:none;margin-bottom:10px;" href="?table=image&action=insert">Ajouter une image</a> <br>';
        //Affichage de la table
        $requestSelect='SELECT * FROM `image` WHERE position = "presentation"';
        $reponse=crudDb($db,$requestSelect);
        $lines = $reponse->fetchAll();

        $requestSelect='SELECT * FROM `image` WHERE position = "services"';
        $reponse=crudDb($db,$requestSelect);
        $linesS = $reponse->fetchAll();

        $requestSelect='SELECT * FROM `image` WHERE position = "portfolio"';
        $reponse=crudDb($db,$requestSelect);
        $linesP = $reponse->fetchAll();

        $requestSelect='SELECT * FROM `image` WHERE position = "home"';
        $reponse=crudDb($db,$requestSelect);
        $linesH = $reponse->fetchAll();

        formTableHomeImage($linesH);
        formTableImagePresentation($lines);
        formTableImage($linesS);
        formTablePortfolio($linesP);

        $action = filter_input(INPUT_GET,"action",FILTER_SANITIZE_STRING);

// Insérer une image
        if ($action== "insert") {
            formImage();
            $nom_dossier = filter_input(INPUT_POST,"nom_dossier",FILTER_SANITIZE_STRING);
            $nom_fichier = filter_input(INPUT_POST,"nom_fichier",FILTER_SANITIZE_STRING);
            $extension = filter_input(INPUT_POST,"extension",FILTER_SANITIZE_STRING);
            $position = filter_input(INPUT_POST,"position",FILTER_SANITIZE_STRING);
            if (!empty($nom_dossier && $nom_fichier && $extension && $position )) {
                $fileSizeEnMega = 2;
                $maxFileSize = $fileSizeEnMega *1000000;
                $allowedExtensions = ['jpg'=>"image/jpeg",'jpeg'=>"image/jpeg",'png'=>"image/png",'gif'=>"image/gif"];
                if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
                    if ($_FILES['avatar']['size'] <= $maxFileSize){
                        $pathInfo = pathinfo($_FILES['avatar']['name']);
                        $extension2 = $pathInfo['extension'];
                        if (array_key_exists($extension2,$allowedExtensions) && mime_content_type($_FILES['avatar']['tmp_name']) == $allowedExtensions[$extension2] && $extension==$extension2){
                            $uploadedFilePath = './'.$nom_dossier.'/'.$nom_fichier.'.'.$extension2;
                            move_uploaded_file($_FILES['avatar']['tmp_name'],$uploadedFilePath);
                        }
                    }
                    else{
                        echo 'fichier trop gros';
                    }
                }
                if ($extension==$extension2) {
                    $request = "INSERT INTO `image`(`nom_dossier`,`nom_fichier`,`extension`,`position`) VALUES (:nom_dossier,:nom_fichier,:extension,:position)";
                    crudDb($db, $request, ['nom_dossier' => $_POST['nom_dossier'], 'nom_fichier' => $_POST['nom_fichier'], 'extension' => $_POST['extension'], 'position' => $_POST['position']]);
                    header('Location: login.php?table=image');
                }
                else{
                    echo 'Extension différente';
                }
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }
        }



// Update une image
        if ($action== "update" ){

            formTableImages2($db);
            $nom_dossier = filter_input(INPUT_POST,"nom_dossier",FILTER_SANITIZE_STRING);
            $nom_fichier = filter_input(INPUT_POST,"nom_fichier",FILTER_SANITIZE_STRING);
            $extension = filter_input(INPUT_POST,"extension",FILTER_SANITIZE_STRING);
            $position = filter_input(INPUT_POST,"position",FILTER_SANITIZE_STRING);
            if (!empty($nom_dossier && $nom_fichier && $extension && $position)) {
                $request="UPDATE `image` SET `nom_dossier` = :nom_dossier , `nom_fichier` =  :nom_fichier, `extension` = :extension, `position` = :position WHERE `id` = :id";
                crudDb($db,$request,['nom_dossier'=>$_POST['nom_dossier'],'nom_fichier'=>$_POST['nom_fichier'],'extension'=>$_POST['extension'],'position'=>$_POST['position'],'id'=>$_GET['id']]);
                header('Location: login.php?table=image');
            }
            else{
                echo"Insérer une valeur à chaque champ";
            }
        }
// Delete une image
        if ($action== "delete") {
            $request= 'DELETE FROM `image` WHERE `id` = :id';
            crudDb($db,$request,['id'=>$_GET['id']]);
            header('Location: login.php?table=image');
        }
    }
    //====================== Si on clique sur Footer ====================//
    if ($table == 'footer') {

        // Affichage de la table
        $requestSelect = 'SELECT * FROM `footer`';
        $reponse = crudDb($db, $requestSelect);
        $lines = $reponse->fetchAll();
        formTableFooter($lines); ////////////

        // Insérer email linkedin facebook - Footer
        $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
        if ($action == "insert") {
            formFooter(); /////////
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
            $linkedin = filter_input(INPUT_POST, "linkedin", FILTER_SANITIZE_STRING);
            $facebook = filter_input(INPUT_POST, "facebook", FILTER_SANITIZE_STRING);
            if (!empty($email && $linkedin && $facebook)) {
                $request = "INSERT INTO `footer`(`email`,`linkedin`,`facebook`) VALUES (:email,:linkedin,:facebook)";
                crudDb($db, $request, ['email' => $_POST['email'], 'linkedin' => $_POST['linkedin'], 'facebook' => $_POST['facebook']]);
                header('Location: login.php?table=footer');
            }

        }
        // Update email linkedin facebook - Footer
        if ($action == "update") {
            formTableFooter2($lines); ////////
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
            $linkedin = filter_input(INPUT_POST, "linkedin", FILTER_SANITIZE_STRING);
            $facebook = filter_input(INPUT_POST, "facebook", FILTER_SANITIZE_STRING);
            if (!empty($email && $linkedin && $facebook)) {
                $request = 'UPDATE `footer` SET `email` = :email,`linkedin` = :linkedin,`facebook` = :facebook WHERE `id` = :id';
                crudDb($db, $request, ['email' => $_POST['email'], 'linkedin' => $_POST['linkedin'], 'facebook' => $_POST['facebook'], 'id' => $_GET['id']]);
                header('Location: login.php?table=footer');

            }

        }


    }
}
//-----------------------------------------------------------
    function crudDb(PDO $db, $request, $params = [])
    {
        try {
            $reponse = $db->prepare($request);
            $reponse->execute($params);
        } catch (Exception $ex) {

        }
        return $reponse;
    }

