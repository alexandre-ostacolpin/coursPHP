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

        //Traitement de mise à jour du formulaire
    if ( !empty($_POST)){
        $_POST['prenom'] = htmlspecialchars($_POST['prenom']);
        $_POST['nom'] = htmlspecialchars($_POST['nom']);
        $_POST['sexe'] = htmlspecialchars($_POST['sexe']);
        $_POST['service'] = htmlspecialchars($_POST['service']);
        $_POST['date_embauche'] = htmlspecialchars($_POST['date_embauche']);
        $_POST['salaire'] = htmlspecialchars($_POST['salaire']);


        $resultat = $pdoENT->prepare( " INSERT INTO employes (prenom, nom, sexe, service, salaire, date_embauche) VALUES (:prenom, :nom, :sexe, :service, NOW() :salaire) " );

        
        $resultat->execute( array(
            ':prenom' => $_POST['prenom'],
            ':nom' => $_POST['nom'],
            ':sexe' => $_POST['sexe'],
            ':service' => $_POST['service'],
            ':date_embauche' => $_POST['date_embauche'],
            ':salaire' => $_POST['salaire'],
        ) );
        
    }
    

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
        <h1 class="display-4">Cours PHP 7 - Entreprise employes</h1>
        <p class="lead"></p>
        <hr class="my-4">
    </div>

    <main class="container bg-white">
        <div class="row">
            <div class="col-sm-12 p-4">
            <?php
                $requete = $pdoENT->query("SELECT * FROM employes ORDER BY sexe DESC, nom ASC");
                echo "<h2>";
                $nbr_employes = $requete->rowCount();
                 echo " il y a " .$nbr_employes. " employés ";
                echo "</h2>";

                echo "<table class=\"table table-sm table-success table-striped\">";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>Nom, prénom</th>";
                            // echo "<th>Sexe</th>";
                            echo "<th>Service</th>";
                            echo "<th>Date d'entrée</th>";
                            echo "<th>Salaire mensuel</th>";
                            echo "<th>Fiche</th>";
                        echo "</tr>";
                    echo "</thead>";
                    foreach ( $pdoENT->query( " SELECT * FROM employes ORDER BY sexe DESC, nom ASC " ) as $infos ) { //$employe étant un tableau on peut le parcourir avec une foreach. La variable $infos prend les valeurs successivement à chaque tour de boucle
                    // jevardump($infos);
                    echo "<tr>";
                        echo "<td>";
                        if ( $infos['sexe'] == 'f') {
                        echo "<span class=\"badge badge-secondary\">Mme ";
                        } else {
                        echo "<span class=\"badge badge-primary\">M. ";
                        } echo $infos['nom']. " " .$infos['prenom']. "</span></td>";
                        echo "<td>" .$infos['service']. " </td>";
                        // fonction pour afficher la date en FR avec les noms des jours et des mois en FR
                        setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR');
                        $dateBDD = $infos['date_embauche'];
                        echo "<td>" .strftime('%d %B %Y', strtotime($dateBDD)). " </td>";

                        // fonction pour afficher la date en FR plus simple sans les noms jours et mois en langue FR juste les chiffres
                        // echo "<td>" .date('d/m/Y', strtotime($infos['date_embauche'])). " </td>";
                        // echo "<td>" .$infos['date_embauche']. " </td>";
                        echo "<td>" .number_format($infos['salaire'],2,",","."). " €</td>";
                        echo "<td><a href=\"02_fiche_employes.php?id_employes=".$infos['id_employes']."\">Voir sa fiche</a></td>";
                  echo "</tr>";
                }
                echo "</table>";

                ?>
            </div><!-- Fin de col -->

            <div class="col-sm-12 p-4">

                <form action="" class="border border-success border-5 m-2 px-2" method="POST">
                    <div class="form-group">
                        <label for="prenom">prenom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nom">nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="sexe">sexe</label>
                        <input type="radio" name="sexe" value="m" checked>Homme
                        <input type="radio" name="sexe" value="f" <?php if (isset($_POST['civilite']) && $_POST['civilite'] =='f') echo 'checked';?>>Femme
                    </div>

                    <div class="form-group">
                        <select class="form-control" name="service" id="service">
                            <option value="commercial">commercial</option>
                            <option value="communication">comunication</option>
                            <option value="comptabilite">comptabilite</option>
                            <option value="direction">direction</option>
                            <option value="informatique">informatique</option>
                            <option value="juridique">juridique</option>
                            <option value="production">production</option>
                            <option value="secrétariat">secrétariat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="salaire">salaire</label>
                        <input class="form-control" type="text" name="salaire" id="salaire" value="">
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