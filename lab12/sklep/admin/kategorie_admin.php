<?php
    include "../db/dbconfig.php";

    include "kategorie_admin_f.php";

    $catRenderer = new CategoryRenderer();
    $catRenderer->canedit = true;

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['btn_newcat_submit'])){
            $query = 'INSERT INTO kategorie(id,parent, name) VALUES (NULL, '.$_POST['newcat_parent_id'].', "'.$_POST['newcat_name'].'")';
            $result = mysqli_query($GLOBALS['link'], $query);
        } elseif (isset($_POST['btn_deletecat_submit'])){
            $query = 'DELETE FROM `kategorie` WHERE `id` = '.$_POST['cat_id'].' LIMIT 1';
            $result = mysqli_query($GLOBALS['link'], $query);
        } elseif (isset($_POST['btn_renamecat_submit'])) {
            $query = 'UPDATE `kategorie` SET `name` = "'.$_POST['renamecat_name'].'" WHERE `id` = '.$_POST['cat_id'].' LIMIT 1';
            $result = mysqli_query($GLOBALS['link'], $query);
        }
    }

    function UsunKategorie($id){
        echo 'delete called on '.$id.'<br>';
        $query = 'SELECT * FROM `kategorie` WHERE `id` = '.$id;
        $resA = mysqli_fetch_array(mysqli_query($GLOBALS['link'], $query));
        
        mysqli_query($GLOBALS['link'], 'DELETE FROM `kategorie` WHERE `id` = '.$resA['id']);
    
        $other = mysqli_query($GLOBALS['link'], 'SELECT * FROM `kategorie` WHERE `parent` = '.$resA['id']);
        while ($row = mysqli_fetch_array($other)) {
            UsunKategorie($row['id']);
        }
    }

?>

<html>
    <head>
        <link rel="stylesheet" href="../css/showproduct.css"></link>
    </head>
    <body>
        <h1>Kategorie</h1>
        <?php
            echo $catRenderer->PokazKategorie();
        ?>
    </body>
</html>