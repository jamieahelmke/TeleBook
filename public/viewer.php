<!--
  TELEBOOK
  Author: Jamie
  File Description:
  After logging in, this is the editor for editing the db.
-->

<p class="text_header">Datenbank-Viewer</p>
<br>



<?php
  if ($_SESSION["successful_login"] == false)
  {
    echo "
        <script>
          setTimeout(function(){
            window.location.href = 'login.php';
          }, 3000);

          var timeleft = 2;
          var downloadTimer = setInterval(function(){
            if(timeleft <= 1){
              clearInterval(downloadTimer);
            }
            document.getElementById('redirect').innerHTML = ['Zurück in ', timeleft, '...'].join('');
            timeleft -= 1;
          }, 1000);
        </script>
        <div id='login_error'><span class='material-symbols-outlined'>
        error
        </span>
        <p>Passwort oder Username inkorrekt.</p></div>
        <p id='redirect'>Etwas ist schief gelaufen (Session ungültig).</p>";
  } 
  else 
  {
    include "../private/db.php";

    // Datenbank 
    db_connect();
    $result = db_query("SELECT * FROM `telebook`;");
    db_close();

    // Button: Eintrag in die DB Hinzufügen
    echo "
    <form action='actions/add.php' method=POST>
      <button type='submit'>
    </form>
    ";

  
    // Kreiren der Tabelle
    echo "<table class='db_table'>";
    echo "<tr>";
    echo "<th class='db_th comment'>ID</th>";
    echo "<th class='db_th'>Abteilung</th>";
    echo "<th class='db_th'>Nachname</th>";
    echo "<th class='db_th'>Vorname</th>";
    echo "<th class='db_th'>Nummer</th>";
    echo "<th></th>";
    echo "</tr>";
  
    $counter = 1;

    // Rekursives Drucken der Tabelle
    while ($row = $result->fetch_assoc()) 
    {
        $counter = $counter + 1;
        echo
            "<tr class='db_tr'>" .
            "<td class='comment'>" . $row["id"]       . "</td>" .
            "<td class='db_td'>" . $row["abteilung"] . "</td>" .
            "<td class='db_td'>" . $row["nachname"] . "</td>" .
            "<td class='db_td'>" . $row["vorname"] . "</td>" .
            "<td class='db_td'>" . $row["nummer"] . "</td>" .
            //"<td><button type='submit' onclick='delete(" . $row["id"] . ")'>Del</button></td>" .
            "<td>
              <form action='./actions/edit.php' method='POST'>
                <input  type='hidden' id='id' name='id' value='" . $row['id'] . "'>
                <button type='submit'>Edit</button>
              </form>
            </td>" .
            "</tr>";
    }
    echo "</table>"; 
  }

  
?>



</body>
</html>