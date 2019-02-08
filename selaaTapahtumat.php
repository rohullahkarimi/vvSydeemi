<?php
session_start();  
require 'pdo/pdo.php';

$json = array(); // create empty array
	try{
		$stmt = $pdo->query("SELECT * FROM tapahtumat");
		// output data of each row 
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC))  {
				
			$tapahtuma = array('id' => $row['id'],
				'tekijaID' => $row['tekijaID'],
				'paiva' => $row['paiva'],
				'kohde' => $row['kohde'],
				'aika' => $row['aika'],
				'selite' => $row['selite'],
			);
			array_push($json, $tapahtuma); 
		}
		$_json2 = array('tapahtumat' => $json);
		 print json_encode($_json2, JSON_UNESCAPED_UNICODE); 	
	} catch (Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
?>