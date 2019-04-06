<?php
header("Content-Type:application/json");
require "app/smc/action/actionCenter.php";
require "app/smc/security/dbGateway.php";
if(!empty($_GET['command']))
{
    $command=$_GET['command'];
    $query = construct_query($command);
    $data = get_data($query, $command);
    if(empty($price))
    {
        response(200,"Data Not Found",NULL);
    }
    else
    {
        response(200,"Data Found",$data);
    }
    
}
else
{
    response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
    header("HTTP/1.1 ".$status);
    
    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;
    
    $json_response = json_encode($response);
    echo $json_response;
}
?>