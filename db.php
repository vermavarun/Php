<?php
$server   = '';
$database = '';
$uid      = '';
$pwd      = '';

# SQL Server authentication
#$cinfo = array(
#    "Database" => $database,
#    "UID" => $uid,
#    "PWD" => $pwd
#);

# Windows authentication
$cinfo = array(
    "Database" => $database
);

$conn = sqlsrv_connect($server, $cinfo);
if ($conn === false) {
    echo "Error (sqlsrv_connect): ".print_r(sqlsrv_errors(), true);
    exit;
} else {
    echo "success <br/>";

    $query = "SELECT * FROM dbo.users";
    $result = sqlsrv_query($conn, $query);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Fetch and display data
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        echo "Name: " . $row['name']  . "<br>";
    }
}

sqlsrv_close($conn);
?>