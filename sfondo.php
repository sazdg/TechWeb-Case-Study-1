<?php
session_start();
$m = "Non ho ricevuto il colore";

if(isset($_GET["c"])){
    $_SESSION["color"] = $_GET["c"];
    $m = "trovato! " . $_SESSION["color"] . " e salvato in una var di sessione";
} else {
    echo $m;
}

?>
