<?php
include "../config.php";

$package_id = $_GET['package_id'];
$result = $db->query("SELECT image_path FROM package_images WHERE package_id='$package_id'");

$images = [];
while ($row = $result->fetch_assoc()) {
    $images[] = $row;
}

echo json_encode($images);
?>