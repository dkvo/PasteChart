<?php
namespace Hw3\models;
require_once('BaseModel.php');


class landingModel
{
	public $BaseM;
	function __construct()
	{
		$this->BaseM = new BaseModel();
	}

	function getHighestRated(){
		$conn = $this->BaseM->getConn();
		$result = mysqli_query($conn, "SELECT title FROM story ORDER BY 'story.totrating'/'story.numrating' DESC LIMIT 10;");
		
		$highest = Array();
		while ($row = mysqli_fetch_array($result)) 
		{
   			$highest[] =  $row['title'];
   		}

   		echo var_dump($highest);
   		return $highest;
	}
	function getMostViewed(){
		$conn = $this->BaseM->getConn();
		$result = mysqli_query($conn, "SELECT * FROM story ORDER BY viewcount DESC LIMIT 10;");
		$mostViewed = Array();
		while ($row = mysqli_fetch_array($result)) 
		{
   			$mostViewed[] =  "".$row['identifier']."_".$row['title'];
   		}
   		return $mostViewed;
	}
	function getNewest(){
		$conn = $this->BaseM->getConn();
		//assending
		$result = mysqli_query($conn, "SELECT title FROM story ORDER BY reg_date DESC LIMIT 10;");
		$newest = Array();
		while ($row = mysqli_fetch_array($result)) 
		{
   			$newest[] =  $row['title'];

   		}
   		echo var_dump($newest);
   		return $newest;

	}

} 
$lm = new landingModel();
$lm->getMostViewed();

?>