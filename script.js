const apiKey = '970f18e756e70143f6bb1bfbf8c6a24a';
const daysToKeepInDatabase = 7;
fetchWeatherData("Sheffield")

function fetchWeatherData(city) {
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${apiKey}`;
    
    if (!navigator.onLine) {
        alert("No internet connection!");
        return;
    }
    fetch(url)
        .then((response) => {
            if (!response.ok) { 
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            const timestamp = data.dt;
            const date = new Date(timestamp * 1000);
            document.getElementById("city_name").innerHTML = data.name + ', ' + data.sys.country  + ' ' + `<img src="http://openweathermap.org/img/wn/${data.weather[0].icon}.png"><br>`;
            document.getElementById("date_value").innerHTML = date;
            document.getElementById("weather_condition_value").innerHTML = data.weather[0].description;
            document.getElementById("temperature_value").innerHTML = data.main.temp;
            document.getElementById("pressure_value").innerHTML = data.main.pressure;
            document.getElementById("wind_speed_value").innerHTML = data.wind.speed;
            document.getElementById("humidity_value").innerHTML = data.main.humidity;
            senddata(city, data);
            localStorage.setItem(city, JSON.stringify(data));
        })
        .catch(error => {
            console.log('Fetch Error:', error);
            alert(`Error: ${error.message}`);
        });
}

function senddata(city, data) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "post.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };
    const requestData = `city=${encodeURIComponent(city)}&data=${encodeURIComponent(JSON.stringify(data))}`;
    xhr.send(requestData);
}

function search() {
    const city = document.getElementById("searchInput").value;
    const storedData = localStorage.getItem(city);

    if (storedData) {
        displayWeatherData(JSON.parse(storedData), "Local Storage");
    } else {
        fetchWeatherDataFromDatabase(city);
    }
}

async function fetchWeatherDataFromDatabase(city) {
    try {
        const response = await fetch(`fetch_data_from_database.php?city=${encodeURIComponent(city)}`);
        const data = await response.json();
        
        if (data) {
            displayWeatherData(data, "Database");
        } else {
            if (!navigator.onLine) {
                alert("No internet connection!");
            } else {
                fetchWeatherData(city);
            }
        }
    } catch (error) {
        console.log('Fetch Error:', error);
        if (!navigator.onLine) {
            alert("No internet connection!");
        } else {
            alert(`Error: ${error.message}`);
        }
    }
}

function displayWeatherData(data, source) {
    console.log(`Data source: ${source}`);
    console.log(data);
    const timestamp = data.dt;
    const date = new Date(timestamp * 1000);
    
    document.getElementById("city_name").innerHTML = data.name + ', ' + data.sys.country  + ' ' + `<img src="http://openweathermap.org/img/wn/${data.weather[0].icon}.png"><br>`;
    document.getElementById("date_value").innerHTML = date;
    document.getElementById("weather_condition_value").innerHTML = data.weather[0].description;
    document.getElementById("temperature_value").innerHTML = data.main.temp;
    document.getElementById("pressure_value").innerHTML = data.main.pressure;
    document.getElementById("wind_speed_value").innerHTML = data.wind.speed;
    document.getElementById("humidity_value").innerHTML = data.main.humidity;
}

function redirectToDataPage() {
    window.location.href = "weather_history.php";
}


document.getElementById("searchInput").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        search();
    }
});
