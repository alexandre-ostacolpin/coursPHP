<?php
define("PI",3.1415926535,TRUE);//Définition insensible à la casse

echo "La constante PI vaut ",PI,"<br>";
echo "La constante PI vaut ",pi,"<br>";

//Vérification de l'existence de la constante

if (defined("PI") ) echo "La constante est déjà définie<br>";
// if (defined("pi") ) echo "La constante est déjà définie<br>";

define("sitegravillon", "http://www.gravillon.fr",FALSE);

echo "l'url de Gravillon est : ".siteGRAVILLON."<br>";

echo "Visitez le site de <a href=\" ".sitegravillon." \" target=\"_blank\">Gravillon</a>";
?>