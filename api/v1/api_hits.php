<?php

	include 'config/server.php';

	$Error = false;
	$Errorlog = array();
	$REST_array = array();
	$REST_array['meta'] = array();

	$sql = "UPDATE api_hits SET hits=hits+1";
	$conn->query($sql);	

	$sql = "SELECT * FROM api_hits";
	$api_hits = $conn->query($sql)->fetch_assoc()['hits'];

	if($api_hits) {
		$REST_array['success'] = TRUE;
		$REST_array['data'] = $api_hits;
		$REST_array['meta']['code'] = 200;
		$REST_array['meta']['message'] = "Counts returned successfully";
	} else {
		$REST_array['success'] = FALSE;
		$REST_array['data'] = NULL;
		$REST_array['meta']['code'] = 404;
		$REST_array['meta']['message'] = "Count failed";
	}

	echo json_encode($REST_array);

?>