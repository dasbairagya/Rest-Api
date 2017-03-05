<?php
	// Include confi.php
	include_once('config.php');


	$uid = isset($_GET['uid']) ? mysqli_real_escape_string($conn, $_GET['uid']) :  "";
// $uid =2;
	if(!empty($uid)){
		$qur = mysqli_query($conn, "select name, email, status from users where ID='$uid'");
		$result =array();
		while($r = mysqli_fetch_array($qur)){
			extract($r);
			// var_dump($r);
			$result[] = array("name" => $name, "email" => $email, 'status' => $status); 
			// var_dump($result);
		}
		$json = array("status" => 1, "info" => $result);
		// var_dump($json);
	}else{
		$json = array("status" => 0, "msg" => "User ID not define");
	}
	mysqli_close($conn);

	/* Output header */
	header('Content-type: application/json');
	echo json_encode($json);
