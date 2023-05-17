<?php 

require_once ("connections/tours.php");

$query = "SELECT COUNT(id) as count_resorts FROM resorts";
$count_resorts = mysqli_query($conn, $query);
$count_resorts = mysqli_fetch_array($count_resorts);

$query = "SELECT COUNT(id) as count_tours FROM tours";
$count_tours = mysqli_query($conn, $query);
$count_tours = mysqli_fetch_array($count_tours);

$query = "SELECT COUNT(id) as count_tours_this_month FROM tours WHERE MONTH(departure_date)=" . date('n');
$count_tours_this_month = mysqli_query($conn, $query);
$count_tours_this_month = mysqli_fetch_array($count_tours_this_month);

$query = "SELECT `id`, `name` FROM resorts ORDER BY id DESC LIMIT 1";
$last_resort_added = mysqli_query($conn, $query);
$last_resort_added = mysqli_fetch_array($last_resort_added);

$query = "SELECT resorts.id, resorts.name FROM tours, resorts  
WHERE tours.resort_id=resorts.id  
GROUP BY resorts.id  
ORDER BY COUNT(tours.id) DESC LIMIT 0,1";
$resort_with_most_tours = mysqli_query($conn, $query);
$resort_with_most_tours = mysqli_fetch_array($resort_with_most_tours);

echo "Resorts count: " . $count_resorts['count_resorts'] . "<br>";
echo "Tours count: " . $count_tours['count_tours'] . "<br>";
echo "Tours with departure date this month: " . $count_tours_this_month['count_tours_this_month'] . "<br>";
echo "Last resort added: <a href='tours.php?resort=".$last_resort_added['id']."'>" . $last_resort_added['name'] . "</a><br>";
echo "Resort with most tours: <a href='tours.php?resort=".$resort_with_most_tours['id']."'>" . $resort_with_most_tours['name'] . "</a><br>";

?>
<br><br>
<a href='resorts.php'>Back</a>