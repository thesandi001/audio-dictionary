<?php

	include 'config/server.php';

	$Error = false;
	$Errorlog = array();
	$REST_array = array();
	$REST_array['meta'] = array();

	if(isset($_GET['char'])) {
		$char = trim($_GET['char']);
	} else {
		$char = 'A';
	}

	$sql = "UPDATE api_hits SET hits=hits+1";
	$conn->query($sql);	

	$sql = "SELECT * FROM api_hits";
	$api_hits = $conn->query($sql)->fetch_assoc()['hits'];

	$sql = "SELECT * FROM words WHERE word LIKE '$char%' ORDER BY word ASC";
	$words = $conn->query($sql);

	if($words) {
		$REST_array['success'] = TRUE;
		$REST_array['api_hits'] = $api_hits;
		while($row = $words->fetch_assoc()){
			$REST_array['data'][] = $row;		
		}
		$REST_array['meta']['code'] = 200;
		$REST_array['meta']['message'] = "Words returned successfully";
	} else {
		$REST_array['success'] = FALSE;
		$REST_array['data'] = NULL;
		$REST_array['meta']['code'] = 404;
		$REST_array['meta']['message'] = "Words not found";
	}

	echo json_encode($REST_array);

?>