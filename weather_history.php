<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather History</title>
    <link rel="stylesheet" href="weather_history_style.css">

</head>
<body>
    <div class="weather-background"></div>
    <h1>WeatherPedia</h1>
    <div class="search-box" id="search-form">
        <button id="button" onclick="redirectToMainPage()">Main Page</button>
    </div>

    <div class="container">
        <div class="rectangle">
            <h2>Weather History</h2>
            <table class="weather-history-table">
                <tr>
                    <th>City</th>
                    <th>Timestamp</th>
                    <th>Temperature</th>
                    <th>Pressure</th>
                    <th>Humidity</th>
                    <th>Weather Condition</th>
                    <th>Wind Speed</th>
                </tr>
                <?php
                $query = "SELECT * FROM weather_history";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['city'] . "</td>";
                    echo "<td>" . $row['timestamp'] . "</td>";
                    echo "<td>" . $row['temperature'] . "</td>";
                    echo "<td>" . $row['pressure'] . "</td>";
                    echo "<td>" . $row['humidity'] . "</td>";
                    echo "<td>" . $row['weather_condition'] . "</td>";
                    echo "<td>" . $row['wind_speed'] . "</td>";
                    echo "</tr>";
                }

                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2023 WeatherPedia & Darwin Paudel. All rights reserved.</p>
    </footer>
    <script>
        function redirectToMainPage() {
            window.location.href = "index.php";
        }
    </script>
</body>
</html>
