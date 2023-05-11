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
		<a href="index.php">Home</a>
		<a href="drivers.php">Drivers</a>
		
		<a href="circuits.php">Circuits</a>
		
	</nav>
	<form method="post">
		<label for="driver">Select a driver:</label>
		<select name="driver" id="driver">
			<option value="">--Select a driver--</option>
		<?php
    			$serverName = "f1sqlserver.database.windows.net";
    			$connectionOptions = array(
        		"Database" => "f1db",
        		"Uid" => "ashish",
        		"PWD" => "Kstc@1234"
    			);


    			$conn = sqlsrv_connect($serverName, $connectionOptions);

   
    			if (!$conn) {
        		die("Connection failed1: " . print_r(sqlsrv_errors(), true));
    			}


    			$sql = "SELECT driverName FROM [dbo].[driver_page_table]";
    			$stmt = sqlsrv_query($conn, $sql);
    			if ($stmt === false) {
        		die(print_r(sqlsrv_errors(), true));
    			}

 
    			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        			echo '<option value="' . $row['driverName'] . '">' . $row['driverName'] . '</option>';
    			}

   
    			sqlsrv_free_stmt($stmt);
    			sqlsrv_close($conn);
			?>
			
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

	$conn = sqlsrv_connect($serverName, $connectionOptions);

	if (!$conn) {
		die("Connection failed1: " . print_r(sqlsrv_errors(), true));
	}

	if (isset($_POST['submit'])) {
		$driver = $_POST['driver'];

		if (!empty($driver)) {
			$sql = "SELECT * FROM [dbo].[driver_page_table] WHERE name='$driver'";
			$result = sqlsrv_query($conn, $sql);

			if (sqlsrv_has_rows($result)) {
				echo "<table>";
				echo "<tr><th>Driver Name</th><th>DOB</th><th>Driver Code</th><th>Nationality</th></tr>";

				while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
					echo "<tr><td>".$row["driverName"]."</td><td>".$row["dob"]."</td><td>".$row["code"]."</td><td>".$row["nationality"]."</td></tr>";
				}

				echo "</table>";
			} else {
				echo "No driver details found for ".$driver;
			}
		} else {
			echo "Please select a driver";
		}
	}

	sqlsrv_free_stmt($result);
	sqlsrv_close($conn);
?>

	
</body>
</html>
