<?php
    include "../db/dbconfig.php";

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

    function RenderujKategorie($id){
        $query = 'SELECT * FROM `kategorie` WHERE `parent` = '.$id;
        $result = mysqli_query($GLOBALS['link'], $query);
        $contenthtml = '';
        while ($row = mysqli_fetch_array($result)){
            $editpanel = '
            <form method="post">
                <input type="hidden" name="cat_id" value="'.$row['id'].'">
                <input type="submit" name="btn_deletecat_submit" value="Usuń">
                
                <input type="text" name="renamecat_name" value="">
                <input type="submit" name="btn_renamecat_submit" value="Zmień nazwę">
            </form>';
            if (!isset($_GET['edit'])){
                $editpanel = '';
            }

            $contenthtml .= 
            '<div>
                <h3>'.$row['name'].'
                    '.$editpanel.'
                </h3>
                <div style="margin-left: 30px;">
                    '.RenderujKategorie($row['id']).'
                    <form method="post">
                        <input type="hidden" name="newcat_parent_id" value="'.$row['id'].'">
                        <input type="text" placeholder="Nazwa" name="newcat_name">
                        <input type="submit" name="btn_newcat_submit" value="Dodaj">
                    </form>
                </div>
            </div>';
        }
        return $contenthtml;
    }

    function PokazKategorie(){
        $editlinkpanel = '
            <form method="get">
                <input type="hidden" name="edit" value="1">
                <input type="submit" value="Edytuj">
            </form>
        ';
        if (isset($_GET['edit'])){
            $editlinkpanel = '';
        }

        return '
        <div>
            <h1>Kategorie</h1>
            '.$editlinkpanel.'
            '.RenderujKategorie(0).'
            <form method="post">
                <input type="hidden" name="newcat_parent_id" value="0">
                <input type="text" placeholder="Nazwa" name="newcat_name">
                <input type="submit" name="btn_newcat_submit" value="Dodaj">
            </form>
        </div>';
    }

    function UsunKategorie($id){
        echo 'delete called on '.$id.'<br>';
        $queryA = 'SELECT * FROM `kategorie` WHERE `id` = '.$id;
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

    </head>
    <body>
        <?php
            echo PokazKategorie();
        ?>
    </body>
</html>