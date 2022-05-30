<?php
include_once 'db.php';

function get_entire_table() {
  // Server Communication
  db_connect();
  $server_answer = db_query("SELECT * FROM `telebook`");
  db_close();
  
  // Create HTML Table
  echo "<table class='table'>";
  echo "<tr>";
  echo "<th>Abteilung</th>";
  echo "<th>Nachname</th>";
  echo "<th>Vorname</th>";
  echo "<th>Nummer</th>";
  echo "</tr>";

  while ($row = $server_answer->fetch_assoc()) {
    echo 
    "<tr>" . 
    "<td>" . $row["abteilung"] . "</td>" . 
    "<td>" . $row["nachname"]  . "</td>" . 
    "<td>" . $row["vorname"]   . "</td>" . 
    "<td>" . $row["nummer"]    . "</td>" . 
    "</tr>";
  }
  echo "</table>";
}

?>