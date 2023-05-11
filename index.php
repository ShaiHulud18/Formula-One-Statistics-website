<!DOCTYPE html>
<html>
<head>
	<title>Formula 1 Racing</title>
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
		.card {
			background-color: #f1f1f1;
			padding: 20px;
			border-radius: 5px;
		}
		h2 {
			margin-top: 0;
		}
	</style>
</head>
<body>
	<header>
		<img src="logo.jpeg" alt="Formula 1 Racing Logo">
		<h1>Formula 1 Racing</h1>
		<p style="font-size:larger"><br><br> &nbsp Experience the thrill of speed and precision in the world's most advanced racing sport</p>
	
		</header>
	<nav>
		<a href="index.php">Home</a>
		<a href="drivers.php">Drivers</a>
		<a href="circuits.php">Circuits</a>
	</nav>
	<div class="container">
		<h2>Latest Race Results</h2>
		<div class="row">
			<div class="col">
				<div class="card">
					<h2>1. Lewis Hamilton</h2>
					<p>Team: Mercedes</p>
					<p>Time: 1:32:03.897</p>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<h2>2. Max Verstappen</h2>
					<p>Team: Red Bull Racing Honda</p>
					<p>Time: 1:32:07.395</p>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<h2>3. Valtteri Bottas</h2>
					<p>Team: Mercedes</p>
					<p>Time: 1:32:14.356</p>
				</div>
			</div>
		</div>
	</div>
	
</body>
</html>
