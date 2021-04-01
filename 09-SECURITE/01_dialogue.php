<?php require_once'../inc/functions.php'; 
    //Connexion à la BDD
    $pdoDIAG = new PDO('mysql:host=localhost;dbname=dialogue',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    ));

    $resultat = $pdoDIAG->query( " SELECT * FROM commentaire");
    // jevardump($resultat);

    //Traitement du formulaire & insertion dans la BDD
    //Ce formulaire n'est pas assez protégé contre les injection SQL !! >>>> ok');DELETE FROM commentaire;( cette phrase peut supprimer toutes les  données de table
    // if ( !empty( $_POST )) {
    //     // $resultat = $pdoDIAG->query( " INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW()) ");
    //     $resultat = $pdoDIAG->query( "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')" ); 
    //     //NOW() renvoie la date d'aujourd'hui ATTENTION dans l'exemple l'ordre "mélangé" des indices facilite l'injection SQL
    // }

    if ( !empty( $_POST )) {
        //Pour se premunir des failles nous fasions ceci
        $_POST[ 'pseudo' ] = htmlspecialchars($_POST[ 'pseudo' ]);
        $_POST[ 'message' ] = htmlspecialchars($_POST[ 'message' ]);

        $resultat = $pdoDIAG->prepare( "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUE ( :pseudo, NOW(), :message)"  );
        
        $resultat->execute( array(
            ':pseudo' => $_POST['pseudo'],
            ':message' => $_POST['message'],
        ) ); 
    }
    //Le fait de mettre des marqueurs dans la requête de ne pas concaténer les instructions SQL d'origine et celles qui seraient injectées. Ainsi elles ne peuvent as s'exécuter successivement. De plus, en liant les marqueurs à leur valeur dans execute(), PDO les neutralise automatiquement et les transforment en chaînes de caractère inoffensifs.

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Sécurité</title>
  </head>
  <body>
  <?php require '../inc/nav.inc.php'; ?>
    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - Sécurité & PHP</h1>
        <p class="lead"></p>
        <hr class="my-4">
    </div>

    <main class="container bg-white">
        <div class="row">
            <div class="col-md-6 p-4">
            <!-- Il faut faire un formulaire HTML avec action et method ; action reste vide si nous insérons grâce à cette même page et POST va envoyer les infos du form dans la superglobale $_POST -->
                <!-- <form action="" methode="POST">
                    <div class="form-group">
                        <label for="pseudo">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo" value="">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" value=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form> -->

                <form action="01_dialogue.php" class="border border-success border-5 m-2 px-2" method="POST">
                    <div class="mb-3 form-group">
                        <label for="pseudo" class="form-label" require>Pseudo</label>
                        <input type="text" name="pseudo" class="form-control form-group" id="pseudo" placeholder="Votre Pseudo">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="message" class="form-label" require>Commentaire</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Votre commentaire" value=""></textarea>
                    </div>
                    <input type="submit" href="#" class="submit btn btn-outline-success my-2"></a>
                </form>
            </div><!-- Fin de col -->

            <div class="col-md-6 p-4">
                <p>Création d'une BDD "dialogue" avec les information suivantes</p>
                <ul>
                    <li>Nom de la BDD : dialogue</li>
                    <li>Nom de la table : commentaire</li>
                    <li>Champs : id_commentaire INT PK AI</li>
                    <li>Pseudo : VARCHAR(20)</li>
                    <li>Message : TEXT</li>
                    <li>date_enregistrement : DATETIME</li>
                </ul>
                
            </div><!-- Fin de col -->

            <div class="col-md-6 p-4">
               
            </div><!-- Fin de col -->
        </div><!-- Fin de row -->

        <div class="row">
            <div class="col-sm-12 p-4">
                <!-- exo compter les commentaire et affichage des commentaires avec query et une boucle while dans un tableau HTML -->
                    <?php 
                        $resultat = $pdoDIAG->query(" SELECT * FROM commentaire ");
                        // jeprintr($resultat->rowCount());
                        $nbr_commentaire = $resultat->rowCount();//Je compte les résultats et je passe le total dans une nouvelle variable
                    ?> 
                    <h5>il y a <?php echo $nbr_commentaire; ?> commentaires</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pseudo</th>
                                <th>Message</th>
                                <th>Date d'enregistrement</th>
                            </tr>
                        </thead>

                    <?php 
                        while ( $commentaire = $resultat->fetch( PDO::FETCH_ASSOC ) ) { ?>
                            <tr>
                                <td><?php echo $commentaire['id_commentaire']; ?> </td>
                                <td><?php echo $commentaire['pseudo']; ?></td>
                                <td><?php echo $commentaire['message']; ?></td>
                                <td><?php echo $commentaire['date_enregistrement']; ?></td>
                            </tr>
                        <?php  } ?>
                    </table>
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