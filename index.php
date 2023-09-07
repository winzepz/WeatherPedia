<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="weather-background"></div>
    <h1>WeatherPedia</h1>
    <div class="search-box" id="search-form">
        <input type="text" id="searchInput" placeholder="Search City">
        <button id="button" onclick="search()">Search</button>
        <button id="historyButton" onclick="redirectToDataPage()">History</button>
    </div>
    
    <div class="container">
        <div class="rectangle">
            <h2 id="city_name"></h2>
            <div id="date_and_weather_condtion">
                <span id="weather_condition_value"></span>
            </div>
            <div class="weather-info">
                <div class="weather-item">
                    <div class="weather-property">Temperature:</div><br><img class="pressure image" src="img/pressure.png" alt="pressure icon"><br>
                    <div id="temperature_value"></div>
                </div>
                <div class="weather-item">
                    <div class="weather-property">Pressure:</div><br><img class="pressure image" src="img/pressure.png" alt="pressure icon"><br>
                    <div id="pressure_value"></div>
                </div>
                <div class="weather-item">
                    <div class="weather-property">Wind Speed:</div><br><img class="wind image" src="img/wind-speed.png" alt="pressure icon"><br>
                    <div id="wind_speed_value"></div>
                </div>
                <div class="weather-item">
                    <div class="weather-property">Humidity:</div><br><img class="humidity image" src="img/humidity.png" alt="pressure icon"><br>
                    <div id="humidity_value"></div>
                </div>
            </div>
            <br><div class="date" id="date_value"></div>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2023 WeatherPedia & Darwin Paudel. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
