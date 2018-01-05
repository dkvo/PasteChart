<?php 
namespace Hw3\models;
require_once '../configs/Config.php';
use Hw3\configs\config;
class BaseModel { 

	public $conn ;

	function __construct() {
		$config = new Config;
		//print "In BaseClass constructor\n";
		$this->conn = mysqli_connect($config->db_host, $config->db_user, $config->db_pass, "cs174");
	}
	
	function getConn() {

		//print 'connection:'; 
		return $this->conn;
	} 

} 

?> 