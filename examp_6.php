 <script>
        $(document).ready(function () {
            setInterval(update, 10000);

            function update() {
                var v1 = 0, v2 = 0, v3 = 0, v4 = 0, v4_1 = 0, v5 = 0, v5_1 = 0, v6 = 0, v7 = 0;
                $("#emontx7").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i>");
                $("#emontx9").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i>");
                $("#emontx10").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i>");
                $("#emontx11").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i>");
                $("#emontx11_1").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i>");
                $("#emontx12").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i>");
                $("#emontx12_1").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i>");


                $.getJSON("rig_data.php", function (result) {


                    $.each(result, function (i, field) {
                        if (field.nodeid == 'emontx7') {
                            if (field.name == 'power1' || field.name == 'power2' || field.name == 'power3')
                                v6 += (!$.isNumeric(field.value)) ? 0 : Math.abs(parseInt(field.value));

                        }
                        if (field.nodeid == 'emontx9') {
                            if (field.name == 'power1' || field.name == 'power2' || field.name == 'power3')
                                v1 += (!$.isNumeric(field.value)) ? 0 : Math.abs(parseInt(field.value));
                            //                console.log("v1"+v1);

                        }
                        if (field.nodeid == 'emontx10') {
                            if (field.name == 'power1' || field.name == 'power2' || field.name == 'power3')
                                v2 += (!$.isNumeric(field.value)) ? 0 : Math.abs(parseInt(field.value));

                        }
                        if (field.nodeid == 'emontx11') {
                            if (field.name == 'power2')
                                v4 += (!$.isNumeric(field.value)) ? 0 : Math.abs(parseInt(field.value));

                        }
                        if (field.nodeid == 'emontx11') {
                            if (field.name == 'power1')
                                v4_1 += (!$.isNumeric(field.value)) ? 0 : Math.abs(parseInt(field.value));

                        }
                        if (field.nodeid == 'emontx12') {
                            if (field.name == 'power2')
                                v5 += (!$.isNumeric(field.value)) ? 0 : Math.abs(parseInt(field.value));

                        }
                        if (field.nodeid == 'emontx12') {
                            if (field.name == 'power1')
                                v5_1 += (!$.isNumeric(field.value)) ? 0 : Math.abs(parseInt(field.value));

                        }




                        if (v1 == 0) {

                            $("#emontx9").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Data Pending</span>");
                        } else if (v1 < 200) {

                            $("#emontx9").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Down</span>");
                        } else if (v1 > 200 && v1 < 2500) {

                            $("#emontx9").html("<span class=\"badge\" style=\"background-color: #5cb85c !important;\">Running</span>");
                        } else if (v1 > 2501) {

                            $("#emontx9").html("<span class=\"badge\" style=\"background-color: #f0ad4e !important;\">Running and Heating</span>");
                        }

                        if (v2 == 0) {

                            $("#emontx10").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Data Pending</span>");
                        } else if (v2 < 200) {

                            $("#emontx10").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Down</span>");
                        } else if (v2 > 200 && v2 < 2500) {

                            $("#emontx10").html("<span class=\"badge\" style=\"background-color: #5cb85c !important;\">Running</span>");
                        } else if (v2 > 2501) {

                            $("#emontx10").html("<span class=\"badge\" style=\"background-color: #f0ad4e !important;\">Running and Heating</span>");
                        }


                        if (v4 == 0) {

                            $("#emontx11").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Data Pending</span>");
                        } else if (v4 < 200) {

                            $("#emontx11").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Down</span>");
                        } else if (v4 > 200 && v4 < 2500) {

                            $("#emontx11").html("<span class=\"badge\" style=\"background-color: #5cb85c !important;\">Running</span>");
                        } else if (v4 > 2501) {

                            $("#emontx11").html("<span class=\"badge\" style=\"background-color: #f0ad4e !important;\">Running and Heating</span>");
                        }

                        if (v4_1 == 0) {

                            $("#emontx11_1").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Data Pending</span>");
                        } else if (v4_1 < 200) {

                            $("#emontx11_1").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Down</span>");
                        } else if (v4_1 > 200 && v4_1 < 2500) {

                            $("#emontx11_1").html("<span class=\"badge\" style=\"background-color: #5cb85c !important;\">Running</span>");
                        } else if (v4_1 > 2501) {

                            $("#emontx11_1").html("<span class=\"badge\" style=\"background-color: #f0ad4e !important;\">Running and Heating</span>");
                        }

                        if (v5 == 0) {

                            $("#emontx12").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Data Pending</span>");
                        } else if (v5 < 200) {

                            $("#emontx12").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Down</span>");
                        } else if (v5 > 200 && v5 < 2500) {

                            $("#emontx12").html("<span class=\"badge\" style=\"background-color: #5cb85c !important;\">Running</span>");
                        } else if (v5 > 2501) {

                            $("#emontx12").html("<span class=\"badge\" style=\"background-color: #f0ad4e !important;\">Running and Heating</span>");
                        }

                        if (v5_1 == 0) {

                            $("#emontx12_1").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Data Pending</span>");
                        } else if (v5_1 < 200) {

                            $("#emontx12_1").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Down</span>");
                        } else if (v5_1 > 200 && v5_1 < 2500) {

                            $("#emontx12_1").html("<span class=\"badge\" style=\"background-color: #5cb85c !important;\">Running</span>");
                        } else if (v5_1 > 2501) {

                            $("#emontx12_1").html("<span class=\"badge\" style=\"background-color: #f0ad4e !important;\">Running and Heating</span>");
                        }

                        if (v6 == 0) {

                            $("#emontx7").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Data Pending</span>");
                        } else if (v6 < 200) {

                            $("#emontx7").html("<span class=\"badge\" style=\"background-color: #d9534f !important;\">Down</span>");
                        } else if (v6 > 200 && v6 < 2500) {

                            $("#emontx7").html("<span class=\"badge\" style=\"background-color: #5cb85c !important;\">Running</span>");
                        } else if (v6 > 2501) {

                            $("#emontx7").html("<span class=\"badge\" style=\"background-color: #f0ad4e !important;\">Running and Heating</span>");
                        }



                    });
                });




            }
        });
    </script>

    <!-- Files for Eval -->
    <script>
        $(document).ready(function () {
            setInterval(calltestingboard, 10000);
            function calltestingboard() {
                testingboard();
                testingboard2();
                testingboard3();
                testingboard4();
            }
            function testingboard() {
                var v9 = "", j = 1, color = "";
                $.getJSON("inlab_status.php", function (result) {
                    $.each(result, function (i, field) {
                       
                        if (field[2] < 0) {
                            color = "#d9534f !important";
                        }
                        if (field[2] >= 0 && field[2] <= 4) {
                            color = "#f0ad4e !important";
                        }
                        if (field[2] > 4) {
                            color = "#5cb85c !important";
                        }
                        if (j == 1) {
                            v9 += "<tr >";
                        }
                        v9 += "<td  style=\"background-color:" + color + ";color:white;padding: 5px;font-size:13px;\">" + field[2] + " days <br>" + ((field[1] == null) ? "" : field[1]) + "<br>" + field[3] + "-" + field[0] + "</td>";
                        j++;
                        if (j > 14) {
                            v9 += "</tr>";
                            j = 1;
                        }



                    });

                    $("#testings_res").html(v9 + " ");

                });
            }
            function testingboard2() {
                var v9 = "", k = 1, color = "";
                $.getJSON("prodeval_status.php", function (result) {
                    $.each(result, function (i, field) {
                       
                        if (field[2] < 0) {
                            color = "#d9534f !important";
                        }
                        if (field[2] >= 0 && field[2] <= 4) {
                            color = "#f0ad4e !important";
                        }
                        if (field[2] > 4) {
                            color = "#5cb85c !important";
                        }
                        if (k == 1) {
                            v9 += "<tr >";
                        }
                        v9 += "<td  style=\"background-color:" + color + ";color:white;padding: 5px;font-size:13px;\">" + field[2] + " days <br>" + ((field[1] == null) ? "" : field[1]) + "<br>" + field[4] + "-" + field[0] + "</td>";
                        k++;
                        if (k > 14) {
                            v9 += "</tr>";
                            k = 1;
                        }



                    });

                    $("#testings_res2").html(v9 + " ");

                });
            }
            function testingboard3() {
                var v9 = "", l = 1, color = "";
                $.getJSON("samplecheck_status.php", function (result) {
                    $.each(result, function (i, field) {
                       
                        if (field[2] < 0) {
                            color = "#d9534f !important";
                        }
                        if (field[2] >= 0 && field[2] <= 4) {
                            color = "#f0ad4e !important";
                        }
                        if (field[2] > 4) {
                            color = "#5cb85c !important";
                        }
                        if (l == 1) {
                            v9 += "<tr >";
                        }
                        v9 += "<td  style=\"background-color:" + color + ";color:white;padding: 5px;font-size:13px;\">" + field[2] + " days <br>" + ((field[1] == null) ? "" : field[1]) + "<br>" + field[3] + "-" + field[0] + "</td>";
                        l++;
                        if (l > 14) {
                            v9 += "</tr>";
                            l = 1;
                        }



                    });

                    $("#testings_res3").html(v9 + " ");

                });
            }
             function testingboard4() {
                var kpi1 = 0,kpi2 = 0,kpi3 = 0;
                $.getJSON("kpi_matrices_status.php", function (result) {
                    console.log(result[0]);
                   
                        kpi1 = result[0];
                        kpi2 = result[1];
                        kpi3 = result[2];
                        
                  
                    
                    $("#completed_kpi").html("<span class=\"badge\" style=\"background-color: #9e9e9e;\"> &#163;"+kpi1+"</span>");
                    $("#pendingthis_kpi").html("<span class=\"badge\" style=\"background-color: #9e9e9e;\"> &#163;"+kpi2+"</span>");
                    $("#pendingnext_kpi").html("<span class=\"badge\" style=\"background-color: #9e9e9e;\"> &#163;"+kpi3+"</span>");

                });
            }

        });

    </script>
    <script>
    
    </script>
    <script>

        setInterval(ToggleDiv, 10000);

        function ToggleDiv() {
            if ($('#div1').is(':visible')) {
                $('#div1').fadeToggle("slow", function () {
                    $('#div2').fadeToggle("slow");
                });
            } else if ($('#div2').is(':visible')) {
                $('#div2').fadeToggle("slow", function () {
                    $('#div3').fadeToggle("slow");
                });
            } else {
                $('#div3').fadeToggle("slow", function () {
                    $('#div1').fadeToggle("slow");
                });
            }
        }</script>
