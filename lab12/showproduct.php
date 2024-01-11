<?php
    include "db/dbconfig.php";
    include "db/s_koszyk.php";

    function PokazProdukt(){
        $id = $_GET['id'];
        $query = 'SELECT * FROM `produkty` WHERE id = '.$id;
        $res = mysqli_query($GLOBALS['link'], $query);
        $r = mysqli_fetch_array($res);

        $plink = '';
        if ($r['status_dostepnosci'] == 0){
            $plink = '<h2>Produkt niedostępny</h2>';
        } else {
            $plink = '<form method="POST">
            <input type="number" name="cart_count" min=1 value="1"></input>
            <input type="submit" name="cart_add" value="Dodaj do koszyka"></input>
            </form>';
        }

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
            '.$plink.'
            <h4>Szczegóły:</h4>
            Data utworzenia: '.$r['data_utworzenia'].'<br>
            Data modyfikacji: '.$r['data_modyfikacji'].'<br>
            Data wygaśnięcia: '.$r['data_wygasniecia'].'<br>
            Gabaryt: '.$r['gabaryt_produktu'].'<br>


        ';
    }
?>

<html>
    <head>
    
    </head>
    <body>
        <?php
            echo dbg_printCart();

            echo PokazProdukt();
        ?>
    </body>
</html>