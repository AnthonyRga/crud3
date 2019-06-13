<?php

include_once 'connectDb.php';

function formPresentation($db){
    //image me.jpg
    $requestImage='SELECT nom_dossier,nom_fichier,extension FROM `image` where position ="presentation" ';
    $reponseImage=crudDb($db,$requestImage);
    $lineImage=$reponseImage->fetchAll();

    $j=0;
    // concaténation du content
    $content2 = '';

    for($i=0;$i<count($lineImage);$i++){
        $content2 .='<div class="margin1">';
        $content2 .='<img class="border-radius" src="';
        $content2 .= $lineImage[$i]['nom_dossier'].'/'.$lineImage[$i]['nom_fichier'].'.'.$lineImage[$i]['extension'];
        $content2 .= '" alt="#" width="250" height="250"> ';
        $content2 .='</div>';
        $j++;
        
    }
    //age-commune-presentation
    $requestPresentation = 'SELECT age,commune,presentation from `presentation`';
    $reponsePresentation = crudDb($db, $requestPresentation);
    $linePresentation=$reponsePresentation->fetch();

    //email-linkedin-facebook footer
    $requestFooter = 'SELECT email,linkedin,facebook from `footer`';
    $reponseFooter = crudDb($db, $requestFooter);
    $lineFooter=$reponseFooter->fetch();

    //les hobbys
    $requestSelect='SELECT hobbys FROM `hobbys`';
    $reponseSelect=crudDb($db,$requestSelect);
    $lines = $reponseSelect->fetchAll();
    $content = '';
    foreach($lines as $line){
        $content .=  '<p><i class="fas fa-circle"></i>'. $line['hobbys'].'</p>';

    }
    $content .=' 
    <div class="clear"></div>';


echo '

<section>
    <div class="container">
        <div class="col col-1-3">
            '.$content2.' 
        </div>
        <div class="col col-1-6 last">
            <p>Je m\'appelle Anthony Regaia, j\'ai '.$linePresentation['age'].' ans.</p>
            <p>J\'habite actuellement dans la commune de '.$linePresentation['commune'].'</p>
            <p>'.$linePresentation['presentation'].'</p>
        </div>
            <div class="col col-1-6bis last">
                <p>J\'ai quelques passions et hobbys :<br>
                <p> '.$content.' </p>
            </div>
            <div class="clear"></div>                           
    </div>
</section>

<footer id="presentation">   
    <div class="container">       
        <a class="alink" href="mailto:'.$lineFooter['email'].'"><i class="fas fa-envelope"></i>&nbsp;REGAIA Anthony</a><br>
        <a target=”_blank” class="alink" href="'.$lineFooter['linkedin'].'"><i class="fab fa-linkedin"></i>&nbsp;LinkedIn</a><br>
        <a target=”_blank” class="alink" href="'.$lineFooter['facebook'].'"><i class="fab fa-facebook-square"></i>&nbsp;Facebook</a>
    </div> 
</footer>
</html>';
}
