<?php
header("Content-Type:application/json");
require "actionCenter.php";
require "dbGateway.php";
require "logi.php";
if (! empty($_GET['command'])) {
    $command = $_GET['command'];
    
//     if ($command = 'login') {
//         $user = $_GET['user'];
//         $pass = $_GET['pass'];
//         $query = "select password from dbo.CUSTOMER where CUSTOMER_ID = '" . $user . "' and password='" . $pass . "'";
//         error_log("query1:0000000000000000000000000++++++++++++++++++++++++" . $user);
//         $data = validate($query);
//         if ($data == $pass) {
//             response(200, "Data Found", NULL);
//         } else {
//             response(201, "Data Not Found", NULL);
//         }
//     } else {
        $query = construct_query($command, 'CUS001');
        error_log("query1:---------------------------------------" . $query);
        $data = get_data($query, $command);
        if (empty($data)) {
            response(200, "Data Not Found", NULL);
        } else {
            response(200, "Data Found", $data);
        }
//     }
} else {
    response(400, "Invalid Request", NULL);
}

function response($status, $status_message, $data)
{
    header("HTTP/1.1 " . $status);
    
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;
    
    $json_response = json_encode($response);
    echo $json_response;
}
?>