<?php
    include "db/dbconfig.php";
    include "db/s_koszyk.php";
?>

<html>
    <head>
    </head>
    <body>
        <h1>Koszyk</h1>
        <table style="border: 1px solid black;">
            <tr>
                <td>Zdjęcie</td>
                <td>Nazwa</td>
                <td>Link</td>
            </tr>
            <?php
                foreach ($_SESSION['cart'] as $cart_id) {
                    $query = 'SELECT * FROM `produkty` WHERE id = '.$cart_id;
                    $res = mysqli_fetch_assoc(mysqli_query($GLOBALS["link"], $query));
                    echo '
                    <tr>
                        <td><img style="height: 30px;" src="'.$res['zdjecie'].'"></img></td>
                        <td>'.$res['tytul'].'</td>
                        <td><a href="showproduct.php?id='.$res['id'].'">Link</a></td>
                    </tr>
                    ';
                }
            ?>
        </table>
    </body>
</html>