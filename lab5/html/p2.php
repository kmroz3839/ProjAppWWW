<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="pl" />
        <meta name="kmroz3839" content="Kamil Mróz" />
        <link href="../css/mainstyle.css" rel="stylesheet" />
        <script lang="javascript" src="../js/kolorujtlo.js"></script>
        <script lang="javascript" src="../js/jquery-3.7.1.min.js"></script>
        <title>Komputer moją pasją: Karty graficzne</title>
    </head>
    <body>
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
            <img class="frontImage" src="../img/obrazc3.jpg">

            <div id="mainPadded">
                <div id="mainText">
                <h1>Karty graficzne</h1>
                <div>
                    <div class="intextheader">
                        <img src="../img/obraz4.jpg" class="inlineimg">
                        <h1>NVIDIA FX 5200</h1>
                        <h2>Rok wydania</h2>
                        <br>
                        2003
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ullamcorper eu ligula egestas sodales. Curabitur tellus purus, posuere eu urna et, placerat pulvinar magna. Quisque iaculis tincidunt risus, a varius mi eleifend a. Nam in urna maximus mauris ultrices faucibus iaculis vitae tellus. Integer auctor purus nisl, a ullamcorper ipsum blandit vel.
                    </div>
                </div>
                <br>
                <div>
                    <div class="intextheader">
                        <img src="../img/obraz5.jpg" class="inlineimg">
                        <h1>NVIDIA GTS 250</h1>
                        <h2>Rok wydania</h2>
                        <br>
                        2009
                    </div>
                </div>
                <br>
                <div>
                    <div class="intextheader">
                        <img src="../img/obraz10.jpg" class="inlineimg">
                        <h1>ATI Radeon HD 3850</h1>
                        <h2>Rok wydania</h2>
                        <br>
                        2007
                    </div>
                </div>

                <br>
                <div id="contactInf">
                    <a href="../html/kontakt.html">Kontakt</a>
                </div>
            </div>
        </div>
        
    </body>
</html>