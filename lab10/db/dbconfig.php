<?php

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $baza = 'serwis_sklep';

    $GLOBALS["link"] = mysqli_connect($dbhost, $dbuser, $dbpass);
    if (!$link) echo '<b>brak połączenia z bazą danych</b>';
    if (!mysqli_select_db($link, $baza)) echo 'nie wybrano bazy';

?>