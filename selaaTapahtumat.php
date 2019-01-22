<?php
require 'pdo/pdo.php';

$myFile = 'tapahtumat.json';

$arr_data = array(); // create empty array
/*
function hello(){
    global $arr_data;
*/

try
		{
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
				//echo $row['kohde'];
				//array_push($_json, $_tapahtuma);
			}

				//$_json2 = array('tapahtumat' => $_json);
				//print json_encode($_json2, JSON_UNESCAPED_UNICODE);

			//Get data from existing json file
			$jsondata = file_get_contents($myFile);

			 // converts json data into array
			$arr_data = json_decode($jsondata, true);

			// Push user data to array
			array_push($arr_data,$tapahtuma);

				//echo $arr_data;

			//Convert updated array to JSON
			$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);


			//write json data into tapahtumat.json file
				if(file_put_contents($myFile,$jsondata)) {
					echo 'Data succefully saved';
				
				}else {
				echo "error"; 
				}
					
} catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
}
//header( 'Location: index.html?paiva='.$paiva);
//}
?>