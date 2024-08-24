<?php
    require_once ('dbaccess.php'); //to retrieve connection details

    $conn = new mysqli($host, $user, $password, $database);
    if ($conn->connect_error) {
        echo "Connection Error: " . $conn->connect_error;
    }
?>