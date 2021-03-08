<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - Variables</h1>
        <p class="lead">Une variable est le conteneur d'une valeur d'un des types utilisés par PHP (entiers, flottants, chaînes de caractères, tableaux, booléens, objets, ressource ou NULL).</p>
    </div>

    <main class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <h2>Les variables</h2>
                <p>Chaque variable possède un identifiant particulier, qui comme toujours par le caractère dollar ($) suivi du nom de la variable. Les règle de création des noms de variable sont les suivantes :</p>
                <ul>
                    <li>Le nom commence par un caractère alphabétique, pris dans les ensembles [a-z], [A-Z] ou par le tiret bas(_)</li>
                    <li>Les caractères suivants peuvent être les mêmes plus des chiffres.</li>
                    <li>
                        <?php
                            echo "<p>Nom du fichier inclus : ".__FILE__."</p>";
                        ?>
                    </li>
                    <li>La longueur du nom n'est pas limitée, mais il convient d'être raisonnable sous peine de confusion dans la saisie du code. Il est conseillé de créer des noms de variable le plus « parlant » possible. En relisant le code contenant la variable $nomclient, par exemple, vous comprenez davantage ce que vous manipulez que si vous aviez écrit $x ou $y.</li>
                </ul>
            </div>

            <div class="col-sm-12 col-md-4">
                <ul>
                    <li>La déclaration des variables n'est pas obligatoire en début de script. C'est là une différence notable avec les langages fortement typés comme Java ou C. Vous pouvez créer des variables n'importe où, à condition bien sûr de les créer avant de les utiliser, même s'il reste possible d'appeler une variable qui n'existe pas sans provoquer d'erreur.</li>
                    <li>L'initialisation des variables n'est pas non plus obligatoire et une variable non initialisée n'a pas de type précis.</li>
                    <li>Les noms des variables sont sensibles à la casse (majuscules et minuscules). $mavar et $MaVar ne désignent donc pas la même variable.</li>
                </ul>
            </div>

            <div class="col-sm-12 col-md-4">
                <h3>Les noms de variables suivants sont corrects</h3>
					<ul>
						<li>$mavar</li>
						<li>$_mavar</li>
						<li>$mavar2</li>
						<li>$M1</li>
						<li>$_123</li>
					</ul>
				<h3>Les noms de variables suivants sont illégaux</h3>
					<ul>
						<li>$*mavar</li>
						<li>$5_mavar</li>
						<li>$mavar2+</li>
					</ul>
            </div>
        </div><!-- Fin de row -->

        <div class="row">
            <div class="col-sm-12">
                <h3>Affectation de variables par valeur et par référence</h3>
                <p>L'affectation consiste à donner une valeur à une variable. Lors de la création d'une varaible, vous ne déclarez pas son type. c'est la valeur que vous lui affectez qui détermine ce type. Dans PHP, vous pouvez affecter une variable par valeur ou par référence.</p>
                <p>Exemple</p>
                <ul>
                    <li>$mavar=75;</li>
                    <li>$mavar="Paris";</li>
                    <li>$mavar=7*3+2/5-91%7; //PHP évalue l'expression puis affecte le résultat </li>
                    <li>$mavar=mysql_connect($a,$b,$c); //la fonction retourne une ressource </li>
                    <li>$mavar=isset($var&&($var==9)); //la fonction retourne une valeur booléenne</li>
				</ul>
            </div>
        </div><!-- Fin de row -->

        <div class="row">
            <div class="col-sm-12">
                <h2>Les variables prédéfinies</h2>
                <p>PHP dispose d'un nombre de variables prédéfinies, qui contiennent des information à la fois sur le serveur et sur toutes les données qui peuvent transiter entre le poste client et le serveur, comme les valeurs saisies dans un formulaire, les cookies ou les sessions.</p>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Variable</th>
                            <th scope="col">Utilisation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">$GLOBALS</th>
                            <td>Contient le nom et la valeur de toutes les variables globales du script. Les noms des variables sont les clés de ce tableau. $GLOBALS["mavar"] récupère la valeur de la variable $mavar en dehors de sa zone de visibilité (dans les fonctions, par exemple).</td>
                        </tr>
                        <tr>
                            <th scope="row">$_COOKIE</th>
                            <td>Contient le nom et la valeur des cookies enregistrés sur le poste client. Les noms des cookies sont les clés de ce tableau.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_ENV</th>
                            <td>Contient le nom et la valeur des variables d’environnement qui sont changeantes selon les serveurs.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_FILES</th>
                            <td>Contient le nom des fichiers téléchargés à partir du poste client.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_GET</th>
                            <td>Contient le nom et la valeur des données issues d'un formulaire envoyé par la méthode GET. Les noms des champs du formulaire sont les clés de ce tableau.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_POST</th>
                            <td>Contient le nom et la valeur des données issues d'un formulaire envoyé par la méthode POST. Les noms des champs du formulaire sont les clés de ce tableau.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_REQUEST</th>
                            <td>Contient l'ensemble des variables superglobales $_GET, $_POST, $_COOKIE et $_FILES.</td>
                        </tr>
                        <tr>
                            <th scope="row">$_SERVER</th>
                            <td>Contient les informations liées au serveur web, tel le contenu des en-têtes HTTP ou le nom du script en cours d'exécution. Retenons les variables suivantes :
                            <ul>
                                <li>
                                    $_SERVER["HTTP_ACCEPT_LANGUAGE"], qui contient le code de langue du
                                    navigateur client.
                                </li>
                                <li>
                                    $_SERVER["HTTP_COOKIE"], qui contient le nom et la valeur des cookies lus sur
                                    le poste client.
                                </li>
                                <li>$_SERVER["HTTP_HOST"], qui donne le nom de domaine.</li>
                                <li>$_SERVER["SERVER_ADDR"], qui indique l'adresse IP du serveur.</li>
                                <li>
                                    $_SERVER["PHP_SELF"], qui contient le nom du script en cours. Nous l'utiliserons souvent dans les formulaires.
                                </li>
                                <li>
                                    $_SERVER["QUERY_STRING"], qui contient la chaîne de la requête utilisée pour accéder au script.
                                </li>
                            </ul>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
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