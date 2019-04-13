<?php
/*
 * Connect to the local server using Windows Authentication and
 * specify the AdventureWorks database as the database in use.
 */
require "jsonFormatter.php";

function get_data($query, $parse)
{
    error_log("query" . $query);
    error_log("parse" . $parse);
    
    print('test');
    $server_name = ".\SQLEXPRESS";
    $database_connection_info = array(
        "Database" => "BankGatewayDB"
    );
    $connect = sqlsrv_connect($server_name, $database_connection_info);
    if ($connect === false) {
        echo "Could not connect.\n";
        die(print_r(sqlsrv_errors(), true));
    }
    
    /* Set up and execute the query. */
    $statement_constr = sqlsrv_query($connect, $query);
    if ($statement_constr === false) {
        echo "Error in query preparation/execution.\n";
        die(print_r(sqlsrv_errors(), true));
    }
    
    $data = construct_json($statement_constr, $parse);
    error_log("here0000000000000000000ddddddddddddddd:" . $data);
    echo $data;
    
    $snapshot = fopen("snapshot.txt", "w") or die("Unable to open file!");
    fwrite($snapshot, $data);
    fclose($snapshot);
    
    $level1 = `python level_1_ceasar.py "snapshot.txt" "encrypt"`;
    $level2 = `python level_2_steganography.py "./initialImage.JPG" "./imageToTransfer.png" "snapshot.txt" "encrypt"`;
    $level3 = `python level_3_aes.py "encrypt" "./imageToTransfer.png"`;
    
    /* Free statement and connection resources. */
    sqlsrv_free_stmt($statement_constr);
    sqlsrv_close($connect);
    return "snapshot.txt";
}
?>