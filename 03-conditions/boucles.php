<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="intro.css">

    <title></title>
  </head>
  <body>
    <?php 
        require '../inc/nav.inc.php';
    ?>

    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - Les boucles</h1>
        <p class="lead">Les boucles permettent de répéter des opérations élémentaires un grand nombre de fois sans avoir à réécrire le même code.</p>
        <hr class="my-4">
    </div>

    <main class="container bg-white">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h2>La boucle while</h2>
                <p>La boucle while (tant que) permet d'affiner le comportement d'une boucle en réalisant une action de manière répétitive tant qu'une condition est vérifiée ou qu'une expression quelconque est évaluée à TRUE et donc de l'arrêter quand elle n'est plus vérifiée, évaluée à FALSE.</p>
                <?php 
                $n = 1 ;
                var_dump($n);
                while ($n%7 !=0) { // le script s'arrête quand il trouve un multiple de 7
                    $n = rand(1,100);// rand() fait un tirage de nombres aléatoires compris entre 1 et 100 rand() pour random
                    echo $n. "&nbsp; -";// non breaking space espace insécable
                }
                ?> 
            </div><!-- Fin de Col -->

            <div class="col-sm-12 col-md-6">
                <h2>La boucle do...while</h2>
                <p>Avec l'instruction do...while, la condition n'est évaluée qu'après une première exécution des instruction du bloc compris entre do et while</p>
                <?php 
                $n2 = 1;// Initialisation de la variable à 1
                var_dump($n2);
                    do 
                    { $n2 = rand(1,100); // gardons $n = à 1
                        // var_dump($n2);
                        echo $n2. "&nbsp; *";
                    }
                    while ($n2%7 !=0);// La condition, trouver multiple de 7,  n'est testée qu'après le premier tirage
                ?> 
            </div><!-- Fin de Col -->
        </div><!-- Fin de row -->

        <div class="row mt-4 border border-primary">
            <div class="col-sm-12 col-md-6">
                <h2>La boucle for</h2>
                <p>La boucle for est plus concise, plus ramassée que la boucle while</p>

                <?php 
                // On va afficher les puissance de 2 jusqu'à 8;

                for ($i = 0; $i <=8; $i++){ // Création d'un tableau avec 9 élements
                    $tab[$i] = pow(2,$i); // A l'aide d'une boucle for (on utilise la fonction pow()) 
                    // $tab[$i] = $i;// Création d'un tableau avec la valeur de i incrémenté
                }

                var_dump($tab);
                
                ?> 
            </div><!-- Fin de Col -->

            <div class="col-sm-12 col-md-6">
                <h2>La boucle for each</h2>
                <p>La boucle foreach (pour chaque) est efficace pour lister les élements d'un tableau.</p>
                <?php 
                // echo $tab[2];
                // var_dump($tab);
                $val = "Une valeur de notre tableau";
                echo $val . "<br>";

                echo "Les puissances de 2 sont : ";

                foreach ($tab as $val) {
                    echo $val. " - ";
                }
                ?> 

                <p>Lecture des indices et des valeurs d'un tableau</p>
                <?php 
                    //Création d'un autre tableaux

                    for ($i = 0; $i <=8; $i++){ 
                        $tab[$i] = pow(2,$i);
                    }
                    var_dump($tab);
                    // Lecture des indices et des valeurs du tableau

                    foreach ($tab as $ind => $val ) { // récupère indice et valeur
                        echo " 2 puissance $ind vaut $val <br>";
                    }
                    echo "Le dernier indice de mon tableau est $ind et la dernière valeur est $val.";
                ?> 
            </div><!-- Fin de Col -->
        </div><!-- Fin de row -->

    </main>
    <?php require '../inc/footer.inc.php'; ?> 

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