<?php
    include "db/dbconfig.php";

    function PokazProdukt(){
        $id = $_GET['id'];
        $query = 'SELECT * FROM `produkty` WHERE id = '.$id;
        $res = mysqli_query($GLOBALS['link'], $query);
        $r = mysqli_fetch_array($res);

        return '
            <h1>'.$r['tytul'].'</h1>
            <br>
            <img src='.$r['zdjecie'].'></img>
            <br>
            <h3>Opis:</h3>
            <br>
            <p>'.$r['opis'].'</p>
            <br><br>
            <h2>Cena: '.($r['cena_netto']+$r['podatek_vat']).' zł</h2>
            <h4>Szczegóły:</h4>
            Data utworzenia: '.$r['data_utworzenia'].'<br>
            Data modyfikacji: '.$r['data_modyfikacji'].'<br>
            Data wygaśnięcia: '.$r['data_wygasniecia'].'<br>


        ';
    }
?>

<html>
    <head>
    
    </head>
    <body>
        <?php
            echo PokazProdukt();
        ?>
    </body>
</html>