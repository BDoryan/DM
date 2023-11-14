<?php

abstract class Personne {

    protected $age;
    protected $prenom;

    public function __construct($age, $prenom) {
        $this->age = $age;
        $this->prenom = $prenom;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function sePresente() {
        echo "Je suis une personne, j'ai $this->age an(s) et je me nomme $this->prenom";
    }

    public function getAge() {
        return $this->age;
    }

    public function getPrenom() {
        return $this->prenom;
    }
}