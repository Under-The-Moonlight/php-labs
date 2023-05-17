<?php

try {
    $conn = mysqli_connect('localhost', 'admin', 'admin');
    echo "The connection was established successfully. <br>";
} catch (\Throwable $th) {
    echo "The connection was not established.";
    echo mysqli_error($conn);
    exit();
}

$db = 'galery';
try {
    $select_db = mysqli_select_db($conn, $db);
    echo "The DB was selected successfully. <br>";
} catch (\Throwable $th) {
    echo "The DB was not selected.";
    echo mysqli_error($conn);
    exit();
}

$query = "
CREATE TABLE `tours` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `price` DECIMAL(6,2) NOT NULL,
    `date_of_post` DATE NOT NULL,
    `resort_id` INT NOT NULL,
    PRIMARY KEY (`id`));";
try {
    $create_db = mysqli_multi_query($conn, $query);
    echo "Table was created successfully.";
} catch (\Throwable $th) {
    echo "Table was not created.<br>";
    echo mysqli_error($conn);
}

?>