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
    
    
    if($valid==1)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            $postData = file_get_contents('php://input');
            $data_log = $postData;
            $data = json_decode($postData, true);
            
            $user = htmlspecialchars($data["username"], ENT_QUOTES);
            $start_time = htmlspecialchars($data["time"], ENT_QUOTES);
            
			$record_id ="youCanPutSomethingHereToBeSentOutAsResponse";
            $successful =1;
			
			// do your things here.
			// if everything goes well, make $successful =1 and good response will be sent.
			// if anything is wrong, make $successful =0 and bad response will be sent.
			// you can also change position and/or contents of $response array to meet your needs.
			
            if($successful==1 )
			{
				$response["result"] = "Start Successful..";
				$response["record_id"] = $record_id;
				http_response_code(200);
			}
        }
    }
    
    
    header('Content-Type: application/json');
    echo json_encode($response);