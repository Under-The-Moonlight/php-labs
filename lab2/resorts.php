<?php 

require_once ("connections/tours.php");

$query = "SELECT * FROM resorts";
$resorts = mysqli_query($conn, $query);


while ($resort = mysqli_fetch_array($resorts)) {
    echo $resort['id']. "<br>";
    echo "<a href='tours.php?resort=".$resort['id']."'>".$resort['name']. "</a><br>";
    echo $resort['description']. "<br>";
    echo $resort['country']. "<br><br>";
}



?>