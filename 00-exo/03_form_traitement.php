<?php 

require_once'../inc/functions.php'; 

    // jevardump($_POST);

    if (!empty($_POST)) {

        echo "<p>prenom : " .$_POST['prenom']. "</p><br>";
        echo "<p>nom : " .$_POST['nom']. "</p><br>";
        echo "<p>email : " .$_POST['email']. "</p><br>";
        echo "<p>adresse : " .$_POST['adresse']. "</p><br>";
        echo "<p>code postal : " .$_POST['code_postal']. "</p><br>";
        echo "<p>ville : " .$_POST['ville']. "</p><br>";
    


    //On va écrire le contenu de la super globale dans un fichier texte en l'absence de BDD

    $fichier = fopen('formulaire.txt', 'a'); //fopen() en mode "a" permet de crée un fichier s'il n'existe pas encore, sinon cela permet de l'ouvrir

    $donneeformulaire = $_POST['prenom']. ' ' .$_POST['nom']. ' ' .$_POST['email']. ' ' .$_POST['adresse']. ' ' .$_POST['code_postal']. ' ' .$_POST['ville']. "\n";// \n pour faire des sauts de ligne dans le .txt

    fwrite ($fichier, $donneeformulaire);

   } //Fin de if !empty
?> 