<?php

	include 'config/server.php';

	$Error = false;
	$Errorlog = array();
	$REST_array = array();
	$REST_array['meta'] = array();

	$word = "";
	$description = "";
	$audio_url = "";

	if(!empty($_GET['word'])) {
		$word = $_GET['word'];
	} else {
		$Error = true;
	}

	if(!empty($_GET['description'])) {
		$description = $_GET['description'];
	} else {
		$Error = true;
	}

	if(!empty($_GET['audio_url'])) {
		$audio_url = $_GET['audio_url'];
	}

	$sql = "SELECT * FROM words WHERE word LIKE '$word' LIMIT 1";
	$count = $conn->query($sql)->num_rows;	

	if(!$count && !$Error) {
		$sql = "INSERT INTO words (word,description,audio_url) VALUES ('$word','$description','$audio_url')";
		$success = $conn->query($sql);
	}
	
	if($success) {
		$REST_array['success'] = TRUE;
		$REST_array['data'] = null;
		$REST_array['meta']['code'] = 200;
		$REST_array['meta']['message'] = "Word added successfully";
	} else {
		$REST_array['success'] = FALSE;
		$REST_array['data'] = NULL;
		$REST_array['meta']['code'] = 404;
		$REST_array['meta']['message'] = "Word addition failed";
	}

	echo json_encode($REST_array);

?>