<?php

include_once 'connectDb.php';

function formPortfolio($db){

    //email-linkedin-facebook footer
    $requestFooter = 'SELECT email,linkedin,facebook from `footer`';
    $reponseFooter = crudDb($db, $requestFooter);
    $lineFooter=$reponseFooter->fetch();

    //image
    $request='SELECT nom_dossier,nom_fichier,extension FROM `image` where position ="portfolio" ';
    $reponse=crudDb($db,$request);
    $lines=$reponse->fetchAll();

    $j=0;
    // concaténation du content
    $content = '';

    for($i=0;$i<count($lines);$i++){
        $content .='<div class="col col-1-3">';
        $content .='<img class="img-project" src="';
        $content .= $lines[$i]['nom_dossier'].'/'.$lines[$i]['nom_fichier'].'.'.$lines[$i]['extension'];
        $content .= '" alt="#" width="350" height="350"> ';
        $content .='</div>';
        $j++;
        if ($j%2==0 ){
            $content .='<div class="clear"></div>';

        }
    }

echo'
    <section>
        <div class="container">
            <div class="col col-1-3">
                <p>Liste complète de mes travaux actuels</p>
            </div>
            <div class="clear"></div>
                '.$content.' 
         </div>
    </section> 

    <footer id="contact">   
        <div class="container">       
            <a class="alink" href="mailto:'.$lineFooter['email'].'"><i class="fas fa-envelope"></i>&nbsp;REGAIA Anthony</a><br>
            <a target=”_blank” class="alink" href="'.$lineFooter['linkedin'].'"><i class="fab fa-linkedin"></i>&nbsp;LinkedIn</a><br>
            <a target=”_blank” class="alink" href="'.$lineFooter['facebook'].'"><i class="fab fa-facebook-square"></i>&nbsp;Facebook</a>
        </div> 
    </footer>
</html>';
}
        
        
      





