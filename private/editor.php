<p class="text_header">Editor</p>
<br>

<p class="text" style="text-align: center;">Tabelle:</p>

<?php
  include "db.php";

  db_connect();
  $result = db_query("SELECT * FROM `telebook`;");
  db_close();

  // Create HTML Table
  echo "<table class='db_table'>";
  echo "<tr>";
  echo "<th class='db_th'>Abteilung</th>";
  echo "<th class='db_th'>Nachname</th>";
  echo "<th class='db_th'>Vorname</th>";
  echo "<th class='db_th'>Nummer</th>";
  echo "</tr>";

  while ($row = $result->fetch_assoc()) {
      echo
          "<tr class='db_tr'>" .
          "<td class='db_td'>" . $row["abteilung"] . "</td>" .
          "<td class='db_td'>" . $row["nachname"] . "</td>" .
          "<td class='db_td'>" . $row["vorname"] . "</td>" .
          "<td class='db_td'>" . $row["nummer"] . "</td>" .
          "</tr>";
  }
  echo "</table>";
?>

</body>
</html>