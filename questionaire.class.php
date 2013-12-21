<?php
	class questionaire
	{	
		private $con;

		public function __construct($con)
		{
			$this->con = $con;
		}

		function build( $question_set)
		{
			$q = "
			SELECT * FROM `questionair`
			WHERE `question_set` = '".$question_set."'
			ORDER BY `sort`
			";

			$res = mysqli_query($this->con, $q);

			$questions = "";

			while($row = mysqli_fetch_array($res))
  			{
  				
  				$radios = "";
  				for($i = 1; $i <= $row['scale_length']; $i++)
  				{
  					$radios .= '
						<input type="radio" name="'.$row['question_set'].$row['set_id'].'" value="'.$i.'">
  					';
  				}


  				$questions .= '
  						<p>
							<strong>'.$row['question'].':</strong>
							<br>
							'.$row['left_answer'].$radios.$row['right_answer'].'
						</p>
					';
  				
  			}

  			$data = '
				<!doctype html>
				<html lang="en">
				<head>
					<meta charset="UTF-8">
					<title>Experiment</title>
					<link href="css/styles.css" rel="stylesheet" media="screen">
				</head>
				<body>
					<div id="container">
						<div class="part questionaire">
							<form action="savedata.php" method="post">
								'.$questions.'
								<input type="submit" value="Next" id="btn-next">
							</form>
						</div>
					</div>
					<script src="http://code.jquery.com/jquery.js"></script>
				    <script src="js/main.js"></script>
				</body>
				</html>
  			';

  			return $data;
		}
	}
?>

	



