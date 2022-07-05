<!--
  TELEBOOK
  Author: Jamie
  File Description:
  Connector to the database.
-->

<?php

// Connection Data
$hostname = "127.0.0.1";
$username = "sql_admin";
$password = "testpass";
$database = "telebook";
$DEBUG = true;

// Create Connection
// and make the mysql object global 
$GLOBALS['1'] = new mysqli(
    $hostname,
    $username,
    $password,
    $database,
);

// Debug Mode
$GLOBALS['2'] = $DEBUG = true;

/* Functions */ 
function DEBUG($some_string, $status)
{
    if ($GLOBALS['2']) 
    {
        if ($status) 
        {
            // Good News
            echo "<p class='debug_success'>DEBUG: " . $some_string . "</p>";
        } 
        else 
        {
            // Bad News
            echo "<p class='debug_fail'>DEBUG: " . $some_string . "</p>";
        }
    } 
    else 
    {
        return 0;
    }
};

function db_connect()
{
    // Check Connection
    if ($GLOBALS['1']->connect_error) 
    {
        DEBUG("CONN_ERROR: NOT CONNECTED TO SERVER.", false);
        echo "CONN_ERROR: Verbindung zum Server konnte nicht hergestellt werden.";
        return "CONN_ERROR";
    }
    DEBUG("CONN_SUCCESS: CONNECTION ESTABLISHED.", true);
    return 0;
}

function db_query($str_query)
{
    $sql = $str_query;
    $result = $GLOBALS['1']->query($sql);
    if ($GLOBALS['1']->query($sql) == true) 
    {
        DEBUG("QUERY_SUCCESS", true);
        return $result;
    } 
    else 
    {
        DEBUG("QUERY_ERROR. SQL_QUERY: " . $sql, false);
        echo "Die Anfrage ist fehlgeschlagen.";
        return 1;
    }
}

function db_close()
{
    DEBUG("CONN_CLOSE: CONNECTION CLOSED.", true);
    // IMPORTANT: Close the Connection to the server
    $GLOBALS['1']->close();
}
