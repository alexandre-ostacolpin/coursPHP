<?php
    //Une première fonction
    function mnPap(){
        echo "<p class=\"lead\">Hello boys ! </p>";
    }
    // mini exo : faire une fonction qui donne la date du jour.

    function quelJour(){
        echo "<p class=\"border border-primary p-2 w-50\"> we are ". date('l') . "</p>";
    }

    function dateJourFr2() {
        setlocale(LC_ALL, 'fr_FR');
        echo "<p>Aujourd'hui, nous sommes le " .strftime("%A %e %B %Y"). "</p>";
    }

    //Création d'une fonction pour "var_dump" une variable (très utile pour un tableau)
    function jevardump ( $mavariable ) {//La fonction nommée avec son paramètre, une variable
        echo "<br><small class=\"bg-warning\">... var_dump </small><pre class=\"alert alert-warning w-75\">";
        var_dump ( $mavariable );//Une variable à laquelle on applique la fonction var_dump
        echo "</pre>";
    } 

        function jeprintr ( $mavariable ) {//La fonction nommée avec son paramètre, une variable
            echo "<br><small class=\"bg-warning\">... print_r </small><pre class=\"alert alert-warning w-75\">";
            print_r ( $mavariable );//Une variable à laquelle on applique la fonction var_dump
            echo "</pre>"; 

    
    }
?> 