<?php

// Connection Data
$hostname = "192.168.245.118";
$username = "root";
$password = "";
$database = "telebook";

// Create Connection
$GLOBALS['1'] = new mysqli(
  $hostname, 
  $username, 
  $password, 
  $database
);

/*
 * FUNCTIONS
 */ 

function db_connect(){
  // Check Connection
  if ( $GLOBALS['1']->connect_error ) {
    return 1;
  }
  return 0;
}

function db_query($str_query) {
  // ONLY FOR QUERYS!
  $sql = $str_query;
  $result = $GLOBALS['1']->query($sql);
  if ($GLOBALS['1']->query($sql) === TRUE){
    echo "Neuer Eintrag erfolgreich erstellt.";
    return $result;
  } else {
    echo "Error: " . $sql . "<br>" . $GLOBALS['1']->error;
    return 1; 
  }
}
 
function db_close() {
  // IMPORTANT: Close the Connection to the server
  $GLOBALS['1']->close();
}

?>