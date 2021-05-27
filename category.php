<?php include 'db.php'; ?>
<?php

$query = "SELECT * FROM `category` ORDER BY `cname` ASC";
$query_run = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($query_run)) {
    $response[] = $row;
}
echo json_encode($response);

?>