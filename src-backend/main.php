<?php
// color
$red="\e[0;31m";
$green="\e[0;32m";
$reset="\e[m";

// Install php-mysqli

$hostname = "127.0.0.1";
$username = "sql_admin";
$password = "eBlZrkUgK(6f2o1t";
$database = "telebook";

// Create Connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check Connection
if ( $conn->connect_error ) {
  die("$red Verbindung fehlgeschlagen! $reset Error: " . $conn->connect_error . "\n");
}
echo "$green Verbindung zum Server '$hostname' hergestellt.$reset\n";

// QUERY
$sql = "SELECT * FROM `telebook` WHERE vorname='Jürn'; ";
$result = $conn->query($sql);

// Format Result
if ( $result->num_rows > 0 ) {
  //output data of each row
  while( $row = $result->fetch_assoc()) {
    echo "\nVorname:\t "   . $row["vorname"]. 
         "\nNachname:\t "  . $row["nachname"].
         "\nAbteilung:\t " . $row["abteilung"].
         "\nTelefon:\t "   . $row["nummer"];
  }
} else 

echo "\n"

?>