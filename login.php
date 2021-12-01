<?php
session_start();
//connessione al db 
include("./data/config.php");

//variabili di login
$user = $_POST["user"];
$psw = $_POST["pass"];
//variabile di sessione per il colore
$color = $_SESSION["color"];


$query = "SELECT * FROM utenti WHERE nome = '$user' and password = '$psw'";
//la query deve stare nelle virgolette e NON nelle paresi.
//fai la domanda + connessione al database
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result); //1 if correct


if($num){ 

    if(isset($color) && isset($user)){
        //inizializzare una NUOVA variabile di sessione 
        $_SESSION["user"] = $user;

        echo "=> Welcome " . $user . " this is the color you chose " . $color . " it is saved in a session variable<br/>";

        include("./quiz.php");
    }
    
    //risultati trovati in righe: 1 
    //$count = mysqli_num_rows($result);
    //echo "<br/>existing rows: " . $count;

} else {
    echo "user not registered";
}

//chiudere la connessione?? why?
//mysqli_close($conn);
?>
