<?php

	include 'config/server.php';

	$Error = false;
	$Errorlog = array();
	$REST_array = array();
	$REST_array['meta'] = array();
	$words_array = array();
	$q = "";

	if(isset($_GET['q'])) {
		$q = trim($_GET['q']);
		$q = strtoupper($q);
	}

	$sql = "SELECT hits FROM api_hits";
	$api_hits = $conn->query($sql)->fetch_assoc()['hits'];
	$REST_array['api_hits'] = $api_hits;	

	if(!empty($q)) {
		$sql = "SELECT * FROM words WHERE word LIKE '$q%' ORDER BY word ASC";
		$words = $conn->query($sql);
	} 

	if(isset($words)) {
		$REST_array['success'] = TRUE;		
		while($row = $words->fetch_assoc()){
			$REST_array['data'][] = $row;	
			$words_array[] = $row['word'];	

		}
		$REST_array['meta']['code'] = 200;
		$REST_array['meta']['message'] = "Words returned successfully";
	} else {
		$REST_array['success'] = FALSE;
		$REST_array['data'] = NULL;
		$REST_array['meta']['code'] = 404;
		$REST_array['meta']['message'] = "Words not found";
	}

	if($q && strlen($q)>=3) {
		$sql = "SELECT * FROM words WHERE word LIKE '%$q%' ORDER BY word ASC";
		$words = $conn->query($sql);
		if($words) {
			while($row = $words->fetch_assoc()){
				$REST_array['data'][] = $row;		
			}
		}
	}

	echo json_encode($REST_array);

?>