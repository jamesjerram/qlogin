<!DOCTYPE html>
<html>
	<body>
		<?php
			ini_set('display_errors', 1); error_reporting(E_ALL);
			$configPath = 'config/config.txt';
			if (!file_exists($configPath)) {
				die('Database configuration file not found.');
			}
			$credentials = fopen($configPath, 'r') or die("Unable to access database configuration.");
			$dbhost = trim(fgets($credentials));
			$dbname = trim(fgets($credentials));
			$dbuser = trim(fgets($credentials));
			$dbpassword = trim(fgets($credentials));
			fclose($credentials);
			$conn = mysqli_connect($dbhost , $dbuser, $dbpassword, $dbname);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			$makeTable = "CREATE TABLE Users ( name VARCHAR(30) PRIMARY KEY, password VARCHAR(80) NOT NULL, email VARCHAR(50) NOT NULL, status VARCHAR(10))";
			if ($conn -> query($makeTable)){
				echo "User table created successfully";
			}
			else{
				echo "Creation of user table failed";
			}
			$makeTable = "CREATE TABLE IPLog ( name VARCHAR(30), ip VARCHAR(16))";
			if ($conn -> query($makeTable)){
				echo "IPLog table created successfully";
			}
			else{
				echo "Creation of IPLog table failed";
			}
			$conn->close();
		?>
	</body>
</html>