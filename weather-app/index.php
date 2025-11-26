<?php
include "profile.php";
date_default_timezone_set("Asia/Kolkata"); // 👈 for India Standard Time

// Step 1: Get city from dropdown (default Ahmedabad)
$city = isset($_GET['city']) ? $_GET['city'] : 'Ahmedabad';
$key = 'Add Your API Key Here';

// Step 2: Build the API URL
$url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$key}&units=metric";

// Step 3: Fetch JSON response
$json = file_get_contents($url);

// Step 4: Decode JSON into PHP array
$data = json_decode($json, true);

// Step 5: Extract values safely
$cityName   = $data['name'] ?? 'Unknown';
$country    = $data['sys']['country'] ?? '';
$sunriseRaw = $data['sys']['sunrise'] ?? 0;
$sunsetRaw  = $data['sys']['sunset'] ?? 0;
$temp       = $data['main']['temp'] ?? 0;
$tempMax    = $data['main']['temp_max'] ?? 0;
$tempMin    = $data['main']['temp_min'] ?? 0;
$feelsLike  = $data['main']['feels_like'] ?? 0;
$humidity   = $data['main']['humidity'] ?? 0;
$pressure   = $data['main']['pressure'] ?? 0;
$windSpeed  = $data['wind']['speed'] ?? 0;
$condition  = $data['weather'][0]['description'] ?? '';
$cloudCover = $data['clouds']['all'] ?? 0;
$lon        = $data['coord']['lon'] ?? '';
$lat        = $data['coord']['lat'] ?? '';

// Correct usage: use $data not $weatherData
$iconCode = $data['weather'][0]['icon'] ?? '01d';
$iconUrl  = "http://openweathermap.org/img/wn/{$iconCode}@2x.png";

$sunrise = $sunriseRaw ? date("h:i A", $sunriseRaw) : '';
$sunset  = $sunsetRaw ? date("h:i A", $sunsetRaw) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Weather App Demo 5</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
	<link rel="stylesheet" href="./style.css">
</head>

<body>

	<div class="parent">

		<!-- 1. Header -->
		<div class="box div1">
			<div class="header-left">
				<img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile" class="profile-pic" />
				<div class="greeting-text">
					<p class="username">Hello <?php echo htmlspecialchars($username); ?></p>
					<p class="greeting"><?php echo getGreeting(); ?></p>
				</div>
			</div>

			<div class="header-right">
				<!-- Reset button -->
				<form method="POST" style="margin-top:10px;">
					<button type="submit" name="resetProfile" class="reset-icon">
						<span><i class="fi fi-sr-user-add"></i></span>
					</button>
				</form>

				<!-- light and dark mode -->
				<label class="toggle-switch">
					<input type="checkbox" id="modeToggle" onchange="toggleMode()">
					<span class="slider"></span>
				</label>
			</div>
		</div>

		<!-- 2. Sidebar -->
		<div class="box div2">
			<h3><span class="title-icon"><i class="fi fi-sr-chart-histogram"></i></span> Dashboard</h3>
			<ul>
				<li>Home</li>
				<li>Forecast</li>
				<li>Settings</li>
			</ul>
		</div>

		<!-- 3. Location + Weather Image -->
		<div class="box div3">

			<div class="weather-layout">
				<!-- Left side: dropdown + weather icon stacked vertically -->
				<div class="weather-left">
					<!-- Placeholder for location icon -->
					<h3>
						<span class="title-icon"><i class="fi fi-sr-marker"></i></span> Location
					</h3>

					<!-- City dropdown -->
					<form method="GET" id="cityForm">
						<select id="citySelect" name="city" onchange="document.getElementById('cityForm').submit()">
							<option value="Ahmedabad" <?php if ($city == 'Ahmedabad') echo 'selected'; ?>>Ahmedabad</option>
							<option value="Surat" <?php if ($city == 'Surat') echo 'selected'; ?>>Surat</option>
							<option value="Rajkot" <?php if ($city == 'Rajkot') echo 'selected'; ?>>Rajkot</option>
							<option value="Vadodara" <?php if ($city == 'Vadodara') echo 'selected'; ?>>Vadodara</option>
						</select>
					</form>

					<!-- Weather icon -->
					<div class="weather-icon">
						<img src="<?php echo $iconUrl; ?>" alt="Weather Icon" class="weather-icon">
					</div>
				</div>

				<!-- Right side: day, date, time stacked vertically -->
				<div class="weather-right">
					<p class="day"><span class="label">Day:</span> <span class="value"><?php echo date("l"); ?></span></p>
					<p class="date"><span class="label">Date:</span> <span class="value"><?php echo date("d M Y"); ?></span></p>
					<p class="time"><span class="label">Time:</span> <span class="value"><?php echo date("h:i A"); ?></span></p>
					<p class="sunrise"><span class="label">Sunrise:</span> <span class="value"><?php echo $sunrise; ?></span></p>
					<p class="sunset"><span class="label">Sunset:</span> <span class="value"><?php echo $sunset; ?></span></p>
				</div>
			</div>
		</div>

		<!-- 4. Humidity -->
		<div class="box div4">
			<h3><span class="title-icon"><i class="fi fi-sr-humidity"></i></span> Humidity </h3>
			<ul>
				<li><span class="label">Wind:</span> <span class="value"><?php echo $windSpeed; ?> km/h</span></li>
				<li><span class="label">Pressure:</span> <span class="value"><?php echo $pressure; ?> hPa</span></li>
				<li><span class="label">Humidity:</span> <span class="value"><?php echo $humidity; ?>%</span></li>
				<li><span class="label">Coordinates:</span> <span class="value">Lon <?php echo $lon; ?>, Lat <?php echo $lat; ?></span></li>
			</ul>
		</div>

		<!-- 5. Condition -->
		<div class="box div7">
			<h3><span class="title-icon"><i class="fi fi-sr-smog"></i></span> Condition</h3>
			<p class="condition_description">
				<span class="label">Description:</span> Mostly <span class="value"><?php echo ucfirst($condition); ?> condition according to weather forecast data</span>
			</p>
			<div class="condition_labels">
				<div><span class="label">Cloud Cover:</span> <span class="value"><?php echo $cloudCover; ?>%</span></div>
				<div><span class="label">Country:</span> <span class="value"><?php echo $country; ?></span></div>
			</div>
		</div>

		<!-- 6. Temperature -->
		<div class="box div8">
			<h3>
				<h3>
					<span class="title-icon"><i class="fi fi-sr-temperature-high"></i></span> Temperature
				</h3>
			</h3>
			<ul>
				<li><span class="label">Maximum:</span> <span class="value"><?php echo round($tempMax, 1); ?>°C</span></li>
				<li><span class="label">Minimum:</span> <span class="value"><?php echo round($tempMin, 1); ?>°C</span></li>
				<li><span class="label">Feels Like:</span> <span class="value"><?php echo round($feelsLike, 1); ?>°C</span></li>
				<li><span class="label">Current:</span> <span class="value"><?php echo round($temp, 1); ?>°C</span></li>
			</ul>
		</div>
	</div>

	<script src="script.js"></script>
</body>

</html>