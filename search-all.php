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
					//after finding the

				?>
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
