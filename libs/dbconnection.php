<?php

/** Funktio joka palauttaa yhteyden tietokantaan PDO-oliona. */
function getDbConnection() {
  //Muuttuja, jonka sisältö säilyy getTietokantayhteys-kutsujen välillä.
  static $connection = null; 
  
  //Jos $yhteys on null, pitää se muodostaa.
  if ($connection == null) { 
    //Tämä koodi suoritetaan vain kerran, sillä seuraavilla 
    //funktion suorituskerroilla $yhteys-muuttujassa on sisältöä.
    $connection = new PDO('pgsql:');
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }

  return $connection;
}