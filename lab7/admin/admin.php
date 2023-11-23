<?php

include '../cfg.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    if (session_unset()){
        session_start();
    }
    $login_email = $_POST['login_email'];
    $login_pass = $_POST['login_pass'];
    if ($login_email == "admin" && $login_pass == "admin"){
        $_SESSION['adminlogin'] = true;
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
            '.$row['page_content'].'
            </textarea>
            <br>
            <input type="submit" name="edit_submit" value="Edytuj" />
        </form>
    </div>
    ';

    echo $wynik;
}

function ListaPodstron(){

    echo '<h2>Lista podstron</h2>';

    $query="SELECT * FROM page_list ORDER BY id";
    $result = mysqli_query($GLOBALS['link'], $query);
    
    while ($row = mysqli_fetch_array($result)){
        echo $row['id'].' '.$row['page_title'].'<a href=admin.php?p=edit&editpage='.$row['id'].'>Edytuj</a> <br/>';
    }
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
                    }
                    else {
                        echo 'Admin start page';
                    }
                } 
            }
        ?>
    </body>
</html>