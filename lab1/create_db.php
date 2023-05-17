<?php

try {
    $conn = mysqli_connect('localhost', 'root', '');
    echo "The connection was established successfully. <br>";
} catch (\Throwable $th) {
    echo "The connection was not established.";
    echo mysqli_error($conn);
    exit();
}

$db = "galery";
$query = "CREATE DATABASE $db";
try {
    $create_db = mysqli_query($conn, $query);
    echo "The DB was created successfully.";
} catch (\Throwable $th) {
    echo "The DB was not created.";
    echo mysqli_error($conn);
}

?>