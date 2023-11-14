<?php

require_once "Personne.class.php";

class Homme extends Personne {

    public function __construct($prenom, $age) {
        parent::__construct($age, $prenom);
    }

    public function sePresente() {
        echo "Je suis un homme, j'ai $this->age an(s) et je m'appelle $this->prenom";
    }
}