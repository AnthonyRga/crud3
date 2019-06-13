<?php
include_once 'connectDb.php';


function formServices($db){

    //image services
    $request='SELECT nom_dossier,nom_fichier,extension FROM `image` where position ="services" ';
    $reponse=crudDb($db,$request);
    $lines=$reponse->fetchAll();

    $j=0;
    // concaténation du content + boucle pour créer une div apres l'affichage de 3images
    $content2 = '';

    for($i=0;$i<count($lines);$i++){
        $content2 .='<div class="col col-1-3">';
        $content2 .='<img class="img-logo" src="';
        $content2 .= $lines[$i]['nom_dossier'].'/'.$lines[$i]['nom_fichier'].'.'.$lines[$i]['extension'];
        $content2 .= '" alt="logo langage" width="150" height="150"> ';
        $content2 .='</div>';
        $j++;
        if ($j%3==0 ){
            $content2 .='<div class="clear"></div>';

        }
    }

    //compétences
    $requestSelect='SELECT competence FROM `competence`';
    $reponse=crudDb($db,$requestSelect);

    $lines = $reponse->fetchAll();
    $content = '<ul>';
    foreach ($lines as $line){

        $content .=  '<p><i class="fas fa-circle"></i>'. $line['competence'].'</p>';

    }
    $content .= '</ul>';

    //email-linkedin-facebook footer
    $requestFooter = 'SELECT email,linkedin,facebook from `footer`';
    $reponseFooter = crudDb($db, $requestFooter);
    $lineFooter=$reponseFooter->fetch();

    echo' 
        <section>
            <div class="container">
                <div class="col col-1-3">
                    <p>Mes compétences : </p>
                    '.$content.' 
                </div>
            <div class="clear"></div>
                <div>
                '.$content2.'        
            </div>
                <div class="clear"></div>
            </div>
        </section>
        
        
<footer id="services">   
    <div class="container">       
        <a class="alink" href="mailto:'.$lineFooter['email'].'"><i class="fas fa-envelope"></i>&nbsp;REGAIA Anthony</a><br>
        <a target=”_blank” class="alink" href="'.$lineFooter['linkedin'].'"><i class="fab fa-linkedin"></i>&nbsp;LinkedIn</a><br> 
        <a target=”_blank” class="alink" href="'.$lineFooter['facebook'].'"><i class="fab fa-facebook-square"></i>&nbsp;Facebook</a>      
    </div> 
</footer>
</html>';
}
