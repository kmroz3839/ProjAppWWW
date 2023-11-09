<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="pl" />
        <meta name="kmroz3839" content="Kamil Mróz" />
        <link href="../css/mainstyle.css" rel="stylesheet" />
        <script lang="javascript" src="../js/kolorujtlo.js"></script>
        <script lang="javascript" src="../js/jquery-3.7.1.min.js"></script>
        <title>Komputer moją pasją: Karty muzyczne</title>
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
            <img class="frontImage" src="../img/obrazc4.jpg">

            <div id="mainPadded">
                <div id="mainText">
                <h1>Karty muzyczne</h1>
                <div>
                    <div class="intextheader">
                        <img src="../img/obraz6.webp" class="inlineimg">
                        <h1>ESS Maestro 2E</h1>
                        <h2>Rok wydania</h2>
                        <br>
                        2002
                    </div>
                </div>
                <br>
                <div>
                    <div class="intextheader">
                        <img src="../img/obraz7.jpg" class="inlineimg">
                        <h1>Roland SCC-1</h1>
                        <h2>Rok wydania</h2>
                        <br>
                        1991
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