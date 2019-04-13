<?php

function construct_json($statement_constr, $parse) {
    
    /* Retrieve each row as an associative array and display the results.*/
    $row_index = 0;
    $column_index = 0;
    $cust_partition = 4;
    $acc_partition = 13;
    $data = [];
    while( $row = sqlsrv_fetch_array( $statement_constr, SQLSRV_FETCH_ASSOC))
    {
        if ($parse == 'accountDetails') {
       
            $data['D_ID'] = $row['CUSTOMER_ID'];
            $data['F_N'] = $row['FIRST_NAME'];
            $data['L_N'] = $row['LAST_NAME'];
            $data['M_N'] = $row['MIDDLE_NAME'];
            $data['T_INF'][$row_index]['T_N'] = $row['ACCOUNT_NO'];
            $data['T_INF'][$row_index]['DT_OP'] = $row['DATE_OPENED'];
            $data['T_INF'][$row_index]['BL'] = $row['AVAILABLE_BALANCE'];
            $data['T_INF'][$row_index]['T'] = $row['TYPE'];
            $data['T_INF'][$row_index]['MIN'] = $row['MINIMUM_BALANCE'];
            $data['T_INF'][$row_index]['I'] = $row['INTEREST_RATE'];
            $data['T_INF'][$row_index]['MT'] = $row['MAX_TRANSACTION_ALLOWED_PER_MONTH'];
            $data['IFS'] = $row['IFSC_CODE'];
            $data['O'] = $row['ZONE'];
            $data['D1'] = $row['ADDRESS_LINE_1'];
            $data['D2'] = $row['ADDRESS_LINE_2'];
            $data['TI'] = $row['CITY'];
            $data['ST'] = $row['STATE'];
            $data['IP'] = $row['ZIP'];
            $data['#'] = $row['CONTACT_NO'];
            $data['MICR'] = $row['MICR_CODE'];
            
        }
        elseif ($parse == 'customerDetails') {
            $data['D_ID'] = $row['CUSTOMER_ID'];
            $data['F_N'] = $row['FIRST_NAME'];
            $data['L_N'] = $row['LAST_NAME'];
            $data['M_N'] = $row['MIDDLE_NAME'];
            $data['SSN'] = $row['SSN'];
            $data['D1'] = $row['ADDRESS_LINE_1'];
            $data['D2'] = $row['ADDRESS_LINE_2'];
            $data['TI'] = $row['CITY'];
            $data['ST'] = $row['STATE'];
            $data['IP'] = $row['ZIP'];
            $data['#1'] = $row['REGISTERED_CONTACT_NO'];
            $data['#2'] = $row['ALTERNATE_CONTACT_NO'];
            $data['DO'] = $row['DATE_OF_BIRTH'];
            $data['G'] = $row['GENDER'];
            $data['OD'] = $row['ACCOUNT_OPENED_ON'];
            $data['S'] = $row['ACCOUNT_STATUS'];
            $data['EM'] = $row['EMAIL_ID'];

        }
        elseif ($parse == 'cardDetails') {
            $data['D_ID'] = $row['CUSTOMER_ID'];
            $data['F_N'] = $row['FIRST_NAME'];
            $data['L_N'] = $row['LAST_NAME'];
            $data['M_N'] = $row['MIDDLE_NAME'];
            $data['IFS'] = $row['IFSC_CODE'];
            $data['O'] = $row['ZONE'];
            $data['D1'] = $row['ADDRESS_LINE_1'];
            $data['D2'] = $row['ADDRESS_LINE_2'];
            $data['TI'] = $row['CITY'];
            $data['ST'] = $row['STATE'];
            $data['IP'] = $row['ZIP'];
            $data['#'] = $row['CONTACT_NO'];
            $data['MIR'] = $row['MICR_CODE'];
            $data['#_INF'][$row_index]['#'] = $row['CARD_NUMBER'];
            $data['#_INF'][$row_index]['DN'] = $row['NAME_ON_CARD'];
            $data['#_INF'][$row_index]['D'] = $row['CARD'];
            $data['#_INF'][$row_index]['T'] = $row['CARD_TYPE'];
            $data['#_INF'][$row_index]['VF'] = $row['VALID_FROM'];
            $data['#_INF'][$row_index]['VT'] = $row['VALID_TILL'];
            
        }

        $row_index = $row_index+1;
    }
    $data_string =  json_encode($data);
    
    
    return $data_string;
    
}

?>