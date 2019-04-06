<?php

function construct_json($statement_constr, $parse)
{
    
    /* Retrieve each row as an associative array and display the results. */
    $row_index = 0;
    $column_index = 0;
    $cust_partition = 4;
    $acc_partition = 13;
    $data = [];
    while ($row = sqlsrv_fetch_array($statement_constr, SQLSRV_FETCH_ASSOC)) {
        if ($parse == 'accountDetails') {
            
            $data['C_ID'] = $row['CUSTOMER_ID'];
            $data['F_N'] = $row['FIRST_NAME'];
            $data['L_N'] = $row['LAST_NAME'];
            $data['M_N'] = $row['MIDDLE_NAME'];
            $data['AC_INF'][$row_index]['AC_N'] = $row['ACCOUNT_NO'];
            $data['AC_INF'][$row_index]['DT_OP'] = $row['DATE_OPENED'];
            $data['AC_INF'][$row_index]['BAL'] = $row['AVAILABLE_BALANCE'];
            $data['AC_INF'][$row_index]['T'] = $row['TYPE'];
            $data['AC_INF'][$row_index]['MIN_BAL'] = $row['MINIMUM_BALANCE'];
            $data['AC_INF'][$row_index]['I'] = $row['INTEREST_RATE'];
            $data['AC_INF'][$row_index]['MT'] = $row['MAX_TRANSACTION_ALLOWED_PER_MONTH'];
            $data['IFSC'] = $row['MIDDLE_NAME'];
            $data['B_N'] = $row['IFSC_CODE'];
            $data['Z'] = $row['ZONE'];
            $data['A1'] = $row['ADDRESS_LINE_1'];
            $data['A2'] = $row['ADDRESS_LINE_2'];
            $data['CTY'] = $row['CITY'];
            $data['ST'] = $row['STATE'];
            $data['ZIP'] = $row['ZIP'];
            $data['BC'] = $row['CONTACT_NO'];
            $data['MICR'] = $row['MICR_CODE'];
        } elseif ($parse == 'customerDetails') {
            $data['C_ID'] = $row['CUSTOMER_ID'];
            $data['F_N'] = $row['FIRST_NAME'];
            $data['L_N'] = $row['LAST_NAME'];
            $data['M_N'] = $row['MIDDLE_NAME'];
            $data['SSN'] = $row['SSN'];
            $data['A1'] = $row['ADDRESS_LINE_1'];
            $data['A2'] = $row['ADDRESS_LINE_2'];
            $data['CT'] = $row['CITY'];
            $data['ST'] = $row['STATE'];
            $data['ZIP'] = $row['ZIP'];
            $data['CN1'] = $row['REGISTERED_CONTACT_NO'];
            $data['CN2'] = $row['ALTERNATE_CONTACT_NO'];
            $data['DOB'] = $row['DATE_OF_BIRTH'];
            $data['G'] = $row['GENDER'];
            $data['AOD'] = $row['ACCOUNT_OPENED_ON'];
            $data['S'] = $row['ACCOUNT_STATUS'];
            $data['EM'] = $row['EMAIL_ID'];
        } elseif ($parse == 'cardDetails') {
            $data['C_ID'] = $row['CUSTOMER_ID'];
            $data['F_N'] = $row['FIRST_NAME'];
            $data['L_N'] = $row['LAST_NAME'];
            $data['M_N'] = $row['MIDDLE_NAME'];
            $data['IFSC'] = $row['MIDDLE_NAME'];
            $data['B_N'] = $row['IFSC_CODE'];
            $data['Z'] = $row['ZONE'];
            $data['A1'] = $row['ADDRESS_LINE_1'];
            $data['A2'] = $row['ADDRESS_LINE_2'];
            $data['CTY'] = $row['CITY'];
            $data['ST'] = $row['STATE'];
            $data['ZIP'] = $row['ZIP'];
            $data['BC'] = $row['CONTACT_NO'];
            $data['MICR'] = $row['MICR_CODE'];
            $data['C_INF'][$row_index]['CN'] = $row['CARD_NUMBER'];
            $data['C_INF'][$row_index]['CDN'] = $row['NAME_ON_CARD'];
            $data['C_INF'][$row_index]['C'] = $row['CARD'];
            $data['C_INF'][$row_index]['T'] = $row['CARD_TYPE'];
            $data['C_INF'][$row_index]['VF'] = $row['VALID_FROM'];
            $data['C_INF'][$row_index]['VT'] = $row['VALID_TILL'];
        }
        
        $row_index = $row_index + 1;
    }
    $data_string = json_encode($data);
    
    return $data_string;
}

?>