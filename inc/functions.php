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
        echo "<p>Aujourd'hui, nous sommes le " .strftime("%A"). "</p>";
    }
?> 

