<?php 

    $pdoSITE = new PDO('mysql:host=localhost;dbname=site',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
    ));

    // echo "coucou";

    $resultat = $pdoSITE->query( " SELECT * FROM membre");
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC );
    // jeprintr($ligne);

    echo $ligne['prenom'];
?> 