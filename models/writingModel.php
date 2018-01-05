<?php
namespace Hw3\models;
require_once 'BaseModel.php';



class writingModel
{
	public $BaseM;
	function __construct()
	{
		$this->BaseM = new BaseModel();
	}

	function addRow($identifier, $author, $genre, $title, $writing)
	{
		$conn = $this->BaseM->getConn(); 
		if(mysqli_query($conn, "SELECT identifier FROM story WHERE (" . $identifier .");"))
		{
			mysqli_query($conn, "INSERT INTO story (`identifier`, `title`, `author`, `genre`, `writing`) VALUES (\"". $identifier. "\",\"". $title . "\",\"". $author. "\",\"". $genre."\",\"". $writing. "\");");
			return true;
		}
		else
		{
			return false;
		}
	}

	function getRowByIdentifier($id)
	{
		$conn = $this->BaseM->getConn();
		$result = mysqli_query($conn, "SELECT * FROM story WHERE (identifier = ". $id .");");
		//$result = mysqli_query($conn, "SELECT * FROM (story);");
		if($result != null)
		{
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo var_dump($row);
			return $row;
		}
		else
		{
			return "";
		}
	
	}

	function getGenres()
	{
		$conn = $this->BaseM->getConn(); 
		$genres = Array();
		$query = "SELECT genre FROM genre;"; 

		$result = mysqli_query($conn, $query) or die(mysql_error());


   		while ($row = mysqli_fetch_array($result)) {
   			//echo var_dump($row['genre']);
   			$genres[] =  $row['genre'];
		}

		//echo var_dump($genres);
		return $genres;
	}
}
// $wm = new writingModel();
// $wm->getGenres();

?>