<?php 

require_once ("connections/tours.php");

$user_search = $_GET['userseach'];
echo "Search by word: " . $user_search . "<br><br>";
$user_search = '%'.$user_search.'%';
$query = "SELECT * FROM resorts WHERE `name` LIKE ? OR `description` LIKE ? OR `country` LIKE ?;";
$search_results_resorts = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($search_results_resorts, "sss", $user_search, $user_search, $user_search);
mysqli_stmt_execute($search_results_resorts);
$search_results_resorts = $search_results_resorts->get_result();

echo "Resorts: <br>";
while ($resort = mysqli_fetch_array($search_results_resorts)) {
    echo $resort['id']. "<br>";
    echo "<a href='tours.php?resort=".$resort['id']."'>".$resort['name']. "</a><br>";
    echo $resort['description']. "<br>";
    echo $resort['country']. "<br><br>";
}


$query = "SELECT * FROM tours WHERE `name` LIKE ?";
$search_results_tours = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($search_results_tours, "s", $user_search);
mysqli_stmt_execute($search_results_tours);
$search_results_tours = $search_results_tours->get_result();

echo "Tours: <br>";
while ($tour = mysqli_fetch_array($search_results_tours)) {
    echo "ID: ".$tour['id']. " ";
    echo "Name: ".$tour['name']. " ";
    echo "Price: ".$tour['price']. " ";
    echo "Departure Date: ".$tour['departure_date']. "<br><br>";
}

?>
<a href='resorts.php'>Back</a>