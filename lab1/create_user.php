<?php

try {
    $conn = mysqli_connect('localhost', 'root', '');
    echo "The connection was established successfully. <br>";
} catch (\Throwable $th) {
    echo "The connection was not established.";
    echo mysqli_error($conn);
    exit();
}

$query = "
CREATE USER 'admin'@'localhost' IDENTIFIED WITH mysql_native_password BY 'admin';
GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' WITH GRANT OPTION;
";
try {
    $create_db = mysqli_multi_query($conn, $query);
    echo "Admin was created successfully.";
} catch (\Throwable $th) {
    echo "Admin was not created.<br>";
    echo mysqli_error($conn);
}

?>