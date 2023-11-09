<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Language" content="pl" />
        <meta name="kmroz3839" content="Kamil Mróz" />
        <link href="../css/mainstyle.css" rel="stylesheet" />
        <script lang="javascript" src="../js/kolorujtlo.js"></script>
        <script lang="javascript" src="../js/jquery-3.7.1.min.js"></script>
        <title>Komputer moją pasją: Procesory</title>
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
            <img class="frontImage" src="../img/obrazc2.jpg">

            <div id="mainPadded">
                <div id="mainText">
                <h1>Procesory</h1>
                <div>
                    <div class="intextheader">
                        <img src="../img/obraz2.jpg" class="inlineimg">
                        <h1>Intel i486</h1>
                        <h2>Rok wydania</h2>
                        <br>
                        1989
                    </div>
                </div>
                <br>
                <div>
                    <div class="intextheader">
                        <img src="../img/obraz3.jpg" class="inlineimg">
                        <h1>AMD K5</h1>
                        <h2>Rok wydania</h2>
                        <br>
                        1996
                    </div>
                </div>
                <br>
                <div>
                    <div class="intextheader">
                        <img src="../img/obraz11.jpg" class="inlineimg">
                        <h1>Intel Pentium 4</h1>
                        <h2>Rok wydania</h2>
                        <br>
                        2004
                    </div>
                </div>
                <br>
                <table class="datatable">
                    <tr class="rowheader">
                        <td>Nazwa</td>
                        <td>Prędkość bazowa</td>
                    </tr>
                    <tr>
                        <td>Intel i486</td>
                        <td>66/33MHz</td>
                    </tr>
                    <tr>
                        <td>AMD K5</td>
                        <td>90MHz</td>
                    </tr>
                    <tr>
                        <td>Intel Pentium 4</td>
                        <td>2.8GHz</td>
                    </tr>

                </table>

                <br>
                <div id="contactInf">
                    <a href="../html/kontakt.html">Kontakt</a>
                </div>
            </div>
        </div>
        
    </body>
</html>