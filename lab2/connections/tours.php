<?php

try {
    $conn = mysqli_connect('localhost', 'admin', 'admin');
} catch (\Throwable $th) {
    echo "The connection was not established.";
    echo mysqli_error($conn);
    exit();
}

$db = 'tours';
try {
    $select_db = mysqli_select_db($conn, $db);
} catch (\Throwable $th) {
    echo "The DB was not selected.";
    echo mysqli_error($conn);
    exit();
}

?>