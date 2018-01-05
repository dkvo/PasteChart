<?php
namespace Hw3\views;
	session_start();
	if(!isset($_SESSION['list'])){
		header('Location: '.'../controllers/landingController.php');
	}
	// echo var_dump($_SESSION);
	// $genre = $_SESSION['genreArray'];

			//echo "<br>";
			//echo var_dump($_SESSION['genreArray']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Five Thousand Characters</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/Hw3/styles/styles.css" type="text/css">
</head>
<body>
<h1>Five Thousand Characters</h1>
<a href="/Hw3/views/writing.php">Write Something!</a><br>
Check out what people are writing...
<br>
<br>
	<form action="../controllers/landingController.php" method="post">
		Phrase Filter:<br>
		<input type="text" name="phrase" placeholder="Phrase Filter"><br>
		Genre Select:<br>
		<?php
		if(!isset($_SESSION['landing'])){
			$_SESSION['landing'] = true;
			header('Location: '.'../controllers/writingController.php');
		}
			//==========================================get values from genre table.======================
		?>
		<select name="genres">
		<option selected="selected" value="all">All Genres</option>
		<?php

			$genre = $_SESSION['genreArray'];
			$i = 0;
			//echo var_dump($genre);
			while( $i < count($genre) )
			{
				?><option value="<?php echo $genre[$i]; ?>"><?php echo $genre[$i]; ?></option><?php
				$i++;
			}
			
			?>
			
			<!--=====================================Add genres to the dropdown===========================-->
		</select>
		<input type="submit" value="Go">
	</form>
	<!--===========================================Three h3 tags with ordered list =======================-->
		<h3>Highest Rated</h3>
			<ol>
				<?php
				$title = $_SESSION['highestRatedArray'];
				for($i=0; $i<count($title);$i++)
				{
					echo "<li>"; 
					
					echo "<a href=/Hw3/views/reading.php?title=".urlencode($title[$i]).">".$title[$i]."</a>";
					
					echo "</li>";
				}
				?>
			</ol>
		<h3>Most Viewed</h3>
			<ol>
				<?php
				//echo var_dump($_SESSION['mostViewedArray']);

				$title = $_SESSION['mostViewedArray'];
				for($i=0; $i<count($title);$i++)
				{
					$values= split("_", $title[$i]);

					echo "<li>";
					echo "<a href=/Hw3/views/reading.php?title=".urlencode($values[1])."&identifier=".urlencode($values[0]).">".$values[1]."</a>";
					echo "</li>";
				}
				?>
			</ol>

		<h3>Newest</h3>
			<ol>
				<?php
				$title = $_SESSION['newestArray'];
				for($i=0; $i<count($title);$i++)
				{
					echo "<li>";
					echo "<a href=/Hw3/views/reading.php?title=".urlencode($title[$i]).">".$title[$i]."</a>";
					echo "</li>";
				}
				?>
			</ol>

</body>
</html>

<!--
The Landing View

x- The landing page should have centered at its top in an h1 tag, "Five Thousand Characters". This should also be the title of the page.
x- Beneath this there should be a link: Write Something! that takes one to the Write Something view. 
x- Under this link, it should say: Check out what people are writing...
x- There should be a form
  	x- consisting of a text field with placeholder Phrase Filter,
  	- a dropdown populated from a database table of genres with the default genre being "All Genres",
  	x- and a Go button. 
 x- Beneath this should be three, h3-titled ordered lists: Highest Rated, Most Viewed, and Newest.
 	- Each ordered list should have the top ten items from the database tables for story ordered according to the respective domain,
 		- i.e., either rating,
 		- views, or 
 		- submission date. 
 		- A list item in the list should consist of: 
 			- a link to the story view page 
 				- presenting that story with link text -> the title of the story. 
===========================================Filtering======================================================
		- The form mentioned above should have method control how the three top ten lists are filtered. 
		- Initially, it is blank and "All Genres" is chosen, so no filtering is done. 
		- However, if the Phrase Filter has some non-empty value, 
			- then only stories containing that value in the title should be considered for the top ten list. 
		- Similarly, if genre is set to something other than "All Genres", 
			- then the top ten lists are restricted to just that genres. 

======================================Example of Filtering=================================================
		- As an example, suppose the Phrase Filter was "Cute Puppies" and the genre was Crime. 
			- Then the top ten lists items would be: 
				- the Highest Rated stories with title containing "Cute Puppies" in the Crime genre, 
				- the Most Viewed stories with title containing "Cute Puppies" in the Crime genre, 
				- and the Newest stories with title containing "Cute Puppies" in the Crime genre. 

========================================Session Handling===================================================
		- so that if a user comes back the values are set to what they had the last time they visited the site.
			- You should store the current value of the Phrase Filter 
			- and Genre in a session,  
		Your program should clean any data sent from the form. 
-->