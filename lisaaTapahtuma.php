<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'pdo/pdo.php';

if ( empty ( $_POST['username'] ) || empty( $_POST['selite'] || empty( $_POST['kohteet'] || empty( $_POST['aika'] || empty( $_POST['theDate'] ) )))) {
  echo "Yo! Something ain't legit!";
  exit;
}else {
	
	$id = $_POST['username'];
	$paiva = $_POST['theDate'];
	$kohde = $_POST['kohteet'];
	$aika = $_POST['aika'];
	$selite = $_POST['selite'];

try {
		$stmt = $pdo->prepare("
		INSERT INTO tapahtumat (tekijaID, paiva, kohde, aika, selite) 
		VALUES 
		(:tekijaID, :paiva, :kohde, :aika, :selite);
		");
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$stmt->execute(
			 array(
					':tekijaID' => $id,
					':paiva' => $paiva, 
					':kohde' => $kohde,
					':aika' => $aika,
					':selite' => $selite
						));
			if ($stmt->execute()) { echo "work"; }
				
	} catch( PDOException $e ) {
		echo $e.'Ei lisätty'; // error message
	}
	
}
?>