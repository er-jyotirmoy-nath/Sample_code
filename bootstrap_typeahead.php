<?php


/*
 * This file is liecensed to NSF International
 * Each line should be prefixed with  * 
 */

session_start();
include("../lab_control_v2/connections/wrc_new.php");
include("session_check_new.php");

if (isset($_POST['query'])) {
    $temp = array();
    $query = $_POST['query'];
    $sql = "SELECT SAMPLE_NUMBER FROM FULL_DETAILS where SAMPLE_NUMBER LIKE '%$query%'";
    $query = $dbh->prepare($sql);
    $query->execute();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)){
        $temp[] = $row["SAMPLE_NUMBER"];
    }
    echo json_encode($temp);
  
}

?>

 $(function () {
            $("#typeahead-input").typeahead({
                source: function (query, process) {
                    var textVal = $("#typeahead-input").val();
                    $.ajax({
                        url: 'load_cal_dash.php',
                        type: 'POST',
                        data: 'query=' + textVal ,
                        dataType: 'JSON',
                        async: true,
                        success: function (data) {
                            process(data);
                            console.log(textVal);
                        }
                    });
                }
            });
        });
