<?php
namespace Hw3\controllers;
require_once ('../models/BaseModel.php');

use Hw3\models\BaseModel;
session_start();
if(!isset($_SESSION['reading'] ))
{
	$rc = new readingController();
	$result = Array();
	$result = $rc->getRowByIdentifier($_SESSION['readid']);
	$_SESSION['readinfo'] = $result;
	$_SESSION['reading'] = false;
	header('Location: '.'../views/reading.php');
}

class readingController
{
	public $BaseM;
	function __construct(){
		$this->BaseM = new BaseModel();
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


}

?>