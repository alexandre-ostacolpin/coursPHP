<?php require_once'../inc/functions.php'; ?>
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
        <div class="row">
            <div class="col-sm-12">
                <h1>Salut ! Hello ! </h1>
                <?php 
                //Déclarer un tableau, les valeurs du tableau sont indiqués dans les ().
                    $tableau1 = array( 'Dalio', 'Gabin', 'Arletty', 'Fernandel', 'Pauline carton' );
                    // echo $tableau1; erreur de type "array to string conversion" on ne peut afficher directement un tableau .

                    echo "<pre>";//Pour mieux afficher et mieux lire
                        var_dump ( $tableau1); // var_dump affiche le contenu du tableau et les types de données et les valeurs .
                    echo "</pre>";

                    echo "<pre>";
                    print_r ( $tableau1 );// print_r affiche sans les types
                    echo "</pre>";

                    // Autre façon de déclarer un array

                    $tableau2 = [ 'France', 'Espagne', 'Italie', 'Portugal' ];

                    $tableau2[] = 'Roumanie';// Rajouter un élément dans notre tableau avec des crochets
                    print_r ( $tableau2 );

                    // dateJour();
                    jevardump($tableau1);
                    jeprintr($tableau1);

                    //min exo avec une boucle foreach parcourrez les deux tableaux de cette page et affichez-les dans deux ul 
                    echo "<ul class=\"w-50 bg-warning\">";
                    //On parcourt le tableau $tableau1 par ses valeurs la variable $acteur prend les valeurs du tableau successivement à chaque tour de boucle, le mot clef "as" est obligatoire
                    foreach ( $tableau1 as $acteur ){
                        // echo "<li>";
                        // echo $acteurs;
                        // echo "</li>";
                        echo "<li> $acteur </li>";
                    }
                    echo "</ul>";

                    echo "<hr>";

                    echo "<ul class=\"w-50 bg-danger\">";
                    foreach ( $tableau2 as $pays ){
                        // echo "<li>";
                        // echo $pays;
                        // echo "</li>";
                        echo "<li> $pays </li>";
                    }
                    echo "</ul>";

                    //La boucle foreach pour parcourir les indices et les valeurs ans une ul

                    echo "<hr>";

                    echo "<ul>";
                        foreach ( $tableau1 as $indice => $acteur ){
                            echo "<li> Pour $indice, la valeur est $acteur</li>";
                        }

                    echo "</ul>";

                    //mini exo
                    // 1- Déclarer un tableau associatif $contacts avec les indices suivants : prenom, nom, email et téléphone et vous y mettez les valeurs correspondant à un seul contact.
                    // 2- Puis avec une boucle foreach vous affichez les valeurs
                    //3- Faites une boucle qui récupère les indices
                    // 3- Puis dans une autre boucle vous affichez les valeurs dans des p sauf le prénom qui doit être dans un h3

                    $contacts = array (
                        'prenom' => 'Alexandre',
                        'nom' => 'Osta-Col-Pin',
                        'email' => 'alexandre.ostacolpin@colombbus.org',
                        'telephone' => '0655457869',
                    );
                    jevardump($contacts);

                    // $contacts2 = [
                    //     'prenom' => 'Alexandre',
                    //     'nom' => 'Osta-Col-Pin',
                    //     'email' => 'alexandre.ostacolpin@colombbus.org',
                    //     'telephone' => '0655457869',
                    // ];
                    // jevardump($contacts2);

                    echo "<ul class=\"w-50 bg-warning\">";
                    foreach ( $contacts as $infoscontacts ){
                        echo "<li> $infoscontacts </li>";
                    }
                    echo "</ul>";

                    echo "<ul class=\"w-50 bg-warning\">";
                    foreach ( $contacts as $indice => $infoscontacts ){//La boucle parcourt cette fois-ci les indices et les valeurs d'abord les indices dans une varaible $indice => puis les valeurs correspondant à chaque indice dans une variable $infoscontacts.
                        echo "<li>Pour " .$indice. " la valeur est : " .$infoscontacts. "</li>";
                    }
                    echo "</ul>";


                    foreach ( $contacts as $indice => $infoscontacts ){ //acolade
                        if ( $indice == 'prenom' || $indice == 'nom' ){
                            echo "<h3> $infoscontacts </h3>";
                        }else {
                            echo "<p> $infoscontacts </p>";
                        }
                    }

                    //1- EXO faire un tableau $tailles avec des tailles de vêtements du small au xl et les afficher avec une boucle foreach dans un ul
                    //2- puis les afficher dans un select avec une boucle foreach 

                    $tailles = [ 'small', 'meduim', 'xl', 'xll', 'xlll' ];

                    echo "<ul class=\"w-50 bg-warning\">";
                    foreach ( $tailles as $indice => $size ){
                        echo "<li>" .$indice. " pour " .$size. "</li>";
                    }
                    echo "</ul>";

                    // $tailles2 = [
                    //     "s" => "small",
                    //     "m" => "meduim",
                    //     "l" => "large",
                    //     "xl" => "extra-large",
                    // ];

                    // echo "<ul class=\"w-50 bg-warning\">";
                    // foreach ( $tailles2 as $indice => $size ){
                    //     echo "<li>" .$indice. " pour " .$size. "</li>";
                    // }
                    // echo "</ul>";

                    echo "<select class=\"w-25 form-control\">";
                    foreach ( $tailles as $indice => $size ){
                        echo "<option>" .$indice. " pour " .$size. "</option>";
                    }
                    echo "</select>";

                ?> 
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