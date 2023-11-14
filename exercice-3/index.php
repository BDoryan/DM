<?php
    require_once "Homme.class.php";
    require_once "Femme.class.php";

    $femme = new Femme("Ingrid", 50);
    $femme->sePresente();

    echo "<br>";
    $homme =  new Femme("Yannick", 54);
    $homme->sePresente();