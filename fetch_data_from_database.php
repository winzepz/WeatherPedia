<?php
include "connection.php";

$city = $_GET['city'];
$query = "SELECT * FROM weather_history WHERE city='$city' ORDER BY timestamp DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $data = array(
        "name" => $row['city'],
        "sys" => array("country" => ""),
        "dt" => strtotime($row['timestamp']),
        "weather" => array(array("description" => $row['weather_condition'], "icon" => $row['weather_icon'])),
        "main" => array(
            "temp" => $row['temperature'],
            "pressure" => $row['pressure'],
            "humidity" => $row['humidity']
        ),
        "wind" => array("speed" => $row['wind_speed'])
    );
    echo json_encode($data);
} else {
    echo json_encode(null);
}

mysqli_close($conn);
?>
