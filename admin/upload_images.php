<?php
include "../config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package_id = $_POST['package_id'];

    // Folder to store images
    $uploadDir = "packages/";

    // Ensure the folder exists
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Handling Cover Image
    if (!empty($_FILES['cover_image']['name'])) {
        $coverImage = $_FILES['cover_image'];
        $coverExt = pathinfo($coverImage['name'], PATHINFO_EXTENSION);
        $coverName = "cover_" . uniqid() . "." . $coverExt; // Generate unique name
        $coverPath = $uploadDir . $coverName;

        if (move_uploaded_file($coverImage['tmp_name'], $coverPath)) {
            $conn->query("INSERT INTO package_images (package_id, image_path, is_cover) VALUES ('$package_id', '$coverPath', 1)");
        }
    }

    // Handling Additional Images
    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $imageName = $_FILES['images']['name'][$key];
            $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
            $uniqueName = "image_" . uniqid() . "." . $imageExt; // Generate unique name
            $imagePath = $uploadDir . $uniqueName;

            if (move_uploaded_file($tmp_name, $imagePath)) {
                $conn->query("INSERT INTO package_images (package_id, image_path, is_cover) VALUES ('$package_id', '$imagePath', 0)");
            }
        }
    }

    echo "Images uploaded successfully!";
}



// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $package_id = $_POST['package_id'];

//     // Handle cover image
//     if (!empty($_FILES['cover_image']['name'])) {
//         $cover_image_path = "uploads/" . basename($_FILES['cover_image']['name']);
//         move_uploaded_file($_FILES['cover_image']['tmp_name'], $cover_image_path);
//         $db->query("INSERT INTO package_images (package_id, image_path, is_cover) VALUES ('$package_id', '$cover_image_path', 1)");
//     }

//     // Handle multiple images
//     if (!empty($_FILES['images']['name'][0])) {
//         foreach ($_FILES['images']['name'] as $key => $value) {
//             $image_path = "uploads/" . basename($_FILES['images']['name'][$key]);
//             move_uploaded_file($_FILES['images']['tmp_name'][$key], $image_path);
//             $db->query("INSERT INTO package_images (package_id, image_path, is_cover) VALUES ('$package_id', '$image_path', 0)");
//         }
//     }

//     echo "Images uploaded successfully!";
// }
?>