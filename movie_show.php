<?php include 'db.php'; ?>
<?php

$mid = $_GET['mid'];

$query = "SELECT m.*, c.cname ";
$query .= "FROM movies AS m ";
$query .= "LEFT JOIN category AS c ON m.cat_id = c.cid ";
$query .= "WHERE m.mid = ".$mid;
$query_run = mysqli_query($con, $query);

if ($row = mysqli_fetch_assoc($query_run)) {
    $response[] = $row;
}
echo json_encode($response);

?>