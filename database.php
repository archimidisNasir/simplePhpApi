<?php  

	function connect_database()
	{
		$db['default']['hostname'] = "your.server.IP.here";
		$db['default']['username'] = "db_user";
		$db['default']['password'] = "db_pass";
		$db['default']['database'] = "db_name";
		$conn = mysqli_connect($db['default']['hostname'], $db['default']['username'], $db['default']['password']) or die('Error connecting to mysql');
		$db_selected = mysqli_select_db($conn, $db['default']['database']);
		if (!$db_selected) {
			die ('Can\'t use database : ' . mysql_error());
		}	
		return $conn;
	}
    
    
?>