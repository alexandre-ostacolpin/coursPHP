<?php require_once'../inc/functions.php'; 
// Vérification de ce que je récupère en $_GET
// jevardump($_GET);
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Exo PHP 7 - PDO</title>
  </head>
  <body>
  <?php require '../inc/nav.inc.php'; ?>
    <div class="jumbotron container">
        <h1 class="display-4">EXO PHP 7 - $_GET</h1>
        <p class="lead">Votre compte - mise à jour ou suppression</p>
        <hr class="my-4">
    </div>

        <!--     MINI exo -->
        <!--     1/ affichez dans cette page un titre "Mon compte : un nom et un prénom"-->
        <!--     2/ vous y ajouter un lien "modifier mon compte" : Ce lien renvoie dans l'url à la même page, donc à cette page, l'action demandé est "modification", quand on clique sur le lien -->
        <!--     3/ Si vous avez reçu cette action "modification" par l'url, alors vous affichez "Vous avez demandé la modification de votre compte" -->

    <main class="container bg-white">
        <div class="row p-4">
            <div class="col-md-6">
                <h2>Mon compte : Marcus Jackson</h2>
                

            </div><!-- Fin de col -->

            <div class="col-md-7">
                <a href="05_exo_get.php?action=modification">Modifier mon compte</a>
                
                <?php 
                if(isset($_GET['action']) && $_GET['action'] == 'modification') {
                    echo "<p>Vous avez demandé la modification de votre compte</p>";
                }
                ?>
            </div><!-- Fin de col -->

            <div class="col-md-6">
            
                <a href="05_exo_get.php?action=supression">Supprimer mon compte</a> 
                <?php 
                if(isset($_GET['action']) && $_GET['action'] == 'supression') {
                    echo "<p>Vous avez demandé de supprimé votre compte</p>";
                }
                ?>
            </div><!-- Fin de col -->

            <div class="col-sm-12">
                
            </div><!-- Fin de col -->
            <div class="col-sm-12">
                
            </div>
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