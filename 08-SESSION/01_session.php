<?php 

    //Création ou ouverture d'une session
    echo "<h1>Cours PHP 7 - SESSION</h1>";

    echo '<p>Les donnée du fichier de session sont accessibles et manipulables à partir de la superglobale $_SESSION.</p>';

    //Cette fonction si on besoin des information de session devra être placée au début de chaque page
    session_start();//Permet de crée un fichier de session avec son identifiant OU de l'ouvrir si il existe déjà et que l'on a reçu un cookie avec l'id dedans

    // Principe des sessions : un fichier temporaire appelé "session" est crée sur le serveur, avec un identifiant unique. Cette session est lié à un internaute, dans le même temps un cookie est déposé sur le poste de l'internaute avec l'identifiant (au nom de PHPSESSID). Ce cookie se détruit quand on quitte le navigateur.
    // Le fichier de session peut contenir des informations sensibles !!! Il n'est pas accessible par l'internaute

    $_SESSION['speudo'] = 'Tintin';
    $_SESSION['mdp'] = 'salut';
    $_SESSION['email'] = 'tintin@moulinsart.com';

    echo '<p>La session est remplie.</p>';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    // Il est possible de vider une partie de la session avec unset()
    unset($_SESSION['mdp']);

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    // Supprimer entièrement une session

    // session_destroy(); // SUppression totale de la session et du fichier de session

    // echo '<p>La session est détruite.</p>'; 
    // Nous avons effectué un session_destroy() mais il n'est exécuté qu'a la fin de notre script. Nous voyons encore ici le contenu de la session, mais le fichier temporaire dans le dossier temp à bien été supprimé

    //Ce fichier contient les informations de session et elles sont accessibles grâce à session_start()

    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
?> 