<?php 
////////// 1- Fonction print_r //////////
function jeprint_r ( $mavariable ) {
    echo "<br><small class=\"bg-warning\">... print_r </small><pre class=\"alert alert-warning w-75\">";
    print_r ( $mavariable );
    echo "</pre>";
}

////////// 2-Fonction pour exécuter les prepare() //////////

function executeRequete($requete, $parametres = array ()) { // utilise pour toutes les requêtes du site 
    foreach ($parametres as $indice => $valeur) {   //foreach     
        $parametres[$indice] = htmlspecialchars($valeur); // on evite les injections SQL
        global $pdoSITE; // 'global' nous permet d'accéder à la variable $pdoSITE dans l'espace global du fichier init.php
        $resultat = $pdoSITE->prepare($requete); // Puis prepare la requête
        $succes = $resultat->execute($parametres); // on exécute
        if ($succes === false) {
            return false; // si la requête  n'a pas marché je renvoie false
        } else {
            return $resultat;
        }// fin if else 
    }
}// fermeture fonction executeRequete

////////// 3- Vérifier si le membre est connecté //////////

////////// 4- Vérifier le statut du membre //////////
?> 