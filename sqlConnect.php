<?php
$serverName = "U2H"; //serverName\instanceName
$connectionInfo = array( "Database"=>"dbUser", "UID"=>"u2hvnm", "PWD"=>"hungf309");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     //echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>