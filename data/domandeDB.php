<?php
include("config.php");
include("Domande.php");

$query = "SELECT * FROM domande";
$result = mysqli_query($conn, $query);
$x = mysqli_num_rows($result);

//nuovo array vuoto da riempire con le domande del DB
$domande_array = array();

//la funzione FETCH deve essere inserita nel loop per poter estrarre tutti i risultati altrimenti esce solo 1 riga :D
while($row = mysqli_fetch_assoc($result)){
        $y = new Domanda($row["idQ"],$row["domanda"],$row["punti"],$row["tipo"]);
        $domande_array[] = $y;
        //inseriti gli oggetti domanda nell'array
    }

    /*PER STAMPARE GLI OGGETTI
foreach ($domande_array as $key => $value) {
    echo $domande_array[$key]->getPunti() . "<br/>";
}*/

//var_dump($domande_array);
?>