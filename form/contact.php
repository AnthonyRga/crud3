<?php

include_once 'connectDb.php';


function formContact($db)
{
    // Insérer les données du formulaire dans la db
    $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
    if (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
        echo 'Insérer un email valide';
    }else {

        if (!empty($nom && $email && $message)) {
            $request = "INSERT INTO `contact`(`nom`,`email`,`message`) VALUES (:nom,:email,:message)";
            crudDb($db, $request, ['nom' => $_POST['nom'], 'email' => $_POST['email'], 'message' => $_POST['message']]);

        }else {
                echo "Insérer une valeur à chaque champ";
            }

    }
    //email-linkedin-facebook footer
    $requestFooter = 'SELECT email,linkedin,facebook from `footer`';
    $reponseFooter = crudDb($db, $requestFooter);
    $lineFooter=$reponseFooter->fetch();



echo '

<section>
    <div class="container"> 
        <form class="box" action="" method="post">
            <h1>Contactez-moi</h1>
                <input type="text" name="nom" id="nom" placeholder="Votre nom">
                <input type="text" name="email" id="email" placeholder="Votre email">
                <textarea type="text" name="message" id="message" placeholder="..."></textarea>
                <input type="submit" name="submitted" id="submitted" value="Envoyez">
        </form>
                 <div class="clear"></div>
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