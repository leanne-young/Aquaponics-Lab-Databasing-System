<html>
<body>

<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1); // change it to 0 on production server

	$db_name = 'ics';
	$db_user = 'ics';
	$db_pass = 'password';
	$db_host = 'localhost';

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	$db = new mysqli($db_host, $db_user, $db_pass, $db_name);

	if($db->connect_errno > 0){
    		die('Unable to connect to database [' . $db->connect_error . ']');
	}

	$sql = <<<SQL
    	SELECT *
   	FROM Aquaponics_Data
   	WHERE SensorData>28;

	SQL;

	if(!$result = $db->query($sql)){
	    die('There was an error running the query [' . $db->error . ']');
	}

	while($row = $result->fetch_assoc()){
	    echo $row['SensorData'] . '<br />';
	}

?>

</body>
</html>

