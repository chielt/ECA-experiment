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

	require_once('questionaire.class.php');
	$questionaire = new questionaire($con);

	if(!isset($_SESSION['state']))
	{
		$_SESSION['state'] = 0;
	}

	switch ($_SESSION['state']) {
		case 0:
			echo file_get_contents('demographics.html');
			break;
		case 1:
			echo file_get_contents('task-time-sample-'.$_SESSION['group_id'].'.html');
			break;
		case 2:
			echo file_get_contents('task-text.html');
			break;
		case 3:
			# code...
			echo $questionaire->build('TQ');
			break;
		case 4:
			# code...
			echo file_get_contents('task-agent-'.$_SESSION['group_id'].'.html');
			break;
		case 5:
			# code...
			echo $questionaire->build('AQ');
			break;
		case 6:
			# code...
			echo file_get_contents('cq.html');
			break;
		case 7:
			# code...
			session_regenerate_id(true);
			session_destroy();

			echo file_get_contents('completed.html');
			break;
		default:
			# code...
			break;
	}

?>