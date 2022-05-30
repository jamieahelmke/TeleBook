<?php 
include_once "db.php";
include_once "read.php";

// Parse POST arguments
if ( isset( $_POST['passwort'] ) )  { $passwort = $_POST['passwort']; }   else { echo "Passwort Fehlt, "; }
if ( isset( $_POST['abteilung'] ) ) { $abteilung = $_POST['abteilung']; } else { echo "Abteilung Fehlt, "; }
if ( isset( $_POST['vorname'] ) )   { $vorname = $_POST['vorname']; }     else { echo "Vorname Fehlt, "; }
if ( isset( $_POST['nachname'] ) )  { $nachname = $_POST['nachname']; }   else { echo "Nachname Fehlt, "; }
if ( isset( $_POST['nummer'] ) )    { $nummer = $_POST['nummer']; }       else { echo "Nummer Fehlt, "; }
$action = $_POST['action'];

db_connect();
if ( $action == "add" ) {

  db_query("INSERT INTO `telebook` VALUES ($abteilung, $nachname, $vorname, $nummer;");

} else if ($action == "edit") {

  db_query("UPDATE `telebook` 
  SET abteilung=$abteilung, nachname=$nachname, vorname=$vorname
  WHERE nummer=$nummer;");
  
} else if ($action == "delete") {

  db_query("DELETE FROM `telebook` WHERE nummer=$nummer; ");
}

db_close();

get_entire_table();

?>

