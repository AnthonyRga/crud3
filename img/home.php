<?php

include_once 'connectDb.php';

function formHome($db){

    //email perso footer
    $requestMail= 'SELECT personnel from `personnel`';
    $reponseMail=  crudDb($db, $requestMail);
    $linemail=$reponseMail->fetch();
    $mail=$linemail['personnel'];

    //linkedin footer
    $requestMail= 'SELECT linkedin from `linkedin`';
    $reponseMail=  crudDb($db, $requestMail);
    $linemail=$reponseMail->fetch();
    $linkedin=$linemail['linkedin'];


    //facebook footer
    $requestMail= 'SELECT facebook from `facebook`';
    $reponseMail=  crudDb($db, $requestMail);
    $linemail=$reponseMail->fetch();
    $facebook=$linemail['facebook'];


    //titre et texte
    $requestAccueil = 'SELECT titre,texte from `home`';
    $reponseAccueil = crudDb($db, $requestAccueil);
    $lineAccueil=$reponseAccueil->fetch();

    //image
    $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `image` where position ="home" ';
    $reponseImage=crudDb($db,$requestImage);
    $lineImage=$reponseImage->fetch();
    $image = $lineImage['nom_dossier'].'/'.$lineImage['nom_fichier'].'.'.$lineImage['extension'];


    echo' 
    <section>
        <header>
            <h2>'.$lineAccueil['titre'].'</h2>
            <h3>'.$lineAccueil['texte'].'</h3>
            <img class="img-home" src="'.$image.'">
            <a href="?page=presentation">About me<i class="fas fa-angle-double-right"></i></a>
        </header>
    </section>
    
<footer id="home">   
    <div class="container">       
        <a class="alink" href="mailto:'.$mail.'"><i class="fas fa-envelope"></i>&nbsp;REGAIA Anthony</a><br>
        <a target=”_blank” class="alink" href="'.$linkedin.'"><i class="fab fa-linkedin"></i>&nbsp;LinkedIn</a><br>
        <a target=”_blank” class="alink" href="'.$facebook.'"><i class="fab fa-facebook-square"></i>&nbsp;Facebook</a>
    </div> 
</footer>
</html>';
}

