$(document.body).on("click", "#load_pm", function (event) {
   
        var a = $(this).data('pmid');
        var b = $(this).data('sampleno');
       
        v = '';
        load_pm = [];
        load_pm[0] = "ok";
        load_pm[1] = "get";
        $.ajax({
            url: 'ajax_060220171229.php',
            type: "POST",
            data: {load_pm: load_pm},
            beforeSend: function (msg) { },
            afterSend: function (msg) {},
            success: function (data) {
                s = 0;
                console.log(data);
                $.each(JSON.parse(data), function (i, field) {
                    v += '<li><a href = "#" data-sno="' + a + '" data-pmsel="' + field.PM + '" data-sample="' + b + '" id="selectpm">' + field.PM + '(' + field.COUNT + ')</a></li>';
                    s++;
                });
                $("#assignee_pm" + a).html(v);
            }
        });
    });
