<!DOCTYPE html>
<html>

<head>
    <title>PHP case study 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="case study GOY quiz the office" />
    <meta name="author" content="saz" />
    <link rel="stylesheet" href="css/stile.css">
    <!--JQ CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <?php
    include("data/config.php");
    session_start();
    ?>

    <script>
        $(document).ready(function() {
            var col = "<?= $_SESSION["color"] ?>";
            $("html").css("background-color", col);
        });
    </script>


</head>

<?php
include("data/config.php");
include("data/domandeDB.php");
include("data/risposteDB.php");

$score = 0; //punti del quiz
$risp = array($_POST["1"],$_POST["2"],$_POST["3"]);
$risp4 = $_POST["amici"];
$lunghezza = count($risposte_array);

$corrette = array();
foreach ($risposte_array as $r) {
    if($r->getPunti() > 0){
        $corrette[] = $r;
    }
}
//var_dump($corrette);

foreach ($corrette as $c) {
    foreach ($risp as $r) {
        //echo $r."<br/>";
        //echo $c->getRisp()."<br/>";
        if(strpos($c->getRisp(), $r) !== false){
            $score += $c->getPunti();
        }
    }
    //array amici, risposta 4
    foreach ($risp4 as $s) {
        //echo $s."<br/>";
        //echo $c->getRisp()."<br/>";
        if(strpos($c->getRisp(), $s) !== false){
            $score += $c->getPunti();
        }
    }
}
//controllare che le risposte siano giuste
//assegnare i punti

//!!!!!!!!!! le risposte contengono lo spazio, si perdono quello informazioni dopo lo spazio
//mysl or php ignore the space in the text, the input is half received

?>

<body>
    <?php
    echo "ECCO LE TUE RISPOSTE:<br/>";
    //ciclare l'array risposte dell'utente
    foreach ($risp as $key) {
        echo $key . "<br/>";
    }
    foreach ($risp4 as $key) {
        echo $key . "<br/>";
    }

    echo "totale punti ottenuti: " . $score . "/10";
    //if statement per sapere se ha superato la prova
    ?>

    <br/>
    <br/>
    <img src="images/Rolf.jpg" height=100 />
    <img src="images/trevor.jpg" height=100 />
</body>

</html>