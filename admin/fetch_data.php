<?php
include './../config.php';

$city = $_GET['city'];
$hotels = $db->query("SELECT id,name FROM hotels WHERE city='$city'");
$flights = $db->query("SELECT id,airline FROM flights WHERE departure_airport='$city'");
$cabs = $db->query("SELECT id,cab_name FROM cabs WHERE city='$city'");

$response = [
    "hotels" => "<select class='form-control' name='hotel_id'>" . implode("", array_map(fn($row) => "<option value='" . $row['id'] . "'>{$row['name']}</option>", $hotels->fetch_all(MYSQLI_ASSOC))) . "</select>",
    "flights" => "<select class='form-control' name='flight_id'>" . implode("", array_map(fn($row) => "<option value='" . $row['id'] . "'>{$row['airline']}</option>", $flights->fetch_all(MYSQLI_ASSOC))) . "</select>",
    "cabs" => "<select class='form-control' name='cab_id'>" . implode("", array_map(fn($row) => "<option value='" . $row['id'] . "'>{$row['cab_name']}</option>", $cabs->fetch_all(MYSQLI_ASSOC))) . "</select>",
];

echo json_encode($response);


// $city = $_GET['city'];

// function fetchOptions($query, $db) {
//     $result = $db->query($query);
//     $options = "<option>Select one option</option>";

//     if ($result->num_rows > 0) {
//         while ($row = $result->fetch_assoc()) {
//             $options .= "<option>{$row['name']}</option>";
//         }
//     } else {
//         $options .= "<option>No value available</option>";
//     }

//     return $options;
// }

// $hotels = fetchOptions("SELECT name FROM hotels WHERE city='$city'", $db);
// $flights = fetchOptions("SELECT airline FROM flights WHERE departure_airport='$city'", $db);
// $cabs = fetchOptions("SELECT cab_name FROM cabs WHERE city='$city'", $db);

// $response = [
//     "hotels" => "<select class='form-control'>{$hotels}</select>",
//     "flights" => "<select class='form-control'>{$flights}</select>",
//     "cabs" => "<select class='form-control'>{$cabs}</select>",
// ];

// echo json_encode($response);

?>