<?php require_once'../inc/functions.php'; 
    //Connexion à la BDD
    $pdoENT = new PDO('mysql:host=localhost;dbname=entreprise',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    ));

    $resultat = $pdoENT->query( " SELECT * FROM employes");
    // jevardump($resultat);

    //Traitement des infos reçu par $_GET
    // jeprintr($_GET); // Pour vérifier que l'on reçoit une infos par l'URL.

    if (isset($_GET['id_employes'] ) ) { // si existe l'indice "id_employes" dans $_GET, donc dans l'url, c'est qu'on a demandé le détail d'un employé.
        // jeprintr($_GET);
        $resultat = $pdoENT->prepare( " SELECT * FROM employes WHERE id_employes = :id_employes" );
        $resultat->execute(array(
            ':id_employes' => $_GET['id_employes']// On associe le marqeur vide à l'id_employes qui provient de l'url
        ));
        // jeprintr($resultat);
        // jeprintr($resultat->rowCount());
        if ( $resultat->rowCount() == 0) { // Si il y a 0 lignes dans $resultat c'est que l'id n'existe pas
            header( 'location:02_employes.php');// On redirige vers une autre page 
            exit();// on arrête le script
        }

        $fiche = $resultat->fetch( PDO::FETCH_ASSOC );
        jeprintr($fiche);
        } else { 
            header('location:02_employes.php');
            exit();
        }

        if (!empty( $_POST )) {
            $_POST[ 'prenom' ] = htmlspecialchars($_POST[ 'prenom' ]);
            $_POST[ 'nom' ] = htmlspecialchars($_POST[ 'nom' ]);
            $_POST[ 'sexe' ] = htmlspecialchars($_POST[ 'sexe' ]);
            $_POST[ 'service' ] = htmlspecialchars($_POST[ 'service' ]);
            $_POST[ 'date_embauche' ] = htmlspecialchars($_POST[ 'date_embauche' ]);
            $_POST[ 'salaire' ] = htmlspecialchars($_POST[ 'salaire' ]);
            jeprintr($_POST);

            $resultat = $pdoENT->prepare( " UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, date_embauche = :date_embauche, salaire = :salaire WHERE id_employes = :id_employes");

            $resultat->execute( array(
                ':prenom' => $_POST[ 'prenom' ],
                ':nom' => $_POST[ 'nom' ],
                ':sexe' => $_POST[ 'sexe' ],
                ':service' => $_POST[ 'service' ],
                ':date_embauche' => $_POST[ 'date_embauche' ],
                ':salaire' => $_POST[ 'salaire' ],
                ':id_employes' => $_GET[ 'id_employes' ],
            ));
            header( 'location:02_employes.php');
            exit();
        } // fin du if empty


        // if ( !empty($_POST)){
        //     $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
        //     $_POST['nom'] = htmlspecialchars($_POST['nom']);
        //     $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
        //     $_POST['service'] = htmlspecialchars($_POST['service']);
        //     $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
        //     $_POST['salaire'] = htmlspecialchars($_POST['salaire']);
    
        //     $resultat = $pdoENT->prepare( " UPDATE employes SET prenom = :prenom, nom = :nom, sexe = :sexe, service = :service, date_embauche = :date_embauche, salaire = :salaire WHERE id_employes = :id_employes " );
    
        //     $resultat->execute( array(
        //         ':prenom' => $_POST['prenom'],
        //         ':nom' => $_POST['nom'],
        //         ':sexe' => $_POST['sexe'],
        //         ':service' => $_POST['service'],
        //         ':date_embauche' => $_POST['date_embauche'],
        //         ':salaire' => $_POST['salaire'],
        //         ':id_employes' => $_GET['id_employes'],
                
        //     ) );jevardump($_POST);
        //     header( 'location:02_employes.php');
        //     exit();
        // }
    

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - Fiche de l'employé n <?php echo $fiche['id_employes']; ?></title>
  </head>
  <body>
  <?php require '../inc/nav.inc.php'; ?>
    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - Employés <?php echo $fiche['prenom']. " " .$fiche['nom']; ?> </h1>
        <p class="lead">modifications d'employés</p>
        <hr class="my-4">
    </div>

    <main class="container bg-white">
        <div class="row">
            <div class="col-md-6 p-4">
            <div class="card" style="width: 18rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title alert alert-success"><?php echo $fiche['prenom']. " " .$fiche['nom']; ?></h5>
                    <p class="card-text alert alert-warning"><?php echo $fiche['sexe']; ?></p>
                    <p class="card-text alert alert-warning"><?php echo $fiche['service']. "<br> Salaire : " .number_format($fiche['salaire'],2,",","."). "€" ?></p>
                    <p class="card-text alert alert-warning">
                    <?php 
                    setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR');
                    echo strftime('%d %B %Y', strtotime($fiche['date_embauche'])); ?> </p>
                    <!-- <a href="panier.php" class="btn btn-primary">Mettre au panier</a> -->
                        
                </div>
            </div>
            </div><!-- Fin de col -->

            <div class="col-md-6 p-4">

                <form action="" class="border border-success border-5 m-2 px-2" method="POST">
                    <div class="form-group">
                        <label for="prenom">prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" value="<?php echo $fiche['prenom']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nom">nom</label>
                        <!-- if (isset($_POST['nom']) { echo "..."; } else { echo ''; }  si il n'y a rien je mets une chaîne vide opérateur de coalescence -->
                        <!-- Cette opérateur avec $_POST['nom'] et if isset else "résumé" avec l'opérateur de coalescence sera utile si on utilise un seul formulaire pour INSERT ou UPDATE -->
                        <input type="text" name="nom" class="form-control" id="nom" value="<?php echo $fiche['nom']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="sexe"></label>
                        <!-- Pour les boutons radio le 1er bouton sera "checked" et le second le sera si on a l'info du sexe et si cette info est égale à "f" -->
                        <input type="radio" name="sexe" value="m" checked>Homme
                        <input type="radio" name="sexe" value="f" <?php if (isset($fiche['sexe']) && $fiche['sexe'] =='f') echo 'checked'; ?>>Femme
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="service" id="service">
                            <option value="commercial"<?php if (!(strcmp( "commercial", $fiche[ 'service']))) {echo " selected";} ?> >commercial</option>
                            <option value="communication"<?php if (!(strcmp( "communication", $fiche[ 'service']))) {echo " selected";} ?>>comunication</option>
                            <option value="comptabilite"<?php if (!(strcmp( "comptabilite", $fiche[ 'service']))) {echo " selected";} ?>>comptabilite</option>
                            <option value="direction"<?php if (!(strcmp( "direction", $fiche[ 'service']))) {echo " selected";} ?>>direction</option>
                            <option value="informatique"<?php if (!(strcmp( "informatique", $fiche[ 'service']))) {echo " selected";} ?>>informatique</option>
                            <option value="juridique"<?php if (!(strcmp( "juridique", $fiche[ 'service']))) {echo " selected";} ?>>juridique</option>
                            <option value="production"<?php if (!(strcmp( "production", $fiche[ 'service']))) {echo " selected";} ?>>production</option>
                            <option value="secretariat"<?php if (!(strcmp( "secretariat", $fiche[ 'service']))) {echo " selected";} ?>>secretariat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_embauche">date_embauche</label>
                        <input class="form-control" type="date" name="date_embauche" id="date_embauche" value="<?php echo $fiche['date_embauche']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="salaire">salaire</label>
                        <input class="form-control" type="text" name="salaire" id="salaire" value="<?php echo $fiche['salaire']; ?>">
                    </div>
                    
                    <input type="submit" href="#" class="submit btn btn-outline-success my-2"></a>
                </form>  
            </div><!-- Fin de col -->

            <div class="col-sm-12 p-4">
               
            </div><!-- Fin de col -->
        </div><!-- Fin de row -->

        <div class="row">
            <div class="col-sm-12 p-4">
                
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