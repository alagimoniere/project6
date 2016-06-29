<?php
	$usrname = 'root'; //username for db
	$pass = ''; //password for db
	$db = new PDO('mysql:host=localhost;dbname=imdb', $usrname, $pass); //create a new db connection
	
	//TODO: finish statement
	$queryStatement = "SELECT id FROM actors WHERE (first_name LIKE " . $_GET['firstname'] . "% OR first_name = " . $_GET['firstname'] . ") AND last_name = " . $_GET['lastname'] . "AND film_count >= all(SELECT film_count FROM actors WHERE (first_name LIKE " . $_GET['firstname'] . "% OR first_name = " . $_GET['firstname'] . ") AND last_name = " . $_GET['lastname'] . ")";

	$id = null;
	//use a for loop to find actor id in database
	foreach($db->query($queryStatement) as $row)
	{
		$id = $row['id'];
	}//foreach

	//if actor is not found in database
	if ($id == null)
		echo "Actor " . $_GET['firstname'] . " " . $_GET['lastname'] . " not found";
?>
