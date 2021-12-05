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
    include("data/domandeDB.php");
    include("data/risposteDB.php");
    //session_start();
    //ignored, session already started
    ?>
    
    <script>
        $(document).ready(function() {
            var col = "<?= $_SESSION["color"] ?>";
            $("html").css("background-color", col);

            //images 4th question
            $("#1").click(function(event){
                event.preventDefault();
                var img1 = '<img src="images/kevin.jpg" height=100/>';
                $("#1").html(img1);
            });

            $("#2").click(function(event){
                event.preventDefault();
                var img2 = '<img src="images/Rolf.jpg" height=100 />';
                $("#2").html(img2);
            });

            $("#3").click(function(event){
                event.preventDefault();
                var img3 = '<img src="images/jim.jpg" height=100 />';
                $("#3").html(img3);
            });

            $("#4").click(function(event){
                event.preventDefault();
                var img4 = '<img src="images/trevor.jpg" height=100 />';
                $("#4").html(img4);
            });
        });
    </script>


</head>

<body>

    <div>
        <form method="post" action="elabora_risposte.php">
        <?php
        echo "<br/>Ecco il tuo test " . $_SESSION["user"] . ":<br/><br/>";
        
        //var_dump($risposte_array);
        foreach($domande_array as $dom){
        ?>
            <ul>
                <li> <?= $dom->getDom(); ?> (punti: <?= $dom->getPunti(); ?>)<br/>
                <?php
                switch ($dom->getType()) {
                    case 'text':?>
                        <input 
                            type=<?= $dom->getType(); ?>
                            name=<?= $dom->getIdQuestion(); ?> >
                            <?php
                        break;

                    case 'radio':
                        for($i=2; $i<5; $i++){

                        ?>
                        <input
                            type=<?= $dom->getType(); ?>
                            name=<?= $dom->getIdQuestion(); ?> 
                            value=<?= $risposte_array[$i]->getRisp(); ?>>
                            <?= $risposte_array[$i]->getRisp(); ?>
                            <br/>
                            <?php
                        }
                        break;

                    case 'select':?>
                        <select name=<?= $dom->getIdQuestion(); ?>>
                        <?php
                        for($j=5; $j<9; $j++){
                            ?>
                        
                            <option 
                                value=<?= $risposte_array[$j]->getRisp(); ?>>
                                <?= $risposte_array[$j]->getRisp(); ?>
                            </option>
                        
                            <?php } ?>

                        </select>
                        <?php
                        break;

                    case 'checkbox':
                        for($k=9; $k<13; $k++){
                            ?>
                        <input
                            type=<?= $dom->getType(); ?>
                            name="amici[]"
                            value=<?= $risposte_array[$k]->getRisp(); ?>>
                            <?= $risposte_array[$k]->getRisp(); ?>
                            <a href="#" id=<?= $risposte_array[$k]->getIdA(); ?>>
                            mostra foto</a>

                            <br/>
                            <?php
                        }
                        break;

                    default:
                        echo "idk";
                        break;
                }
                ?>
                </li><br/>
            </ul>
        <?php } ?>

        <input type="submit" value="Invia tutto">
        </form>
    </div>


</body>

</html>


