<?php 
  session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Five Thousand Characters - Write Something</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/Hw3/styles/styles.css" type="text/css">
</head>
<body>
	<?php

	$title ='';
	$author ='';
	$identifier='';
	$genres='';
	$writing='';

	if(isset($_SESSION['error'])){
		if($_SESSION['error'] == true){
			echo "Fill in all Values or search by identifier";
			unset($_SESSION['error']);
		}
	}
	if (isset($_SESSION['redirect']) and !empty($_SESSION['redirect'])){
		if($_SESSION['redirect'] == true){
		$title = $_SESSION['title'];
		$author = $_SESSION['author'];
		$identifier = $_SESSION['identifier'];
		$genres = $_SESSION['genre'];
		$writing = $_SESSION['writing'];

		}

	}
	?>

	<h1><a href="/Hw3/views/landing.php">Five Thousand Characters</a> - Write Something</h1>
	<form action="../controllers/writingController.php" method="post">
		<!-- ========================= Text fields -->
		Title : <input type="text" name="title" value="<?php echo $title;?>"><br>
		Author : <input type="text" name="author" value="<?php echo $author;?>"><br>
		Identifier : <input type="text" name="identifier" value="<?php echo $identifier;?>"><br>
		<!-- ========================= Dropdown for the Genre selections -->
		Genre : <select name="genres">
		<option value="all">All Genres</option>
		<?php

			$genre = $_SESSION['genreArray'];
			$i = 0;
			//echo var_dump($genre);
			while( $i < count($genre) )
			{
				$temp = '';
				if($_SESSION['genre'] == $genre[$i] and strcmp($genres,$temp) )
				{
					
						?><option selected = "selected" value="<?php echo $genre[$i]; ?>"><?php echo $genre[$i]; ?></option><?php
						$i++;
				}
				else
				{
					?><option value="<?php echo $genre[$i]; ?>"><?php echo $genre[$i]; ?></option><?php
					$i++;
				}
			}
			
			?>
			
			<!--=====================================Add genres to the dropdown===========================-->
		</select><br>
		your writing : 
		<br> <textarea rows="4" cols="50" maxlength="5000" name="writing" ><?php echo $writing ;?></textarea><br>
		<input name="reset" type="submit" class="button" value="Reset">
		<input name="Save" type="submit" class="button" value="Save">
	</form>

</body>
</html>
