<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);
    
    include("validate.php");
    include("../database.php");
    
    $conn = connect_database();
    
    $headers = getallheaders();
    $valid = validate($headers["Appkey"]);
    
    $response = array();
    $response["result"] = "Invalid request..";
    http_response_code(400);
    
    $arr_truck_id = array();
    $arr_truck_plate = array();
    
    if($valid==1)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') 
        {
            $user = htmlspecialchars($_GET["user"], ENT_QUOTES);
            
			$sql = "select * from db_table where username='".$user."' ";
			$res = mysqli_query($conn, $sql);
			if(mysqli_num_rows($res)>0)
			{
				$arr_response_temp = array();
				while($row = mysqli_fetch_array($res))
				{
					$arr_data = array();
					$arr_data["id"] = $row["id"];
					$arr_data["time"] = $row["time"];
					array_push($arr_response_temp, $arr_data);
				}
				$arr_response["count"] = count($arr_response_temp);
				$arr_response["data"] = $arr_response_temp;
				
				$arr_response["result"] = "Successful..";
				http_response_code(200);
			}
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($arr_response);