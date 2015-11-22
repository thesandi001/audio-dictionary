<?php

	include 'config/server.php';

	$Error = false;
	$Errorlog = array();
	$REST_array = array();
	$REST_array['meta'] = array();

	$sql = "SELECT * FROM bookmarks ORDER BY timestamp DESC";
	$bookmarks = $conn->query($sql);

	if($bookmarks) {
		$REST_array['success'] = TRUE;
		$count = 0;
		while($row = $bookmarks->fetch_assoc()){
			$REST_array['data'][] = $row;		
			$count++;
		}
		$REST_array['count'] = $count;
		$REST_array['meta']['code'] = 200;
		$REST_array['meta']['message'] = "Bookmarks returned successfully";
	} else {
		$REST_array['success'] = FALSE;
		$REST_array['data'] = NULL;
		$REST_array['meta']['code'] = 404;
		$REST_array['meta']['message'] = "Bookmark failed";
	}

	echo json_encode($REST_array);

?>