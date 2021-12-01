<?php

class Risposta {
    private $idA;
    private $risp;
    private $idQ; //id domanda
    private $punti;

    public function __construct($id, $answer, $question, $pt){
        $this->idA = $id;
        $this->risp = $answer;
        $this->idQ = $question;
        $this->punti = $pt;
    }

    public function getIdA(){
        return $this->idA;
    }

    public function getRisp(){
        return $this->risp;
    }

    public function getIdQ(){
        return $this->idQ;
    }

    public function getPunti(){
        return $this->punti;
    }
}

?>