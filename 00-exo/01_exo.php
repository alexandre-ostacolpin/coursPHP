<?php
require_once'../inc/functions.php';
$chaine = "longtemps je me suis couché ... dans le temps";
$decimal = "18.74";
$entier = 500;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Cours php 7 - exos pratiques</title>
  </head>
  <body>
    <main class="container">
        <h1>Hello, world!</h1>
        <?php
        mnPap();
        quelJour();
        // cette fonction permet d'analyser dans le navigateur le contenu et le type d'une variable
        var_dump('$entier');
        echo "<hr>";
        print_r("<p>affiche du contenu avec la fonction print_r</p>");
        // gettype()
        echo gettype($chaine);
        // mini exo écrire la phrase suivante la devise de la république est liberté, égalité, fraternité (mettre les termes en variables)
        // echo "<p>La devise de la république est \"$lib, $egal, $frat\".</p>";



        // mini exo if else si le prix est supérieur à 100 euros la remise est de 10% sinon la remise est 5% et donnez le montant du prix net 
        // $prix = 55;
        // $discount1 = 0.05;
        // $discount2 = 0.1;
        // $_cinqpourcent = $prix * $discount1;
        // $_dixpourcent = $prix * $discount2;
        // echo "<p class=\"alert alert-success w-75 mx-auto text-center\">";
        //     if ($prix > 100) {
        //         echo "Vous aurez une remise de $_dixpourcent";
        //     } else {
        //         echo "Vous avez une remise de $_cinqpourcent";
        //     }
        // echo "</p>";

        $prix = 500;
        $remise10 = $prix * 0.9;
        $remise5 = $prix * 0.95;

        echo "<p class=\"alert alert-success w-75 mx-auto text-center\">";

        if ($prix > 100) {
            echo "Pour un achat de $prix € vous avez une remise de 10% : prix net = $remise10 €.";
        } else {
            echo "Pour un achat de $prix € vous avez une remise de 5% : Prix net = $remise5.";
        }

        echo "</p>";

        //exo 850 €
        //Si vous achetez un PC à plus de 1000 euros, la remise est de 15%
        // Pour un PC de 1000 euros et moins la remise est de 10%
        //Si c'est un livre la remise est de 5%
        //Pour tous les autres articles , la remise est de 2%
        //>Si c'est un PC SI le prix est sup ou égal à 1000, la remise est de 15%, SINON la remise est de 10% SINON SI c'est un livre la remise est de 5% SINON c'est autre chose (qu'un PC ou un livre) la remise est de 2%
        $cat = "cat";
        $prix = 900;
        $remise10 = $prix * 0.9;
        $remise5 = $prix * 0.95;
        $remise2 = $prix * 0.98;
        $remise15 = $prix * 0.85;

            if($cat == "pc"){
                if ($prix > 1000 ){
                    echo "La remise est de 15% vous allez donc payer $remise15";
                }else {
                    echo "La remise est de 10% vous allez donc payer $remise10";
                }
            }elseif ($cat == "livre") {
                echo "Livre remise 5% vous allez donc payer $remise5";
            } else {
                echo "remise 2% vous allez donc payer $remise2";
            }
        
        
        ?>
    </main>
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