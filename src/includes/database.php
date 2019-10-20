<?php
    $server = "";
    $username = "root";
    $password = "Sinergija@97";

    $connection = new mysqli($server, $username, $password);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connection_error);
    }

    
?>
