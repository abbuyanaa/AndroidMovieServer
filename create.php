<?php include 'db.php'; ?>
<?php

// images folder bhgui bol shineer uusgene
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $year = $_POST['year'];
    $duration = $_POST['duration'];
    $directors = $_POST['directors'];
    $category = $_POST['category'];
    $image = $_POST['image'];

    $file_name = rand() . "_" . time() . ".jpg";
    $target_dir = $target_dir . "/" . $file_name;

    $query = "INSERT INTO `movies`";
    $query .= "(`mtitle`, `mdesc`, `release_year`, `duration`, `directors`, `cat_id`, `images`, `created_date`) VALUES";
    $query .= "('".$title."','".$desc."','".$year."','".$duration."','".$directors."','".$category."','".$file_name."', NOW())";

    if (mysqli_query($con, $query)) {
        if (file_put_contents($target_dir, base64_decode($image))) {
            echo json_encode([
                "status" => true,
                "message" => "Insert Successfull"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Has Not Been Inserted"
            ]);
        }
    }
}

?>