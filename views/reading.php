<?php
namespace Hw3\views;
session_start();

//require_once('../controllers/readingController.php');
//use Hw3\controllers\readingController;
if(!isset($_SESSION['reading'])){
	$_SESSION['readid'] = $_GET['identifier'];
	$_SESSION['readauthor'] = $_GET['title'];
	header('Location: '.'../controllers/readingController.php');
}
unset($_SESSION['reading']);
//echo var_dump($_GET);

//echo var_dump($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Five Thousand Characters <?php echo " - ".$_SESSION['readauthor']; ?></title>
	<link rel="stylesheet" href="/Hw3/styles/styles.css" type="text/css">
	<meta charset="utf-8">
</head>
<body>
	<h1><a href="/Hw3/views/landing.php">Five Thousand Characters</a><?php echo " - ".$_SESSION['readauthor']; ?></h1>

<div >
	<center>author: </center>
	<center>date saved: </center>
	<center>Your rating: </center>
	<center>Average Rating: </center>
</div>

</body>
</html>
<!--The Read A Story View

x - This view is reached when someone clicks on a story link from the landing page. 
x - This view should have as title "Five Thousand Characters - Story Title". 
- Here "Story Title" is the title of the story that the link from the landing page had. 
x - "Five Thousand Characters - Story Title" should also appear at the top of the page in a centered h1-tag, where "Five Thousand Characters" is a link 
	taking one back to the landing page. 
- Beneath this centered in a div tag should appear 
	x- the author, 
	x- and beneath this the date the story was first saved. 
	x- Finally, beneath this there should be the text "Your rating:" followed by the numbers 1 to 5 and then 
	x- "Average Rating:" followed by the current average rating. 
	If the user has already given a rating, the rated number should be in bold face and none of the numbers should be links. 
	If the user has not rated the story, each of these numbers should be links. 
	When a user clicks a rating's link, two columns in a database table row associated with the stories identifier should be adjusted: 
	the SUM_OF_RATINGS_SO_FAR and the NUMBER_OF_RATINGS_SO_FAR. 
	These two values are used to compute the current average rating. 
	To prevent, in a crude way, people from voting multiple times and to decide whether to display rating's links or not, you should store in the current session the identifiers of the stories that the current user has rated.
	Under the ratings info should appear the actual story that was saved. 
	This should appear in a sequence of paragraph tags. 
	New paragraphs should be output whenever the original text that was saved had two consecutive new line characters.-->