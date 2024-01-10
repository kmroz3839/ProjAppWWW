<?php
    include 'db/dbconfig.php';
    include "db/s_koszyk.php";

    function insertRecord($tytul, $opis, $cena_netto, $podatek_vat, $ilosc_dostepnych, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie) {
        $query = "INSERT INTO produkty (tytul, opis, data_utworzenia, data_modyfikacji, data_wygasniecia, cena_netto, podatek_vat, ilosc_dostepnych, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) 
                VALUES ('$tytul', '$opis', now(), now(), DATE_ADD(now(), interval 2 month), '$cena_netto', '$podatek_vat', '$ilosc_dostepnych', '$status_dostepnosci', '$kategoria', '$gabaryt_produktu', '$zdjecie')";

        global $link;
        mysqli_query($link, $query);
    }

    function updateRecord($id, $tytul, $opis, $cena_netto, $podatek_vat, $ilosc_dostepnych, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie) {
        $query = "UPDATE produkty SET tytul='$tytul', opis='$opis', cena_netto='$cena_netto', podatek_vat='$podatek_vat', 
                ilosc_dostepnych='$ilosc_dostepnych', status_dostepnosci='$status_dostepnosci', kategoria='$kategoria', 
                gabaryt_produktu='$gabaryt_produktu', zdjecie='$zdjecie' WHERE id='$id'";

        global $link;
        mysqli_query($link, $query);
    }

    function deleteRecord($id) {
        $query = "DELETE FROM produkty WHERE id='$id'";

        global $link;
        mysqli_query($link, $query);
    }

    function getAllRecords() {
        $query = 'SELECT * FROM `produkty`';

        global $link;
        $result = mysqli_query($link, $query);

        $records = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $records[] = $row;
        }

        return $records;
    }

    function handlePost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['add'])) {
                $tytul = $_POST['tytul'];
                $opis = $_POST['opis'];
                $cena_netto = $_POST['cena_netto'];
                $podatek_vat = $_POST['podatek_vat'];
                $ilosc_dostepnych = $_POST['ilosc_dostepnych'];
                $status_dostepnosci = $_POST['status_dostepnosci'];
                $kategoria = $_POST['kategoria'];
                $gabaryt_produktu = $_POST['gabaryt_produktu'];
                $zdjecie = $_POST['zdjecie'];

                insertRecord($tytul, $opis, $cena_netto, $podatek_vat, $ilosc_dostepnych, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie);
            } elseif (isset($_POST['delete'])) {
                $idToDelete = $_POST['idToDelete'];

                deleteRecord($idToDelete);
            }
        }
    }

    handlePost();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
</head>
<body>

    <?php
        echo dbg_printCart();
    ?>

    <table style="border: 1px solid black;">
        <tr>
            <th>ID</th>
            <th>Tytuł</th>
            <th>Kategoria</th>
            <th>Zdjęcie</th>
            <th>Link</th>
        </tr>
        <?php
            $allRecords = getAllRecords();
            foreach ($allRecords as $record) {
                global $link;
                echo "<tr>";
                $cat_query = 'SELECT * FROM `kategorie` WHERE id = '.$record['kategoria'];
                $result = mysqli_query($link, $cat_query);
                $cat = mysqli_fetch_assoc($result);
                echo '<td>'.$record['id'].'</td>';
                echo '<td>'.$record['tytul'].'</td>';
                if ($cat == null) {
                    echo '<td>'.$record['kategoria'].'</td>';
                } else {
                    echo '<td>'.$cat['name'].'</td>';
                }
                echo '<td><img style="height:80px; width: 200px;" src='.$record['zdjecie'].'></img></td>';
                echo '<td><a href="showproduct.php?id='.$record['id'].'">Pokaż</a></td>';
                echo '</tr>';
            }
        ?>
    </table>

    <br>
    <br>

    <h2>Dodaj produkt</h2>
    <form method="post">
        <label for="tytul">Tytuł:</label>
        <input type="text" name="tytul" required><br>

        <label for="opis">Opis:</label>
        <textarea name="opis" required></textarea><br>

        <label for="cena_netto">Cena netto:</label>
        <input type="text" name="cena_netto" required><br>

        <label for="podatek_vat">Podatek VAT:</label>
        <input type="text" name="podatek_vat" required><br>

        <label for="ilosc_dostepnych">Ilość dostępnych:</label>
        <input type="text" name="ilosc_dostepnych" required><br>

        <label for="status_dostepnosci">Status dostępności:</label>
        <input type="text" name="status_dostepnosci" required><br>

        <label for="kategoria">Kategoria:</label>
        <input type="text" name="kategoria" required><br>

        <label for="gabaryt_produktu">Gabaryt produktu:</label>
        <input type="text" name="gabaryt_produktu" required><br>

        <label for="zdjecie">Zdjęcie:</label>
        <input type="text" name="zdjecie" required><br>

        <button type="submit" name="add">Dodaj</button>
    </form>

    <h2>Usuń produkt</h2>
    <form method="post">
        <label for="idToDelete">ID produktu:</label>
        <input type="text" name="idToDelete" required><br>

        <button type="submit" name="delete">Usuń</button>
    </form>

</body>
</html>
