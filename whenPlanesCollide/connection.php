<?php

// Make a MySQL Connection
$mysqli = new mysqli('localhost', 'www-data', 'www-datapw', 'teamwaw');
if($mysqli->connect_errno > 0){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){ //RETRIEVE SCORES

	// Select the top 10 scores
	$query = "SELECT * FROM  `HighScores` ORDER BY  `HighScores`.`Score` DESC LIMIT 10";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	// keeps getting the next row until there are no more to get
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		// Print out the contents of each row
		echo $row['Name']."^%:^%".$row['Score']."\n";
		}
	}
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){ //SET HIGHSCORE
	$stmt = $mysqli->prepare('INSERT INTO HighScores (Name, Score, Time) VALUES (?,?,NOW())');
	$stmt->bind_param('si', $_POST['name'], $_POST['score']);
	$stmt->execute();
	$stmt->close();
	echo "ACK";
}
else{
	echo "NEG";
}

mysqli_close($mysqli);
?>
