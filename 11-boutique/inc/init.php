<?php 

////////// Fichier indispensable au fonctionnement du site //////////


////////// CONNEXION à LA BDD //////////

$pdoSITE = new PDO('mysql:host=localhost;dbname=site', 'root', '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    ));

////////// 2- Ouverture de session //////////
session_start();

////////// 3- Chemin du site avec une constante //////////

////////// 4- Variable pour les contenus //////////
$contenu = '';

////////// 5- Inclusion des fonctions //////////
require_once 'functions.php';
?>