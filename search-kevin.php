<!DOCTYPE html>
<html>
	<head>
		<title>My Movie Database (MyMDb)</title>
		<meta charset="utf-8" />

		<!-- Link to your CSS file that you should edit -->
		<link href="css/bacon.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="frame">
			<div id="banner">
				<a href="index.php"><img src="img/mymdb.png" alt="banner logo" /></a>
				My Movie Database
			</div>

			<div id="main">
				<h1>Results for <?php echo $_GET['firstname'] . " " . $_GET['lastname']; ?></h1>
			</div> <!-- end of #main div -->

			<!-- display table of results using php and database manipulation -->
			<table>
				<tr>
					<td class="index">#</td>
					<td class="title">Title</td>
					<td class="year">Year</td>
				</tr>
				<!-- now use php and sql to populate the table -->
				<?php
					include('common.php');

					$baconSqlStmnt = "SELECT id FROM actors WHERE first_name = 'Kevin' AND last_name = 'Bacon'";

					//go through db and find which id matches kevin bacons using the sql statement above
					foreach ($db->query($baconSqlStmnt) as $row)
					{
						$baconID = $row['id']; //grab kevin bacon's ID
					}//forEach

					echo "Bacon's id = " . $baconID . "<br>"; //for testing purposes

					$mtchstmnt = "SELECT m.name, m.year FROM movies m JOIN roles r1 ON r1.movie_id = m.id JOIN actors a1 ON r1.actor_id = a1.id JOIN roles r2 ON r2.movie_id = m.id JOIN actors a2 ON r2.actor_id = a2.id "; //select elements and join tables
		            $mtchstmnt.= "WHERE ((r1.actor_id='".$baconID."') AND (r2.actor_id='".$id."') AND (r1.movie_id = r2.movie_id))"; //add constrictions
		            $mtchstmnt.= "ORDER BY m.year DESC, m.name ASC"; //order the tables
		            $i = 1;
					//Prints every movie result
		            foreach($db->query($mtchstmnt) as $rows)
		            {
		                echo "<tr><td class=\"index\">" . $i . "</td>";
		                echo "<td class=\"title\">" . $rows['name'] . "</td>";
		                echo "<td class=\"year\">" . $rows['year'] . "</td></tr>";
		                $i++;
		            }//foreach


					$db = null; //Close db connection -- maybe find a more secure way to close the connection
				?><!-- END PHP -->
			</table>


			<!-- ask for info again for another search -->
			<!-- form to search for every movie by a given actor -->
			<form action="search-all.php" method="get">
				<fieldset>
					<legend>All movies</legend>
					<div>
						<input name="firstname" type="text" size="12" placeholder="first name" autofocus="autofocus" /> 
						<input name="lastname" type="text" size="12" placeholder="last name" /> 
						<input type="submit" value="go" />
					</div>
				</fieldset>
			</form>

			<!-- form to search for movies where a given actor was with Kevin Bacon -->
			<form action="search-kevin.php" method="get">
				<fieldset>
					<legend>Movies with Kevin Bacon</legend>
					<div>
						<input name="firstname" type="text" size="12" placeholder="first name" /> 
						<input name="lastname" type="text" size="12" placeholder="last name" /> 
						<input type="submit" value="go" />
					</div>
				</fieldset>
			</form>
		
		</div> <!-- end of #frame div -->
	</body>
</html>
