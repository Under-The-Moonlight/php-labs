<?php 

require_once ("connections/tours.php");

$query = "SELECT * FROM tours WHERE resort_id=?";
$tours = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($tours, "i", $_GET['resort']);
mysqli_stmt_execute($tours);
$tours = $tours->get_result();

if($tours->num_rows === 0){
    echo "There are no tours for this resort.";
}
while ($tour = mysqli_fetch_array($tours)) {
    echo "ID: ".$tour['id']. " ";
    echo "Name: ".$tour['name']. " ";
    echo "Price: ".$tour['price']. " ";
    echo "Departure Date: ".$tour['departure_date']. "<br>";
}

?>
<br><br>
<a href='editresort.php?resort=<?= $_GET['resort'] ?>'>Edit Resort</a>
<br><br>
<a href='deleteresort.php?resort=<?= $_GET['resort'] ?>'>Delete Resort</a>
<br><br>
<a href='resorts.php'>Back</a>