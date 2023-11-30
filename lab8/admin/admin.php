<?php

include '../cfg.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    /*echo implode(', ', array_keys($_POST));
    echo '<br>';
    echo '<xmp>';
    echo implode(', ', $_POST);
    echo '</xmp>';

    echo '<br><br>';
    echo implode(', ', array_keys($_SESSION));
    echo '<br>';
    echo implode(', ', $_SESSION);

    echo '<br><br>';
    echo implode(', ', array_keys($_GET));
    echo '<br>';
    echo implode(', ', $_GET);*/

    if (isset($_POST['login_email'])){
        $login_email = $_POST['login_email'];
        $login_pass = $_POST['login_pass'];
        if ($login_email == "admin" && $login_pass == "admin"){
            $_SESSION['adminlogin'] = true;
        }
    }

    if ($_SESSION['adminlogin']) {
        if ($_GET['p'] == "edit"){
            $editquery = 'UPDATE `page_list` SET `page_title` = "'.$_POST["page_title"].'", `page_content` = \''.htmlentities($_POST["page_content"], ENT_HTML5 | ENT_QUOTES | ENT_SUBSTITUTE).'\' WHERE `id` = '.$_GET['editpage'].'  LIMIT 1;';
            //echo $editquery;
            echo "Zastosowano zmiany";
            mysqli_query($GLOBALS['link'], $editquery);
        } elseif ($_GET['p'] == "addsubpage"){
            $insertquery = 'INSERT INTO page_list(page_title, page_content) VALUES (\''.$_POST['page_title'].'\',\''.htmlentities($_POST["page_content"], ENT_HTML5 | ENT_QUOTES | ENT_SUBSTITUTE).'\');';
            echo "Dodano stronę";
            mysqli_query($GLOBALS['link'], $insertquery);
        }
    }
}

function FormularzLogowania() {
    $wynik = '
    <div class="logowanie">
        <h1 class="heading">Panel CMS:</h1>
        <div class="logowanie">
            <form method="post" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
                <table class="logowanie">
                    <tr><td class="log4_t">[email]</td><td><input type="text" name="login_email" class="logowanie" /></td</tr>
                    <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td</tr>
                    <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="Zaloguj" /></td></tr>
                </table>
            </form>
        </div>
    </div>
    ';

    echo $wynik;
}

function EdytujPodstrone($index){

    $query = 'SELECT * FROM `page_list` WHERE id = '.$index.' LIMIT 1';
    $result = mysqli_query($GLOBALS['link'], $query);
    $row = mysqli_fetch_array($result);
    
    $wynik = '
    <div>
        <h1 class="heading">Edytuj podstronę</h1>
        <form method="post" name="SubPageEditForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'&submit=1">
            Tytuł: <input type="text" name="page_title" value="'.$row['page_title'].'"></input>
            <br>
            Zawartość:
            <br>
            <textarea name="page_content">
            '.html_entity_decode($row['page_content'], ENT_HTML5 | ENT_QUOTES | ENT_SUBSTITUTE).'
            </textarea>
            <br>
            <input type="submit" name="edit_submit" value="Edytuj" />
        </form>
    </div>
    ';

    echo $wynik;
}

function DodajPodstrone(){

    //$query = 'SELECT * FROM `page_list` WHERE id = '.$index.' LIMIT 1';
    //$result = mysqli_query($GLOBALS['link'], $query);
    //$row = mysqli_fetch_array($result);
    
    $wynik = '
    <div>
        <h1 class="heading">Dodaj podstronę</h1>
        <form method="post" name="SubPageEditForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'&submit=1">
            Tytuł: <input type="text" name="page_title" value=""></input>
            <br>
            Zawartość:
            <br>
            <textarea name="page_content">
            
            </textarea>
            <br>
            <input type="submit" name="add_submit" value="Dodaj" />
        </form>
    </div>
    ';

    echo $wynik;
}

function UsunPodstrone($index){
    $delquery = 'DELETE FROM `page_list` WHERE `id` = '.$index.' LIMIT 1;';
    mysqli_query($GLOBALS['link'], $delquery);
}

function ListaPodstron(){

    echo '<h2>Lista podstron</h2>';

    $query="SELECT * FROM page_list ORDER BY id";
    $result = mysqli_query($GLOBALS['link'], $query);
    
    while ($row = mysqli_fetch_array($result)){
        echo $row['id'].' '.$row['page_title'].'<a href=admin.php?p=edit&editpage='.$row['id'].'>Edytuj</a> <a href=admin.php?p=delete&page='.$row['id'].'>Usuń</a> <br/>';
    }
    echo '<br>';
    echo '<a href="admin.php?p=addsubpage">Dodaj podstronę</a>';
}
?>

<!DOCTYPE HTML>
<html>
    <head>

    </head>
    <body>
        <?php
            if (!isset($_SESSION['adminlogin']) || !$_SESSION['adminlogin']){
                FormularzLogowania();
            } else {
                include "adminnavbar.html";
                if (array_key_exists('p', $_GET)) {
                    if ($_GET['p'] == "subpagelist"){
                        ListaPodstron();
                    } elseif ($_GET['p'] == "edit"){
                        EdytujPodstrone($_GET['editpage']);
                    } elseif ($_GET['p'] == "addsubpage"){
                        DodajPodstrone();
                    } elseif ($_GET['p'] == "delete") {
                        echo "Usunięto podstronę.";
                        UsunPodstrone($_GET['page']);
                    }
                    else {
                        echo 'Admin start page';
                    }
                } 
            }
        ?>
    </body>
</html>