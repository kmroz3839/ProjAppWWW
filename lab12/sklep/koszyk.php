<?php
    include "db/dbconfig.php";
    include "db/s_koszyk.php";
?>

<html>
    <head>
        <link rel="stylesheet" href="css/showproduct.css"></link>
    </head>
    <body>
        <h1>Koszyk</h1>
        <table style="border: 1px solid black;">
            <tr>
                <td>Zdjęcie</td>
                <td>Nazwa</td>
                <td>Cena+VAT/szt.</td>
                <td>Ilość</td>
                <td>Link</td>
            </tr>
            <?php
                $overallVal = 0.0;
                foreach ($_SESSION['cart'] as $cart_id) {
                    $query = 'SELECT * FROM `produkty` WHERE id = '.$cart_id[0];
                    $res = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $query));
                    $val = ($res['cena_netto']+$res['podatek_vat']);
                    $overallVal += $val * $cart_id[1];
                    echo '
                    <tr>
                        <td><img style="height: 30px;" src="'.$res['zdjecie'].'"></img></td>
                        <td>'.$res['tytul'].'</td>
                        <td>'.$val.' zł</td>
                        <td>'.$cart_id[1].'
                            <form method="POST">
                                <input type="hidden" name="cart_id" value="'.$cart_id[0].'"></input>
                                <input type="submit" name="cart_remove" value="-"></input>
                                <input type="submit" name="cart_add" value="+"></input>
                            </form
                        </td>
                        <td><a href="showproduct.php?id='.$res['id'].'">Link</a></td>
                    </tr>
                    ';
                }

                echo '<h3>'.$overallVal.' zł</h3>';
            ?>
        </table>

        <form method="POST">
            <input type="submit" name="cart_wipe" value="Wyczyść koszyk"></input>
        </form>
    </body>
</html>