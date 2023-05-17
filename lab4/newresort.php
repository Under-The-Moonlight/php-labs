<?php
    require_once ("connections/tours.php");
    
    if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['country']) ){
        $query = "INSERT INTO resorts (`name`,`description`,`country`) VALUES (?,?,?)";
        $add_resort = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($add_resort, "sss", $_POST['name'],  $_POST['description'], $_POST['country']);
        mysqli_stmt_execute($add_resort);
    }

    
?>

<!DOCTYPE html>
<html>
<body>
    <p>Add new resort:</p>
    <form method="post" id="newresort" name="newresort">
        <input type="text" name="name" placeholder="Name" size="30" maxlength="255" required><br><br>
        <textarea name="description" id="description" placeholder="Description" cols="30" rows="10" required></textarea><br><br>
        <input type="text" name="country" placeholder="Country" size="30" maxlength="255" required><br><br>
        <input type="submit" id="submit" name="submit" value="Submit"><br><br>
    </form>
    <a href='resorts.php'>Back</a>
</body>
</html>