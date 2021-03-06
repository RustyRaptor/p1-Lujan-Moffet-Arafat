<?php
require_once('connection.php');
?>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
	<div class="jumbotron">
	<h1>Search results</h1>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">SerialNo</th>
				<th scope="col">Scheduler</th>
				<th scope="col">ModelNo</th>
			</tr>
		</thead>
		<tbody>


			<?php
			$system = $_GET["system"];
			$query = "select * from DigitalDisplay where schedulerSystem='$system';";
			#result isn't getting set properly for some reason
			$result = $conn->query($query) or die(mysqli_error($conn));

			#var_dump($query, $result);
			if ($result->num_rows > 0) {
				while ($r = $result->fetch_assoc()) {
					// Store each one in a variable
					$sn = $r["serialNo"];
					$ss = $r["schedulerSystem"];
					$mn = $r["modelNo"];
					// Insert them into the table
					echo "
			<tr class=\"table-primary\">
							<td>$sn</td>
							<td>$ss</td>
							<td>$mn</td>
			</tr>";
				}
			}
			?>
		</tbody>
	</table>
	</div>
	<div class="alert alert-dismissible alert-info">
		Click back in your browser to return to the main page
	</div>
	<form action="logout.php" method="get">
		<button type="submit" class="btn btn-danger btn-lg">Log Out</button>
	</form>
</body>

</html>