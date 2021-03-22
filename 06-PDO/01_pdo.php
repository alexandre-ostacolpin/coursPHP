<?php require_once'../inc/functions.php'; ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Cours PHP 7 - PDO</title>
  </head>
  <body>
  <?php require '../inc/nav.inc.php'; ?>
    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - PDO</h1>
        <p class="lead">La variable "$pdo" est un objet qui représente la connexion à une BDD</p>
        <hr class="my-4">
    </div>

    <main class="container bg-white">
        <div class="row">
            <div class="col-sm-12">
                <h2>COnnexion à la BDD</h2>
                <p><abbr title="PHP Data Object">PDO</abbr> est l'acronyme de PHP Data Object</p>
                <?php 
                    $pdoENT = new PDO('mysql:host=localhost;dbname=entreprise',//On a en premier lieu le driver mysql (IBM, ORACLE, ODBC ...), le nom du serveur, le nom de la BDD
                    'root',//L'utilisateur pour la BDD
                    '',//Si vous êtes sur MAC il y a un mdp = 'root'
                    array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,// Cette ligne sert à afficher les erreurs SQL dans le navigateur
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',// Pour définir le charset des échanges avec la BDD
                    ));

                    //connexion PISOLA

                    // $host = 'localhost';
                    // $database = 'entreprise';
                    // $user = 'root';
                    // $psw = '';

                    // $pdoENT = new PDO('mysql:host='.$host.';dbname'.$database,$user,$psw);
                    // $pdoENT ->exec("SET NAMES utf8");

                    jevardump($pdoENT); //L'objet est vide car il n'y a pas de propriétés
                    jevardump(get_class_methods ($pdoENT));// permet d'afficher la liste des methodes présentes dans l'objet PDO
                ?> 
            </div><!-- Fin de col -->

            <div class="col-sm-12">
                    <h2>2- Faire des requêtes avec exec()</h2>
                    <p>La méthode exec() est utilisée pour faire des requêtes qui ne retournent pas de résultats : INSERT, UPDATE, DELETE</p>
                    <p>Valeurs de retours : <br>
                    succès : 1 : dans le jevardump de $requete on aura le nombre de lignes affectées par la requête, 3 delete = integer(3), query() retourne un nouvel objet qui provient de la classe PDOstatement. <br>
                    Echec : false = 0</p>
                    <ul>
                        <li>Pour information, on peut mettre dans les paramètres () de fetch()</li>
                        <li>PDO::FETCH_NUM : pour obtenir un tableau au indice numérique</li>
                        <li>PDO::FETCH_OBJ : pour obtenir un dernier objet</li>
                        <li>Ou encore des () vides : pour obtenir un mélange de tableau associatif et numérique</li>
                    </ul>
                    <?php 
                        //On va insérer un employé dans la BDD
                        //requêt SQL d'insertion dans la BDD et dans la table employes INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bon', 'm', 'informatique', '2020-03-18', 2000)

                        // $requete = $pdoENT->exec( "INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Jean', 'Bon', 'm', 'informatique', '2020-03-09', 2000)" );

                        // $requete = $pdoENT->exec( "DELETE FROM employes WHERE prenom='Jean' AND nom='bon' ");
                        // jevardump($requete);

                        // echo "Dernier id générée en BDD : " .$pdoENT->LastInsertId();
                    ?> 
            </div><!-- Fin de col -->

            <div class="col-sm-12">
                <h2>3- Faire des requêtes avec <code>query()</code></h2>
                <p><code>query()</code> est utilisé pour faire des requêtes qui retournent un ou plusieur résultats : SELECT mais aussi DELETE, UPDATE et INSERT</p>
                <?php 
                //1- On demande des informations à la BDD car il y a un ou plusieurs résultats avec query()
                    $requete = $pdoENT->query ( "SELECT * FROM employes WHERE prenom = 'Amandine' " );
                    // jevardump($requete);

                    //2- Dans cet objet $requete nous ne voyons pas encore les données concernant amandine. Pourtant elles s'y trouvent. Pour y accéder nous devons utiliser une méthode de $requete qui s'apelle fetch()

                    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                    //3- Avec cette méthode fetch() on transforme l'objet $requete
                    //4- fetch(), avec le paramètre PDO::FETCH_ASSOC permet de transformer l'objet $requete en un array associatif appelé içi $ligne : on y trouve en indice le nom des champs de la requête SQL
                    jevardump($ligne);

                    echo "<p>Nom : " .$ligne['prenom']. " " .$ligne['nom']. "</p>";
                    echo "<p>service : " .$ligne['service']. " Date d'embauche dans l'entreprise : " .$ligne['date_embauche']. " Salaire annuel " .$ligne['salaire']. " sexe " .$ligne['sexe']. "</p>";

                    //exo afficher le service de l'employé dont l'id est 417 et son nom et son prénom
                    $requete = $pdoENT->query ( "SELECT * FROM employes WHERE id_employes = 417 " );
                    // jevardump($requete);
                    $ligne = $requete->fetch(PDO::FETCH_ASSOC);
                    // jevardump($ligne);

                    echo "<p>sont nom de famille " .$ligne['nom']. " et sont prenom " .$ligne['prenom']. " Travaille au service " .$ligne['service']. "</p>";

                    // echo $ligne['nom']
                ?> 

            </div><!-- Fin de col -->

            <div class="col-sm-12">
                <h2>04 - Faire des requêtes avec <code>query()</code>et afficher plusieurs résultats</h2>

                <?php 
                    $requete = $pdoENT->query( " SELECT * FROM employes ORDER BY nom ");
                    // jevardump($requete);

                    $nbr_employes = $requete->rowCount();// Cette méthode rowCount() permet de compter le nbr de rengées (d'enrengistrements) retournés par la requête
                    // jevardump($nbr_employes);

                    echo " il y a " .$nbr_employes. " employés dans la base. ";
                    //Comme nous avons plusieurs résultats dans $requete nous devons faire une boucle pour les parcourir
                    //fetch() va chercher la ligne suivante du jeu de résultat à chaque tour de boucle, et le transforme en objet. La boucle while permet de faire avancer le curseur
                    while ( $ligne = $requete->fetch(PDO::FETCH_ASSOC )){
                        echo "<p> sont nom de famille " .$ligne['nom']. " et sont prenom " .$ligne['prenom']. " Travaille au service " .$ligne['service']. "</p>";
                    }

                    //Exo afficher la liste des différents services dans une ul en mettant un service par li 
                    $requete2 = $pdoENT->query( " SELECT DISTINCT (service) FROM employes");

                    $nbr_employes2 = $requete2->rowCount();

                    echo " il y a " .$nbr_employes2. " service dans la société ";

                    echo "<ul>";
                    while ($ligne2 = $requete2->fetch(PDO::FETCH_ASSOC)){
                        echo "<li>" .$ligne2['service']. "</li>";
                    }"</ul>";

                    echo "<hr>"

                    // $requete2 = $pdoENT->query( " SELECT DISTINCT (service) FROM employes");
                    // jevardump($requete2);
                    // $nbr_employes2 = $requete2->rowCount();
                    // jevardump($nbr_employes2);
                    // echo " il y a " .$nbr_employes2. " service dans la société ";


                    // while ($ligne2 = $requete2->fetch(PDO::FETCH_ASSOC)){
                    //     echo "<ul><li>" .$ligne2['service']. "</li></ul>";
                    // };
                ?> 
            </div><!-- Fin de col -->
            <div class="col-sm-12">
                <!-- Exo 1/ dans un h2 compter le nombre d'employés -->
                <!-- 2/ Puis afficher toutes les informations des employés dans un tableau HTML trié par ordre alphabétique de nom -->

                <?php
                    $requete = $pdoENT->query("SELECT * FROM employes ORDER BY nom ASC");
                    echo "<h2>";
                    $nbr_employes = $requete->rowCount();
                    echo " il y a " .$nbr_employes. " employés ";
                    echo "</h2>";

                    
                    echo "<table border=\"5\"> <tr>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>nom</th>";
                            echo "<th>prénom</th>";
                            // echo "<th>Sexe</th>";
                            echo "<th>sexe</th>";
                            echo "<th>Date d'entrée</th>";
                            echo "<th>service</th>";
                            echo "<th>Salaire mensuel</th>";
                        echo "</tr>";
                    echo "</thead>";
                    while ($ligne = $requete->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "<td>" .$ligne['nom']. "</td>";
                        echo "<td>" .$ligne['prenom']. "</td>";
                        // if ( $ligne['sexe'] == 'f') {
                        // echo "<td> Mme " .$ligne['nom']. " " .$ligne['prenom']. "</td>"; 
                        // } else {
                        // echo "<td> M. " .$ligne['nom']. " " .$ligne['prenom']. "</td>"; 
                        // } 
                        echo "<td>" .$ligne['sexe']. "</td>";
                        echo "<td>" .$ligne['date_embauche']. "</td>";
                        echo "<td>" .$ligne['service']. "</td>";
                        echo "<td>" .$ligne['salaire']. "</td>";
                        // echo $ligne['prenom'];
                    };
                    echo "</table border=\"5\"></tr>";

                    echo "<hr>";

                    // reprendre ici LUNDI 
                echo "<table class=\"table table-success table-striped\">";
                foreach ( $pdoENT->query( " SELECT * FROM employes ORDER BY sexe DESC, nom ASC " ) as $infos ) { //$employe étant un tableau on peut le parcourir avec une foreach. La variable $infos prend les valeurs successivement à chaque tour de boucle
                  // jevardump($infos);
                  echo "<tr>";
                    echo "<td>";
                    if ( $infos['sexe'] == 'f') {
                      echo "Mme ";
                    } else {
                      echo "M. ";
                    } echo $infos['nom']. " " .$infos['prenom']. "</td>";
                    echo "<td>" .$infos['service']. " </td>";
                    echo "<td>" .$infos['date_embauche']. " </td>";
                    echo "<td>" .$infos['salaire']. " €</td>";
                  echo "</tr>";
                }
                echo "</table>";

                //     echo "<table class=\"table table-primary table-striped\">";
                //     echo "<thead>";
                //         echo "<tr>";
                //             echo "<th>ID</th>";
                //             echo "<th>Nom, prénom</th>";
                //             // echo "<th>Sexe</th>";
                //             echo "<th>Service</th>";
                //             echo "<th>Date d'entrée</th>";
                //             echo "<th>Salaire mensuel</th>";
                //         echo "</tr>";
                //     echo "</thead>";
                //     while ( $employe = $requete->fetch( PDO::FETCH_ASSOC )) {
                //     echo "<tr>";
                //         echo "<td>" .$employe['id_employes']. " </td>";
                //         if ( $employe['sexe'] == 'f') {
                //         echo "<td> Mme " .$employe['nom']. " " .$employe['prenom']. "</td>"; 
                //         } else {
                //         echo "<td> M. " .$employe['nom']. " " .$employe['prenom']. "</td>"; 
                //         }            
                //         // echo "<td>" .$employe['sexe']. " </td>";
                //         echo "<td>" .$employe['service']. " </td>";
                //         echo "<td>" .$employe['date_embauche']. " </td>";
                //         echo "<td>" .$employe['salaire']. " €</td>";
                //     echo "</tr>";
                //     }
                // echo "</table>";


                
                ?>
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