<?php
include("config.php");
include("Risposte.php");

$query = "SELECT * FROM risposte";
$result = mysqli_query($conn, $query);
$x = mysqli_num_rows($result);
//echo $x . " risposte<br/>";

$risposte_array = array();

while($row = mysqli_fetch_assoc($result)){
    $y = new Risposta($row["idA"],$row["risposta"],$row["idDomanda"],$row["risultato"]);

    //echo "<br/>" . $row["risposta"] . " " . $row["idDomanda"] . "<br/>";
    $risposte_array[] = $y;
}

//var_dump($risposte_array);
?>