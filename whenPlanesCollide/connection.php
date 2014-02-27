<?php

// Make a MySQL Connection
$db = new mysqli('localhost', 'www-data', 'www-datapw', 'teamwaw');
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET'){ //RETRIEVE SCORES

	// Select the top 10 scores
	$query = "SELECT * FROM  `HighScores` ORDER BY  `HighScores`.`Score` DESC LIMIT 10";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_array( $result )) {
		// Print out the contents of each row
		echo $row['Name'].":".$row['Score']."\n";
	} 
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){ //SET HIGHSCORE
	
}
else{
	echo "Oops, something went wrong!";
}

?>
