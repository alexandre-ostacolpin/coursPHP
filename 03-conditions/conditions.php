<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="../style.css">

    <title></title>
  </head>
  <body>
    <?php 
        require '../inc/nav.inc.php';
    ?>

    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - Les intructions conditionelles ou les conditions</h1>
        <p class="lead">On retrouve dans PHP la plupart des instructions de contrôle des scripts. Indispensables à la gestion du déroulement d'un algorithme quelconque, ces instructions sont présentes dans tous les langages. PHP utilise une syntaxe très proche de celle du langage C. Ceux qui ont déjà pratiqué un langage tel que le C ou plus simplement JavaScript seront en pays de connaissance.</p>
        <hr class="my-4">
    </div>

    <main class="container bg-white">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <h1>if</h1>
                <p>L'instruction <code>if</code> est la plus simple et la plus utilisée des instructions conditionnelles. Présente dans tous les langages de programmation, elle est essentielle en ce qu'elle permet d'orienter l'éxécution du script en fonction de la valeur booléenne d'une expression.</p>
                <?php 
                    $a = 10;
                    $b = 55;
                    $c = 25;

                    if ( $a > $b && $b > $c ) {
                        echo "<p class=\"alert alert-success w-75 mx-auto text-center\">Les 2 conditions sont ok";
                    }
                ?> 
            </div><!-- Fin de Col -->

            <div class="col-sm-12 col-md-4">
                <h2>if ... else</h2>
                <p>L'instruction <code>if...else</code> permet de traiter le cas ou l'expression conditionelle est TRUE est en même temps d'écrire un traitement de rechange quand elle est évaluée à FALSE, ce que ne permet pas une instruction if seule. L'instruction ou le bloc qui suit <code>else</code> est alors le seul à être exécuter. L'exécution continue ensuite normalement après le bloc <code>else</code>.</p>
                <?php 
                    if ( $a > $b ) {
                        echo "$a est supérieur à $b";
                    } else {
                        echo "$b qui est supérieur à $a";
                    }
                ?>
                <p>Le bloc qui suit les instructions if ou else peut contenir toutes sortes sortes d'instructions, y compris d'autres instructions <code>if...else</code>. Nous obtenons dans ce cas une syntaxe plus complexe, de la forme : A suivre</p>
            </div><!-- Fin de Col -->

            <div class="col-sm-12 col-md-4">
                <h2>if...elseif...else</h2>
                <?php
                $d= 8;
                echo "<p class=\"alert alert-success w-75 mx-auto text-center\">";

                    if ( $d == 8 ) {
                        echo "réponse 1 : \$d est égal à 8";
                    }elseif ( $d != 10 ) {
                        echo "Réponse 2 : \$a est différent de 10";
                    }else {
                        echo "Réponse 3 : les deux conditions sont fausses";
                    }

                echo "</p>";    
                ?> 
            </div><!-- Fin de Col -->
        </div><!-- Fin de row -->

       
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