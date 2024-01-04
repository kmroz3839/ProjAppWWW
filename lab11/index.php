<?php
    // Include database configuration
    include 'db/dbconfig.php';

    // Function to insert a new record
    function insertRecord($tytul, $opis, $cena_netto, $podatek_vat, $ilosc_dostepnych, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie) {
        $query = "INSERT INTO produkty (tytul, opis, data_utworzenia, data_modyfikacji, data_wygasniecia, cena_netto, podatek_vat, ilosc_dostepnych, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) 
                VALUES ('$tytul', '$opis', now(), now(), DATE_ADD(now(), interval 2 month), '$cena_netto', '$podatek_vat', '$ilosc_dostepnych', '$status_dostepnosci', '$kategoria', '$gabaryt_produktu', '$zdjecie')";

        global $link;
        mysqli_query($link, $query);
    }

    // Function to update a record
    function updateRecord($id, $tytul, $opis, $cena_netto, $podatek_vat, $ilosc_dostepnych, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie) {
        $query = "UPDATE produkty SET tytul='$tytul', opis='$opis', cena_netto='$cena_netto', podatek_vat='$podatek_vat', 
                ilosc_dostepnych='$ilosc_dostepnych', status_dostepnosci='$status_dostepnosci', kategoria='$kategoria', 
                gabaryt_produktu='$gabaryt_produktu', zdjecie='$zdjecie' WHERE id='$id'";

        global $link;
        mysqli_query($link, $query);
    }

    // Function to delete a record
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

    function handlePostRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['add'])) {
                // Add new entry
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

                // Redirect or perform other actions after adding
                exit();
            } elseif (isset($_POST['delete'])) {
                // Delete entry by ID
                $idToDelete = $_POST['idToDelete'];

                deleteRecord($idToDelete);

                // Redirect or perform other actions after deleting
                header('Location: your_page.php');
                exit();
            }
        }
    }

// Call the function to handle the POST request
handlePostRequest();

    // Handle form submissions or other actions here

    // Example: Insert a new record
    // insertRecord('Example Title', 'Example Description', 100.00, 0.23, 50, 1, 1, 2, 'example.jpg');

    // Example: Update a record
    // updateRecord(1, 'Updated Title', 'Updated Description', 150.00, 0.23, 75, 1, 2, 3, 'updated.jpg');

    // Example: Delete a record
    // deleteRecord(1);

    // Example: Get all records
    // $allRecords = getAllRecords();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
</head>
<body>

    <!-- Display records in an HTML table -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Creation Date</th>
            <th>Modification Date</th>
            <th>Expiration Date</th>
            <th>Net Price</th>
            <th>VAT</th>
            <th>Available Quantity</th>
            <th>Availability Status</th>
            <th>Category</th>
            <th>Product Size</th>
            <th>Image</th>
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
                echo '<td>'.$record['opis'].'</td>';
                echo '<td>'.$record['data_utworzenia'].'</td>';
                echo '<td>'.$record['data_modyfikacji'].'</td>';
                echo '<td>'.$record['data_wygasniecia'].'</td>';
                echo '<td>'.$record['cena_netto'].'</td>';
                echo '<td>'.$record['podatek_vat'].'</td>';
                echo '<td>'.$record['ilosc_dostepnych'].'</td>';
                echo '<td>'.$record['status_dostepnosci'].'</td>';
                if ($cat == null) {
                    echo '<td>'.$record['kategoria'].'</td>';
                } else {
                    echo '<td>'.$cat['name'].'</td>';
                }
                echo '<td>'.$record['gabaryt_produktu'].'</td>';
                echo '<td><img style="height:80px; width: 200px;" src='.$record['zdjecie'].'></img></td>';
                echo '</tr>';
            }
        ?>
    </table>

    <br>
    <br>

    <h2>Add Entry</h2>
    <form method="post">
        <label for="tytul">Title:</label>
        <input type="text" name="tytul" required><br>

        <label for="opis">Description:</label>
        <textarea name="opis" required></textarea><br>

        <label for="cena_netto">Net Price:</label>
        <input type="text" name="cena_netto" required><br>

        <label for="podatek_vat">VAT:</label>
        <input type="text" name="podatek_vat" required><br>

        <label for="ilosc_dostepnych">Available Quantity:</label>
        <input type="text" name="ilosc_dostepnych" required><br>

        <label for="status_dostepnosci">Availability Status:</label>
        <input type="text" name="status_dostepnosci" required><br>

        <label for="kategoria">Category:</label>
        <input type="text" name="kategoria" required><br>

        <label for="gabaryt_produktu">Product Size:</label>
        <input type="text" name="gabaryt_produktu" required><br>

        <label for="zdjecie">Image:</label>
        <input type="text" name="zdjecie" required><br>

        <button type="submit" name="add">Add Entry</button>
    </form>

    <h2>Delete Entry</h2>
    <form method="post">
        <label for="idToDelete">ID to Delete:</label>
        <input type="text" name="idToDelete" required><br>

        <button type="submit" name="delete">Delete Entry</button>
    </form>

</body>
</html>
