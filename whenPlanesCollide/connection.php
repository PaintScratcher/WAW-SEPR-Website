<?php

// Make a MySQL Connection
mysql_connect("localhost", "www-data", "www-datapw") or die(mysql_error());
mysql_select_db("teamwaw") or die(mysql_error());

// Get all the data from the "example" table
$result = mysql_query("SELECT * FROM  `HighScores` ORDER BY  `HighScores`.`Score` DESC LIMIT 10") or die(mysql_error());  

// keeps getting the next row until there are no more to get
while($row = mysql_fetch_array( $result )) {
	// Print out the contents of each row into a table
	echo $row['Name'].":".$row['Score']."\n";
} 
?>
