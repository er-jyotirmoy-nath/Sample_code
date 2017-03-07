//Json encode Special Characters
<?php 
mb_internal_encoding("iso-8859-1");
mb_http_output("UTF-8");
ob_start("mb_output_handler");
    $certnum = $_POST["tmv2data"][0];
    $tmv2_array = array();
    $tmv2_json = array();
    $sql_get_tmv2 = "SELECT EXTENDED_COMMENTS,LICENSEE,MANUFACTURER,TO_CHAR(APPROVED_MIXING_VALVE) AS APPROVED_MIXING_VALVE"
            . ",TO_CHAR(UNIQUE_ID) AS UNIQUE_ID,CERTIFICATE_NUMBER,HP_1111,HPB,HPB_COMMENT"
            . ",HPS,HPS_COMMENT,HPW,HPW_COMMENT,HPT,HPT_COMMENT,COLD_ISOL_46_HP,LP_1287,LPB,LPB_COMMENT"
            . ",LPS,LPS_COMMENT,LPW,LPW_COMMENT,LPT,LPT_COMMENT,LPTX,LPTX_COMMENT"
            . ",COLD_ISOL_46_LP,COMMENTS"
            . " FROM wrc.BUILDCERT_APPROVALS WHERE BUILD_APP_ID = :certnum AND TYPE_APP = 'tmv2'";

    $quer_get_tmv2 = $dbh->prepare($sql_get_tmv2);
    $quer_get_tmv2->bindParam(":certnum", $certnum);
    $quer_get_tmv2->execute();
    
    $res_get_tmv2 = $quer_get_tmv2->fetchAll(PDO::FETCH_ASSOC);
   
   array_walk_recursive($res_get_tmv2, function(&$val) {
    $val = utf8_encode($val);
});
   
    echo json_encode( $res_get_tmv2);
?>
