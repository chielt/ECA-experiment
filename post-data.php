<?php

session_start();

	$host = "localhost";
	$database = "ECA-experiment";
	$user = "ECA-experiment";
	$password =  "ECA-experiment";


	// Create connection
	$con=mysqli_connect($host,$user,$password,$database);

	// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sessionid = session_id();
	$ip = $_SERVER['REMOTE_ADDR'];

	$query = "INSERT INTO `task_data` (task_number, answer, duration, session_id, ip, questionaire) VALUES ({$_POST['question']}, {$_POST['answer']}, {$_POST['duration']}, '{$sessionid}', '{$ip}', '{$_POST['questionaire']}')";
	mysqli_query($con, $query);
	
	$result = array();
	$result['success'] = true;
	echo json_encode($result);
	exit;

	
?>