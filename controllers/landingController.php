<?php
namespace Hw3\controllers;
require_once('../models/landingModel.php');

use Hw3\models\landingModel;

session_start();
//echo var_dump($_POST);
$lc = new landingController();
$lc->searchForHigestRated($_POST['genres'], $_POST['phrase']);
$lc->searchForMostViewed();
$lc->searchForNewest();
if(!isset($_SESSION['list'])){
	$_SESSION['list']= true;
}
header('Location: '.'../views/landing.php');

class landingController
{

	public $landingM;
	function __construct()
	{
		$this->landingM = new landingModel();
	}

	function searchForHigestRated()
	{
		$_SESSION['highestRatedArray'] = $this->landingM->getHighestRated();
	}

	function searchForMostViewed()
	{
		$_SESSION['mostViewedArray'] = $this->landingM->getMostViewed();

	}

	function searchForNewest()
	{
		$_SESSION['newestArray'] = $this->landingM->getNewest();
	}
}