<?php
include "connection.php";
$city = $_POST['city'];
$data = json_decode($_POST['data'], true); 
$timestamp = date('Y-m-d H:i:s', $data['dt']);
$temperature = $data['main']['temp'];
$pressure = $data['main']['pressure'];
$humidity = $data['main']['humidity'];
$weatherCondition = $data['weather'][0]['description'];
$weatherIcon = $data['weather'][0]['icon']; 
$windSpeed = $data['wind']['speed'];
$query = "INSERT INTO weather_history (city, timestamp, temperature, pressure, humidity, weather_condition, weather_icon, wind_speed) 
          VALUES ('$city', '$timestamp', '$temperature', '$pressure', '$humidity', '$weatherCondition', '$weatherIcon', '$windSpeed')";
if (mysqli_query($conn, $query)) {
    echo "Data saved to database!";
} else {
    echo "Error saving data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
