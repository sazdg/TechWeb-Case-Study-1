<?php
/*
include("config.php");

$q_domande = "SELECT * FROM domande";
$result = mysqli_query($conn, $q_domande);
*/

class Domanda {
    private $idQuestion;
    private $dom;
    private $punti;
    private $type;

    public function __construct($i, $txt, $pt, $t){
        $this->idQuestion = $i;
        $this->dom = $txt;
        $this->punti = $pt;
        $this->type = $t;
    }

    public function getIdQuestion(){
        return $this->idQuestion;
    }
    
    public function getDom(){
        return $this->dom;
    }

    public function getPunti(){
        return $this->punti;
    }
    
    public function getType(){
        return $this->type;
    }

}


?>