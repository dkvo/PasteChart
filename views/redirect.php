<?php 
session_start();
	echo "title: ".$_SESSION['title'];
	echo "<br>";
	echo "author: ".$_SESSION['author'];
	echo "<br>";
	echo "identifier: ".$_SESSION['identifier'];
	echo "<br>";
	echo "genre: ".$_SESSION['genre'];
	echo "<br>";
	echo "writing: <br>".$_SESSION['writing'];

?>