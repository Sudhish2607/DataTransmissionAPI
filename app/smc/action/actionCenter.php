<?php

function construct_query($command, $customer_id)
{
    $query = "";
    
    switch ($command) {
        case "customerDetails":
            $query = "SELECT CUSTOMER_ID
                      ,FIRST_NAME
                      ,LAST_NAME
                      ,MIDDLE_NAME
                      ,SSN
                      ,ADDRESS_LINE_1
                      ,ADDRESS_LINE_2
                      ,CITY
                      ,STATE
                      ,ZIP
                      ,REGISTERED_CONTACT_NO
                      ,ALTERNATE_CONTACT_NO
                      ,DATE_OF_BIRTH
                      ,GENDER
                      ,ACCOUNT_OPENED_ON
                      ,ACCOUNT_STATUS
                      ,EMAIL_ID
                  FROM dbo.CUSTOMER WHERE CUSTOMER_ID = " . $customer_id;
            break;
        case "accountDetails":
            $query = "SELECT C.CUSTOMER_ID
                      ,C.FIRST_NAME
                      ,C.LAST_NAME
                      ,C.MIDDLE_NAME
                	  ,A.ACCOUNT_NO
                      ,A.DATE_OPENED
                      ,A.AVAILABLE_BALANCE
                	  ,AT.TYPE
                      ,AT.MINIMUM_BALANCE
                      ,AT.INTEREST_RATE
                      ,AT.MAX_TRANSACTION_ALLOWED_PER_MONTH
                	  ,BB.IFSC_CODE
                      ,BB.BRANCH_NAME
                      ,BB.ZONE
                      ,BB.ADDRESS_LINE_1
                      ,BB.ADDRESS_LINE_2
                      ,BB.CITY
                      ,BB.STATE
                      ,BB.ZIP
                      ,BB.CONTACT_NO
                      ,BB.MICR_CODE
                  FROM DBO.CUSTOMER C
                  INNER JOIN DBO.ACCOUNT A
                	ON C.CUSTOMER_ID = A.CUSTOMER_ID
                  INNER JOIN DBO.ACCOUNT_TYPE AT
                    ON AT.ACCOUNT_TYPE_ID = A.ACCOUNT_TYPE_ID
                  INNER JOIN DBO.BANK_BRANCH BB
                    ON BB.IFSC_CODE=A.IFSC_CODE
                  WHERE C.CUSTOMER_ID = " . $customer_id;
            break;
        case "cardDetails":
            $query = "SELECT C.CUSTOMER_ID
                      ,C.FIRST_NAME
                      ,C.LAST_NAME
                      ,C.MIDDLE_NAME
                	  ,BB.IFSC_CODE
                      ,BB.BRANCH_NAME
                      ,BB.ZONE
                      ,BB.ADDRESS_LINE_1
                      ,BB.ADDRESS_LINE_2
                      ,BB.CITY
                      ,BB.STATE
                      ,BB.ZIP
                      ,BB.CONTACT_NO
                      ,BB.MICR_CODE
                	  ,CD.CARD_NUMBER
                	  ,CD.NAME_ON_CARD
                	  ,CD.CARD
                	  ,CD.CARD_TYPE
                	  ,CD.VALID_FROM
                	  ,CD.VALID_TILL
                  FROM DBO.CUSTOMER C
                  INNER JOIN DBO.BANK_CUSTOMER_REL BCR
                	ON C.CUSTOMER_ID = BCR.CUSTOMER_ID
                  INNER JOIN DBO.BANK_BRANCH BB
                    ON BB.IFSC_CODE=BCR.IFSC_CODE
                  INNER JOIN DBO.CARD CD
                    ON CD.CUSTOMER_ID = C.CUSTOMER_ID
                  WHERE C.CUSTOMER_ID = " . $customer_id;
            break;
    }
}
?>