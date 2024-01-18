<?php

class CategoryRenderer {

    public $canedit = false;

    public function RenderujKategorie($id){
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

            $addformpanel = '
            <form method="post">
                <input type="hidden" name="newcat_parent_id" value="'.$row['id'].'">
                <input type="text" placeholder="Nazwa" name="newcat_name">
                <input type="submit" name="btn_newcat_submit" value="Dodaj">
            </form>';
            if (!isset($_GET['edit'])){
                $editpanel = '';
            }
            if (!$this->canedit){
                $addformpanel = '';
            }

            $contenthtml .= 
            '<div>
                <h3><a href="?kat_id='.$row['id'].'">'.$row['name'].' (id '.$row['id'].')</a>
                    '.$editpanel.'
                </h3>
                <div style="margin-left: 30px;">
                    '.$this->RenderujKategorie($row['id']).'
                    '.$addformpanel.'
                </div>
            </div>';
        }
        return $contenthtml;
    }

    public function PokazKategorie(){
        $editlinkpanel = '
            <form method="get">
                <input type="hidden" name="edit" value="1">
                <input type="submit" value="Edytuj">
            </form>
        ';

        $addformpanel = '
        <form method="post">
            <input type="hidden" name="newcat_parent_id" value="0">
            <input type="text" placeholder="Nazwa" name="newcat_name">
            <input type="submit" name="btn_newcat_submit" value="Dodaj">
        </form>';

        if (isset($_GET['edit']) || !$this->canedit){
            $editlinkpanel = '';
        }
        if (!$this->canedit){
            $addformpanel = '';
        }

        return '
        <div>
            '.$editlinkpanel.'
            '.$this->RenderujKategorie(0).'
            '.$addformpanel.'
        </div>';
    }
}
?>