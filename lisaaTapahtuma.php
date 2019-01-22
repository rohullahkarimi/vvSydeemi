<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'pdo/pdo.php';

if ( empty ( $_POST['name'] ) || empty( $_POST['selite'] ) ) {
  echo "Yo! Something ain't legit!";
  
  exit;
}else {
	
	$selite = $_POST['selite'];
	 echo "Yes!".$selite;
	$id = $_POST['name'];
	 echo "Yes!".$id;
/*
$id = $paiva = $kohde = $aika = $selite = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	
 // $id = test_input($_GET["username"]);
  $paiva = test_input($_GET["paiva"]);
  $kohde = test_input($_GET["kohde"]);
  $aika = test_input($_GET["aika"]);
  $selite = test_input($_GET["selite"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
*/
try {
		$stmt = $pdo->prepare("
		INSERT INTO tapahtumat (tekijaID, selite) 
		VALUES 
		(:tekijaID, :selite);
		");
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->execute(
			 array(
					':tekijaID' => $id,
					':selite' => $selite,
					/*':kohde' => $kohde,
					':aika' => $aika, 
					':selite' => $selite*/
						));
	} catch( PDOException $e ) {
		echo $e.'Ei lisätty'; // error message
	}
}
//header( 'Location: index.html'); 
?>