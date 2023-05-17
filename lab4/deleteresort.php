<?php
    require_once ("connections/tours.php");
    
    if(isset($_POST['delete']) ){

        $query = "DELETE FROM tours WHERE resort_id = ?";
        $delete_resort = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($delete_resort, "i", $_GET['resort']);
        mysqli_stmt_execute($delete_resort);

        $query = "DELETE FROM resorts WHERE id = ?";
        $delete_resort = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($delete_resort, "i", $_GET['resort']);
        mysqli_stmt_execute($delete_resort);
    }

    $query = "SELECT * FROM resorts WHERE id=?";
    $resort = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($resort, "i", $_GET['resort']);
    mysqli_stmt_execute($resort);
    $resort = $resort->get_result();

    if($resort->num_rows === 0){
        header('Location: resorts.php');
    }
    $resort = mysqli_fetch_array($resort);

    
?>

<!DOCTYPE html>
<html>
<body>
    <p>Delete resort:</p>
    <p>Name: <?= $resort['name']?></p>
    <p>Description: <?= $resort['description']?></p>
    <p>Country: <?= $resort['country']?></p>
    <form method="post" id="deleteresort" name="deleteresort">
        <input type="submit" id="delete" name="delete" value="Delete"><br><br>
    </form>
    <a href='tours.php?resort=<?= $_GET['resort']?>'>Back</a>
</body>
</html>