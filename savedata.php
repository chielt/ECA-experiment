<?php
	session_start();
	
	$host = "localhost";
	$database = "ECA-experiment";
	$user = "ECA-experiment";
	$password =  "ECA-experiment";


	// Create connection
	$con = mysqli_connect($host,$user,$password,$database);

	// Check connection
	if (mysqli_connect_errno($con))
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$sessionid = session_id();
	$ip = $_SERVER['REMOTE_ADDR'];

	switch ($_SESSION['state']) {
		case 0:
			$group1_q = "SELECT COUNT(UID) FROM `participants` WHERE group_id=0 AND gender='{$_POST['gender']}'";
			$group1_res = mysqli_query($con, $group1_q);
			
			$group2_q = "SELECT COUNT(UID) FROM `participants` WHERE group_id=1 AND gender='{$_POST['gender']}'";
			$group2_res = mysqli_query($con, $group2_q);

			$group1 = mysqli_fetch_assoc($group1_res);
			$group2 = mysqli_fetch_assoc($group2_res);

			
			if($group1['COUNT(UID)'] <= $group2['COUNT(UID)'])
			{
				$_SESSION['group_id'] = 0;
			} else {
				$_SESSION['group_id'] = 1;
			}

			$query =  "INSERT INTO `participants` (`age`, `gender`,`education`, `profession`, `group_id`, `session_id`, `IP`) VALUES ('{$_POST['age']}', '{$_POST['gender']}', '{$_POST['education']}', '{$_POST['profession']}', '{$_SESSION['group_id']}', '{$sessionid}', '{$ip}')";
			
			if(!mysqli_query($con, $query))
			{
				printf("Errormessage: %s\n", mysqli_error($con));
			}

			$_SESSION['state']++;
			header("Location: index.php");
			break;
		case 1:
			# code...
			$_SESSION['state']++;
			header("Location: index.php");
			break;
		case 2:
			$_SESSION['state']++;
			header("Location: index.php");
			break;
		case 3:
			foreach ($_POST as $key => $value) {
				$query = "INSERT INTO `questionaire_data` (`session_id`, `question`, `answer`) VALUES ('{$sessionid}','{$key}','{$value}')";
				if(!mysqli_query($con, $query))
				{
					printf("Errormessage: %s\n", mysqli_error($con));
					exit;
				}
			}
			$_SESSION['state']++;
			header("Location: index.php");
			break;
		case 4:
			$_SESSION['state']++;
			header("Location: index.php");
			break;
		case 5:
			foreach ($_POST as $key => $value) {
				$query = "INSERT INTO `questionaire_data` (`session_id`, `question`, `answer`) VALUES ('{$sessionid}','{$key}','{$value}')";
				if(!mysqli_query($con, $query))
				{
					printf("Errormessage: %s\n", mysqli_error($con));
					exit;
				}
			}

			$_SESSION['state']++;
			header("Location: index.php");
			break;
		case 6:
			foreach ($_POST as $key => $value) {
				$query = "INSERT INTO `questionaire_data` (`session_id`, `question`, `answer`) VALUES ('{$sessionid}','{$key}','{$value}')";
				if(!mysqli_query($con, $query))
				{
					printf("Errormessage: %s\n", mysqli_error($con));
					exit;
				}
			}

			$_SESSION['state']++;
			header("Location: index.php");
			break;
		default:
			header('Location: index.php');
			break;
	}

	#$query = "INSERT INTO `participant_data` (session_id, leeftijd) VALUES ('{$sessionid}', {$_POST['leeftijd']})";
	#mysqli_query($con, $query);
	
	#$_SESSION['pdata'] = $_POST;
	
	#header("Location: index.php");		
?>