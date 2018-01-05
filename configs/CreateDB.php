<?php
namespace Hw3\configs;

require_once('Config.php');

$config = new Config();
$conn = mysqli_connect($config->db_host,$config->db_user,$config->db_pass);
//$host="127.0.0.1";
//$user="root";
//$password="";
//$con= mysqli_connect($host,$user,$password);
if (mysqli_query($conn,"CREATE DATABASE CS174"))
   {
  	 echo "Database created";
   }
	mysqli_query($conn, "use CS174;");

$sql = "CREATE TABLE Story (
identifier INT(255) NOT NULL PRIMARY KEY, 
title VARCHAR(30) NOT NULL,
author VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
writing VARCHAR(5000) NOT NULL,
viewcount INT(255) DEFAULT 0,
tolrating INT(255) DEFAULT 0,
numrating INT(255) DEFAULT 1,
CONSTRAINT U_ID UNIQUE (identifier),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Story created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE Genre (genre VARCHAR(30) NOT NULL);";

if (mysqli_query($conn, $sql)) {
   echo "Table Genre created successfully";
} else {
   echo "Error creating table: " . mysqli_error($conn);
}



$data = array("Drama","Crime", "Fiction","Sci-Fi","Action","Adventure","Educational","Training", "Self-Help","Self-Damage"); 
foreach( $data as $row ) {
    mysqli_query($conn,"INSERT INTO Genre (genre) VALUES ('". $row."');");
    echo "\n";
    echo $row;

}


?>