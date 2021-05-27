<?php

DEFINE("DB_HOST", "localhost");
DEFINE("DB_USER", "root");
DEFINE("DB_PASS", "");
DEFINE("DB_NAME", "movieapp");

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$con) {
    echo "Not connected";
}

$target_dir = "images";

?>