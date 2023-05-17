<?php
    require_once ("connections/tours.php");
    
    if(isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['country']) ){
        $query = "UPDATE resorts SET `name` = ?, `description` = ?, `country` = ? WHERE id = ?";
        $update_resort = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($update_resort, "sssi", $_POST['name'],  $_POST['description'], $_POST['country'], $_GET['resort']);
        mysqli_stmt_execute($update_resort);
    }

    $query = "SELECT * FROM resorts WHERE id=?";
    $resort = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($resort, "i", $_GET['resort']);
    mysqli_stmt_execute($resort);
    $resort = $resort->get_result();

    if($resort->num_rows === 0){
        header('Location: tours.php?resort=' . $_GET['resort']);
    }
    $resort = mysqli_fetch_array($resort);

    
?>

<!DOCTYPE html>
<html>
<body>
    <p>Update resort:</p>
    <form method="post" id="updateresort" name="updateresort">
        <input type="text" name="name" placeholder="Name" size="30" maxlength="255" value="<?= $resort['name'] ?>" required><br><br>
        <textarea name="description" id="description" placeholder="Description" cols="30" rows="10" required><?= $resort['description'] ?></textarea><br><br>
        <input type="text" name="country" placeholder="Country" size="30" maxlength="255" value="<?= $resort['country'] ?>" required><br><br>
        <input type="submit" id="submit" name="submit" value="Submit"><br><br>
    </form>
    <a href='tours.php?resort=<?= $_GET['resort']?>'>Back</a>
</body>
</html>