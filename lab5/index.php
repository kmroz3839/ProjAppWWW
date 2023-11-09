<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="pl" />
        <meta name="kmroz3839" content="Kamil Mróz" />
        <link href="css/mainstyle.css" rel="stylesheet" />
        <title>Komputer moją pasją</title>
        <script lang="javascript" src="js/timedate.js"></script>
        <script lang="javascript" src="js/kolorujtlo.js"></script>
        <script lang="javascript" src="js/jquery-3.7.1.min.js"></script>
    </head>
    <body onload="startclock()">
        <aside id="colorsidebar" style="float: left;">
            Zmień kolor:
            <button onclick="changeBackground('aliceblue')">Domyślny</button>
            <button onclick="changeBackground('#171c30')">Ciemny (niebieski)</button>
            <button onclick="changeBackground('#301717')">Ciemny (czerwony)</button>
            <button onclick="changeBackground('#302417')">Ciemny (brązowy)</button>
        </aside>
        <div id="mainDiv"> 
            <?php
                include 'navbar.html';
            ?>

            <br>

            <?php
                if (array_key_exists('p', $_GET)){
                    if ($_GET['p'] == 1){
                        include 'html/p1.php'
                    }
                } else {
                    include 'html/mainpage.php'
                }
            ?>
        </div>
        
    </body>
</html>
<?php
    $nr_indeksu = '164462';
    $nrGrupy = 'ISI3';

    echo 'Autor: Kamil Mróz '.$nr_indeksu.' grupa '.$nrGrupy.'<br/><br/>';
?>