<?php

/*
 * Connect to the local server using Windows Authentication and
 * specify the AdventureWorks database as the database in use.
 */
function validate($query)
{
    
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
    
    $data = "";
    while ($row = sqlsrv_fetch_array($statement_constr, SQLSRV_FETCH_ASSOC)) {
        $data = $row['password'];
    }
    
    /* Free statement and connection resources. */
    sqlsrv_free_stmt($statement_constr);
    sqlsrv_close($connect);
    error_log("query2:0000000000000000000000000-------------------------------" . $data);
    return $data;
}
?>