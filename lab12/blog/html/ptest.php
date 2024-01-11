<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="pl" />
        <meta name="kmroz3839" content="Kamil Mróz" />
        <link href="../css/mainstyle.css" rel="stylesheet" />
        <script lang="javascript" src="../js/kolorujtlo.js"></script>
        <script lang="javascript" src="../js/jquery-3.7.1.min.js"></script>
        <script lang="javascript" src="../js/animscript.js"></script>
        <title>Komputer moją pasją: Karty graficzne</title>
    </head>
    <body onload="load()">
        <aside id="colorsidebar" style="float: left;">
            Zmień kolor:
            <button onclick="changeBackground('aliceblue')">Domyślny</button>
            <button onclick="changeBackground('#171c30')">Ciemny (niebieski)</button>
            <button onclick="changeBackground('#301717')">Ciemny (czerwony)</button>
            <button onclick="changeBackground('#302417')">Ciemny (brązowy)</button>
        </aside>
        <div id="mainDiv"> 
            <?php
                include '../subnavbar.html';
            ?>
            <br>
            <div id="mainPadded">
                <h1>Strona testowa</h1>
                <div id="mainText">
                    Test
                    <div id="animtest1" class="testblock" style="height: 50px; background-color: green;">
                        Kliknij
                    </div>
                    <br>       
                    <div id="animtest2" class="testblock" style="height: 50px; background-color: green;">
                        Najedź kursorem
                    </div>
                    <br>
                    <div id="animtest3" class="testblock" style="height: 50px; background-color: green;">
                        Kliknij
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>