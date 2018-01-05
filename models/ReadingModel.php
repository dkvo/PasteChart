<?php
class ReadingModel
{
   public $BaseM;
	function __construct()
	{
		$this->BaseM = new BaseModel();
	}
  function getData($identifier){
    $conn = $this->BaseM->getConn();
    result = mysqli_query($conn, "SELECT * FROME story WHERE identifer = ". $identifier);
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
  function updateTotRatingAndNumrating($totrating, $identifier) {
    $conn = $this->BaseM->getConn();
    mysqli_query($conn, "UPDATE story SET numrating = numrating + 1 WHERE identifer = ". $identifier);
    mysqli_query($conn, "UPDATE story SET totrating = totrating  + ".$totrating." WHERE identifer = ". $identifier);
  }
}
?>