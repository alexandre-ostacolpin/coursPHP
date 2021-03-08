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
    <div class="jumbotron container">
        <h1 class="display-4">Cours PHP 7 - Introduction</h1>
        <p class="lead">PHP signifie aujourd'hui php Hypertext Preprocessor.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>

    <main class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <p>Pour parvenir à la réalisation de site dynamique nous allons aborder successivement les point suivants :</p>
                    <ul>
                        <li>La syntaxe et les caractéristiques du langage PHP 7</li>
                        <li>Les notions essentielles du langage SQL permettant la création et la gestion d'une BDD et la réalisation des requêtes de base</li>
                        <li>Le fonctionnement et la réalisation de BDD MySQL et les moyens d'y accéder à l'aide de fonctions spécialisées de PHP (ou d'objet)</li>
                    </ul>
            </div>

            <div class="col-sm-12 col-md-4">
                <p>PHP  permet  en  outre  de  créer  des  pages  interactives.  Une  page  interactive permet  à  un  visiteur  de  saisir  des données  personnelles.  Ces  dernières  sont ensuite transmises au serveur, où elles peuvent rester stockées dans une base de données pour être diffusées vers d'autres utilisateurs. Un visiteur peut, par exemple, s'enregistrer et retrouver une page adaptée à ses besoins lors d'une visite ultérieure. Il peut aussi envoyer des e-mails et des fichiers sans avoir à passer par son logiciel de messagerie. En associant toutes ces caractéristiques, il est possible de créer aussi bien des sites de diffusion et de collecte d'information que des sites d'e-commerce, de rencontres ou des blogs.</p>
            </div>

            <div class="col-sm-12 col-md-4">
                <p>Pour contenir la masse d'informations collectées, PHP s'appuie généralement sur une base de données, généralement MySQL mais aussi SQLite, et sur desserveurs Apache. PHP, MySQL et Apache forment d'ailleurs le trioultradominant sur les serveurs Internet. Quand ce trio est associé sur unserveur à Linux, on parle de système LAMP (Linux, Apache, MySQL, PHP).PHP est utilisé aujourd'hui par plus des trois quarts des sites dynamiques dela planète et par les trois quarts des grandes entreprises françaises. Pour un serveur Windows, on parle de système WAMP, mais ceci est beaucoup moins courant.</p>
            </div>
        </div><!-- Fin de row -->

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <p>Avec le code suivant écrit dans un fichier nommé infos.php placé sur le serveur d'évalution on obtient toutes les infos sur le php exécuté dans ce serveur</p>
                <blockquote class="border border-warning w-50 p-2">
                    <code>
                    &lt;?php <br>
                    phpinfo(); <br>
                    ?>
                    </code>

                </blockquote>

                <blockquote class="border border-warning w-50 p-2">
                <code>
                    &lt;?php
					echo "&lt;?h3> Aujourd'hui le ". date('d/m/Y - H:m:s')."&lt;?/h3>&lt;?hr>";
					echo "&lt;?h2>Bienvenue sur le site PHP 7<&lt;?/h2>";
					?>
                </code>
				</blockquote>
            </div>

            <div class="col-sm-12 col-md-6">
                <?php
                    echo "<h3> Aujourd'hui nous somme le ". date('d/m/Y')."</h3>";
                    echo "<h4> Bienvenue sur le cours PHP 7 </h4>";
                ?>
                <hr>
                <h5>Le cycle de vie d'une page PHP</h5>
                <ul>
                    <li>Envoie d'une requête HTTP par le navigateur client vers le serveur du type http://www.monserveur.fr.page.php</li>
                    <li>Interprétation par le serveur du code PHP contenu dans la page appelée</li>
                    <li>Envoi par le serveur d'un fichier dont le contenu est purement HTML</li>
                </ul>
            </div>
        </div><!-- Fin de row -->
        <div class="row">
            <div class="col-sm-12">
                <a href="btn btn-secondary btn-sm-mb-2" href="../00-pages/01-page.php" role="button">Une page en php</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                    <h2>Inclure des fichiers externes</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Fonction</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>include("nom_fichier.php")</td>
                            <td>Lors de son interprétation par le serveur, cette ligne est remplacée par tout le contenu du fichier précisé en paramètre, dont vous fournissez le nom et éventuellement l'adresse complète. En cas d'erreur, par exemple si le fichier n'est pas trouvé, include() ne génère qu'une alerte (un warning), et le script continue.</td>
                        </tr>
                        <tr>
                            <td>require("nom_fichier.php")</td>
                            <td>A désormais un comportement identique à include(), à la différence près qu'en cas d'erreur, require() provoque une erreur fatale et met fin au script.</td>
                        </tr>
                        <tr>
                            <td>include_once("nom_fichier.php") <br>
                                require_once("nom_fichier.php")
                            </td>
                            <td>Contrairement aux deux précédentes, ces fonctions ne sont pas exécutées plusieurs fois, même si elles figurent dans une boucle ou si elles ont déjà été exécutées une fois dans le code qui précède.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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