<?php

// Connection Data
$hostname = "127.0.0.1";
$username = "sql_admin";
$password = "eBlZrkUgK(6f2o1t";
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
  // QUERY
  $sql = $str_query;
  $result = $GLOBALS['1']->query($sql);
  return $result;
}
 
function db_close() {
  // IMPORTANT: Close the Connection to the server
  $GLOBALS['1']->close();
}

?>