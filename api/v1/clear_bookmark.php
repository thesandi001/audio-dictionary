<?php

	include 'config/server.php';

	$Error = false;
	$Errorlog = array();
	$REST_array = array();
	$REST_array['meta'] = array();

	$sql = "DELETE FROM bookmarks";
	$bookmarks = $conn->query($sql);	

	if($bookmarks) {
		$REST_array['success'] = TRUE;
		$REST_array['data'] = NULL;
		$REST_array['count'] = 0;
		$REST_array['meta']['code'] = 200;
		$REST_array['meta']['message'] = "Bookmarks deleted successfully";
	} else {
		$REST_array['success'] = FALSE;
		$REST_array['data'] = NULL;
		$REST_array['meta']['code'] = 404;
		$REST_array['meta']['message'] = "Bookmark deletion failed";
	}

	echo json_encode($REST_array);

?>