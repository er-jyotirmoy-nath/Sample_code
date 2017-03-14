//Ajax File Upload

$(document.body).on("change", "#down_file", function () {
    var file_data = $('#down_file').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file', file_data);//Use as $_POST["file"]["name"]
    alert(form_data);
    $.ajax({
        url: 'addlink.php', // point to server-side PHP script 
        dataType: 'text', // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        beforeSend: function (n) {
            $("#up_res").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i> Uploading...");
        },
        afterSend: function (n) {
            $("#up_res").html("<i class=\"fa fa-spinner fa-pulse fa-1x fa-fw\"></i> Uploading...");
        },
        success: function (data) {
            $("#up_res").html('<div class="form-group input-group"><input type="text" id="url" class="form-control" value="' + data + '" readonly="readonly"><span class="input-group-btn"><button class="btn btn-default" onclick="copyul()" type="button"><i class="fa fa-link" ></i></button></span></div>');
            $('#down_file').val("");// display response from the PHP script, if any
        }
    });
});
