<!DOCTYPE html>
<html>
<head>
<title>Formula 1 Racing - Circuits</title>
	<style>
        body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}
		header {
			font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
			color: #f1f1f1;
            background-color: #e91919;
            padding: 20px;
            text-align: center;
            display: flex;
            align-items: center;
        }
        header img {
            height: 50px;
            margin-right: 20px;
        }
		h1 {
			margin: 0;
		}
		nav {
			background-color: #333;
			color: #fff;
			display: flex;
			justify-content: space-between;
			padding: 10px 20px;
		}
		nav a {
			color: #fff;
			text-decoration: none;
			margin: 0 10px;
			padding: 10px;
			border-radius: 5px;
			transition: background-color 0.2s;
		}
		nav a:hover {
			background-color: #555;
		}
		.container {
			max-width: 800px;
			margin: 20px auto;
			padding: 0 20px;
		}
		.row {
			display: flex;
			flex-wrap: wrap;
			margin: 10px -10px;
		}
		.col {
			flex: 1;
			margin: 10px;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}
		select {
			margin-bottom: 20px;
			padding: 5px;
		}
		table {
			border-collapse: collapse;
			width: 50%;
			margin-top: 50px;
		}
		th, td {
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}
		th {
			background-color: #ccc;
		}
	</style>
</head>
<body>
<header>
		<img src="logo.jpeg" alt="Formula 1 Racing Logo">
		<h1>Formula 1 Racing</h1>
		<p style="font-size:larger"><br> &nbsp Experience the thrill of speed and precision in the world's most advanced racing sport</p>
	
		</header>
	<nav>
		<a href="test.html">Home</a>
		<a href="Drivers.php">Drivers</a>
		<a href="Teams.php">Teams</a>
		<a href="circuits.php">Circuits</a>
		
	</nav>
	<form method="post">
		<label for="driver">Select a driver:</label>
		<select name="driver" id="driver">
			<option value="">--Select a driver--</option>
			<option value="Max Vestappen">Max Vestappen</option>
			<option value="Sebastian Vettel">Sebastian Vettel</option>
			<option value="Lewis Hamilton">Lewis Hamilton</option>
		</select>
		<input type="submit" name="submit" value="Submit">
	</form>
	
	<?php
$serverName = "f1sqlserver.database.windows.net";
$connectionOptions = array(
    "Database" => "f1db",
    "Uid" => "ashish",
    "PWD" => "Kstc@1234"
);

// Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Checks if the connection is established or not
if (!$conn) {
    die("Connection failed: " . sqlsrv_errors());
}
		
		
		if (isset($_POST['submit'])) {
			$driver = $_POST['driver'];
			
			if (!empty($driver)) {
				$sql = "SELECT * FROM drivers WHERE name='$driver'";
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
					echo "<table>";
					echo "<tr><th>Name</th><th>DOB</th><th>Code</th><th>Country</th></tr>";
					
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>".$row["name"]."</td><td>".$row["dob"]."</td><td>".$row["code"]."</td><td>".$row["country"]."</td></tr>";
					}
					
					echo "</table>";
				} else {
					echo "No driver details found for ".$driver;
				}
			} else {
				echo "Please select a driver";
			}
		}
		
		
		mysqli_close($conn);
	?>
	
</body>
</html>
