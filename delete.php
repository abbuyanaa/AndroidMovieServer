<?php include 'db.php'; ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mid = $_POST['mid'];
    $image_old = $_POST['image_old'];

    if (file_exists($target_dir . "/" . $image_old)) {
        unlink($target_dir . "/" . $image_old);
    }

    $query = "DELETE FROM `movies` WHERE `mid` = '$mid'";
    if (mysqli_query($con, $query)) {
        echo json_encode([
            "status" => true,
            "message" => "Delete Successfull"
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "Has Not Been Deleted!"
        ]);
    }
}

?>
