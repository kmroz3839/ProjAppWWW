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
                    $pIndex = $_GET['p'];
                    if ($pIndex == 1){
                        include 'html/p1.html';
                    }
                    elseif ($pIndex == 2){
                        include 'html/p2.html';
                    } 
                    elseif ($pIndex == 3){
                        include 'html/p3.html';
                    }
                    elseif ($pIndex == 4){
                        include 'html/p4.html';
                    }
                    elseif ($pIndex == 5){
                        include 'html/p5.html';
                    }
                } else {
                    include 'html/mainpage.html';
                }

                include 'subcontactinf.html';
            ?>
        </div>
        
    </body>
</html>
<?php
    $nr_indeksu = '164462';
    $nrGrupy = 'ISI3';

    echo 'Autor: Kamil Mróz '.$nr_indeksu.' grupa '.$nrGrupy.'<br/><br/>';
?>