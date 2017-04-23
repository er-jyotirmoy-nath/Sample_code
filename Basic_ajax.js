//Enable Disable Button on Ajax

 <script type="text/javascript">
                    $("#save_desc").click(function () {
                        var samno = $("#sample_number_desc").val();
                        var descmo = $("#type_desc").val();
                        Event = [];
                        Event[0] = samno;
                        Event[1] = descmo;
                        Event[2] = '2';
                        $.ajax({
                            url: 'adddesc.php',
                            type: "POST",
                            data: {Event: Event},
                            beforeSend: function (msg) {
                                $("#desc_res").html("<div class=\"progress\"><div class=\"progress-bar progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:100%;background-color:#003b79;\">Loading...</div></div>");
                                $("#save_desc").text("Loading..");
                                $("#save_desc").prop("disabled", true);
                            },
                            afterSend: function (msg) {
                                $("#desc_res").html("<div class=\"progress\"><div class=\"progress-bar progress-bar-striped active\" role=\"progressbar\" aria-valuenow=\"100\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:100%;background-color:#003b79;\">Loading...</div></div>");
                                $("#save_desc").text("Loading..");
                                $("#save_desc").prop("disabled", true);
                            },
                            success: function (data) {
                                $("#desc_res").html(data);
                                $("#save_desc").text("Save Changes");
                                $("#save_desc").prop("disabled", false);
                            }
                        });
                    });
        </script>
