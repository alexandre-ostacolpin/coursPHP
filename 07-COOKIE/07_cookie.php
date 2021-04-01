<?php require_once'../inc/functions.php'; 

//2 vérification de l'url ou si l'internaute vient pour la 1ère ou si on à déjà une langue dans un cookie
if (isset($_GET['langue'])) { // Si une langue est passée dans l'url, l'internaute a cliqué sur un sdes liens, on enverra cette langue dans le cookie
  // jevardump($_GET['langue']);
  $langue = $_GET['langue'];
  jeprintr($langue);
  }elseif (isset($_COOKIE['langue'])){ //Sinon si on a reçu un cookie appelé "langue" alors la valeur du site sera la valeur du cookie
    $langue = $_COOKIE['langue'];
    jeprintr($langue);
  }else { //Sinon si l'internaute n'a pas choisi de langue , il arrive pour la 1ère fois on va lui mettre "fr" par defaut
    $langue = "fr";
    jeprintr($langue);
}

//3/ envoie du cookie avec l'information sur la langue
//jeprintr(time()); time() nous donne la date du jour depuis le début du UNIX date exprimée en secondes
$expiration = time() + 365*24*60*60;// je crée ici la date d'expiration de mon cokkie un an pus tard
// La date du jour de visite une année supplémentaire 
// jeprintr($expiration);
// jeprintr($expiration - time());
// jeprintr(time() - $expiration - $expiration);
//setcookie(); Fonction qui frabrique le cookie
setcookie('langue', $langue, $expiration); //La fonction  envoie un cookie appelé "langue" avec la valeur de $langue et pour date d'expiration la valeur de $expiration

//Il n'existe pas de fonction prédéfinie qui permette de supprimer un cookie, pour rendre un cookie invalide on utilise setcookie() avec le nom concerné et en mettant une date d'expiration à 0 ou antérieure à aujourd'hui... 
// Firefox > Inspecter > Stockage
// Chrome > Inspecter > Aplication > Stockage
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - COOKIE</title>
  </head>
  <body>
  <?php require '../inc/nav.inc.php'; ?>
    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - COOKIE</h1>
        <p class="lead">La super globale $_COOKIE : un cookie est un petit fichier de 4ko maxi déposé par le serveur web sur le poste de l'internaute et qui contient des informations.</p>
        <hr class="my-4">
    </div>

    <main class="container bg-white">
        <div class="row">
            <div class="col-sm-12 p-4">
                <p>Les cookies sont automatiquement renvoyés au serveur web par le navigateur. Lorsque l'internaute navigue dans les pages concernées par le ou les cookies PHP permet de récupérer très facilement les données contenues dans un cookie; car les information sont stockées dans une supertglobale $_COOKIE.</p>
                <p class="alert alert-danger">Un cookie étant sauvgardé sur le poste de l'internaute , il peut être modifié détourné ou volé !!!! On n'y met donc aucune information sensible : ref. bancaire, numéro de sécu, mdp ni même le contenue d'un panier d'achat</p>
                <!-- 1/ On envoie la langue choisie par l'url ; la valeur "fr", par ex. est récupérée dans la superglobale $_GET -->
                
                <a href="?langue=fr" class="btn btn-primary">Français</a>
                <a href="?langue=es" class="btn btn-danger">Espagnol</a>
                <a href="?langue=it" class="btn btn-warning">Italien</a>
                <a href="?langue=ru" class="btn btn-secondary">Russe</a>
                <?php 
                  echo "<h3>Langue du site  le site est en $langue</h3>";
                  echo time(). "la date du jour, ou le timestamp, exprimée en secondes depuis le 1er janvier 1970.";
                ?> 
            </div><!-- Fin de col -->

            <div class="col-sm-12">
                
                
            </div><!-- Fin de col -->

            <div class="col-sm-12">
                
            </div><!-- Fin de col -->
        </div><!-- Fin de row -->

    </main>
    <?php require '../inc/footer.inc.php';?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>