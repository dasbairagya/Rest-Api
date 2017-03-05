<?php

// Include confi.php
include_once('config.php');

if($_SERVER['REQUEST_METHOD'] == "PUT"){
	$uid = isset($_SERVER['HTTP_UID']) ? mysqli_real_escape_string($conn, $_SERVER['HTTP_UID']) : "";
	$status = isset($_SERVER['HTTP_STATUS']) ? mysqli_real_escape_string($conn, $_SERVER['HTTP_STATUS']) : "";

	// Add your validations
	if(!empty($uid)){
		$qur = mysqli_query($conn, "UPDATE  users SET  status =  '$status' WHERE  ID ='$uid';");
		if($qur){
			$json = array("status" => 1, "msg" => "Status updated!!.");
		}else{
			$json = array("status" => 0, "msg" => "Error updating status");
		}
	}else{
		$json = array("status" => 0, "msg" => "User ID not define");
	}
}else{
		$json = array("status" => 0, "msg" => "User ID not define");
	}
	mysqli_close($conn);

	/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);