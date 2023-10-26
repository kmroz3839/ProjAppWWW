<?php
  $nr_indeksu = '164462';
  $nrGrupy = 'ISI3';

  echo 'Kamil Mróz '.$nr_indeksu.' grupa '.$nrGrupy.'<br>';
  echo 'Zastosowanie metody include() <br>';

  if (array_key_exists('name', $_GET)){
    echo $_GET["name"];
  }
  if (array_key_exists('a', $_GET)){
    for ($i = 0; $i < intval($_GET['a']); $i++){
      echo $i."<br>";
    }
  }
  

  include 'lib.php';
?>