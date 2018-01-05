<?php
namespace Hw3\controllers;
require_once ('../models/writingModel.php');

use Hw3\models\writingModel;

session_start();
//echo $_SESSION['landing'];

if($_SESSION['landing'] == true)
{
	$temp = new writingController();
	$temp->getGenreArray();
	$_SESSION['landing'] = false;
	//echo var_dump($temp);
	header('Location: '.'../views/landing.php');
}else{
	$temp = new writingController();
	$temp->test();
}

class writingController
{
	public $WritingM;
	function __construct(){
		$this->WritingM = new writingModel();
	}
	function test()
	{
		if(isset($_POST['author']))
		{
			if(isset($_POST['reset']) and !empty($_POST['reset'])){
			$this->resetValues();
			}else if(isset($_POST['identifier']) and !empty($_POST['identifier']) and 
			isset($_POST['author']) and !empty($_POST['author']) and 
			isset($_POST['title']) and !empty($_POST['title']) and 
			isset($_POST['writing']) and !empty($_POST['writing']))
			{
				$this->insertValues();
			}else if(!empty($_POST['identifier']) and empty($_POST['author']) 
				and  empty($_POST['title']) and empty($_POST['writing']))
			{
				$this->onlyIdentifier();
			}
			else
			{
				$_SESSION['error'] = true;
				header('Location: '.'../views/writing.php');
			}
		}
		else
		{
			$this->getGenreArray();
		}
		
	}

	function insertValues(){
		//$identifier, $author, $genre, $title, $writing)
		$this->WritingM->addRow($_POST['identifier'],$_POST['author'],$_POST['genres'],$_POST['title'],$_POST['writing']);
		$_SESSION['redirect'] = true;
		$this->onlyIdentifier();
		//echo var_dump($_POST);

		header('Location: '.'../views/writing.php');
	}

	function onlyIdentifier(){
		$row = $this->WritingM->getRowByIdentifier($_POST['identifier']);
		
		//echo var_dump($_POST);
		$_SESSION['identifier'] = $row['identifier'];
		$_SESSION['author'] = $row['author'];
		$_SESSION['title'] = $row['title'];
		$_SESSION['genre'] = $row['genre'];
		$_SESSION['writing'] = $row['writing'];
		$_SESSION['redirect'] = true;
		echo "<br><br>";
		//echo var_dump($_SESSION);
		header('Location: '.'../views/writing.php');
	}
	function resetValues(){
		$_SESSION['redirect'] = false;
		header('Location: '.'../views/writing.php');
	}

	function getGenreArray(){

		$_SESSION['genreArray'] = $this->WritingM->getGenres();
		//echo var_dump($_SESSION['genreArray']);
		
	}
}


?>