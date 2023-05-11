<!DOCTYPE html>
<html>
<head>
	<title>Formula 1 Racing - Circuits</title>
	<style>
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-top: 50px;
		}
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
		.card {
			background-color: #f1f1f1;
			padding: 20px;
			border-radius: 5px;
		}
		h2 {
			margin-top: 0;
		}
		.search-container {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}
		.search-box {
			flex: 1;
			padding: 10px;
			border: none;
			border-radius: 5px;
			margin-right: 10px;
		}
		.search-button {
			background-color: #555;
			color: #fff;
			border: none;
			padding: 10px;
			border-radius: 5px;
			cursor: pointer;
		}
		select {
			padding: 10px;
			border: none;
			border-radius: 5px;
			margin-left: 10px;
			cursor: pointer;
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
	<form method="POST">
		<label for="circuits">Select a Circuit:</label>
		<select name="circuits" id="circuits">
			<option value="">-- Select a Circuit --</option>
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
        		die("Connection failed: " . print_r(sqlsrv_errors(), true));
    			}

    // Query database for circuits
    			$sql = "SELECT circuitName FROM [dbo].[circuit_page_table]";
    			$stmt = sqlsrv_query($conn, $sql);
    			if ($stmt === false) {
        		die(print_r(sqlsrv_errors(), true));
    			}

    // Loop through results and create options
    			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        			echo '<option value="' . $row['circuitName'] . '">' . $row['circuitName'] . '</option>';
    			}

    // Close database connection
    			sqlsrv_free_stmt($stmt);
    			sqlsrv_close($conn);
			?>

			
		</select>
		<input type="submit" name="search" value="Search">
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

	
	if (isset($_POST['search'])) {
    $circuitName = $_POST['circuitName'];
    $query = "SELECT * FROM [dbo].[circuit_page_table] WHERE circuitName='$circuitName'";
    $result = sqlsrv_query($conn, $query);
    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($result)) {
        echo '<table>';
        echo '<tr><th>Circuit Name</th><th>Location</th><th>Country</th><th>Fastest Lap</th><th>Driver Name</th><th>Race Year</th></tr>';
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['circuitName'] . '</td>';
            echo '<td>' . $row['location'] . '</td>';
            echo '<td>' . $row['country'] . '</td>';
            echo '<td>' . $row['time'] . '</td>';
            echo '<td>' . $row['driverName'] . '</td>';
            echo '<td>' . $row['raceYear'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No circuits found.';
    }

    sqlsrv_free_stmt($result);
}
sqlsrv_close($conn);
	?>
	<script>
		 searchBtn = document.getElementById('search-btn');
 

functionToExecute() {
	searchResults = document.getElementById('search-results');
  
  searchResults.style.display = 'block';
}

	</script>
</body>
</html>
                
