<?php include 'db.php'; ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mid = $_POST['mid'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $year = $_POST['year'];
    $duration = $_POST['duration'];
    $directors = $_POST['directors'];
    $category = $_POST['category'];
    $image = $_POST['image'];
    // $image_old = $_POST['image_old'];
    
    if (empty($image)) {
        // $image hooson bw l zowhon medeelliig update hiine
        $update_query = "UPDATE `movies` SET `mtitle`='$title',`mdesc`='$desc',`release_year`='$year',`duration`='$duration',`directors`='$directors',`cat_id`='$category' WHERE `mid` = '$mid'";
        
        if (mysqli_query($con, $update_query)) {
            echo json_encode([
                "status" => true,
                "message" => "Update Successfull"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Has Not Been Updated"
            ]);
        }
    } else {
        // $image hooson bish bw l zurag dawhar update hiij bn
        $file_name = rand() . "_" . time() . ".jpg";
        $target_dir = $target_dir . "/" . $file_name;
        $update_query = "UPDATE `movies` SET `mtitle`='$title',`mdesc`='$desc',`release_year`='$year',`duration`='$duration',`directors`='$directors',`cat_id`='$category', `images`= '$file_name' WHERE `mid` = '$mid'";
        
        if (mysqli_query($con, $update_query)) {
            if (file_put_contents($target_dir, base64_decode($image))) {
                // Kinonii huuchin bsn zurgiig ustgaj bn.
                if (file_exists($target_dir . "/" . $image_old)) {
                    unlink($target_dir . "/" . $image_old);
                }
                echo json_encode([
                    "status" => true,
                    "message" => "Update Successfull"
                ]);
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => "Has Not Been Updated"
                ]);
            }
        }
    }
}

?>