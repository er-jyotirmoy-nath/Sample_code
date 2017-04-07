//Ajax Get and post with serailize data
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="form-horizontal" id="editform">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit File Details <span id="save_res"></span></h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Sample Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Estimated Hours</label>
                        <div class="col-sm-10">
                            <input type="text" id="esthrs" name="esthrs" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Wras Submission Date</label>
                        <div class="col-sm-10">
                            <input type="date" id="wras_sub_date" name="wras_sub_date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="color" class="col-sm-2 control-label">Add Comments</label>
                        <div class="col-sm-10">
                            <input type="date" id="testing_comments" name="testing_comments" class="form-control">
                        </div>
                    </div>


                    <input type="hidden" name="id" class="form-control" id="id">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#editform").on("submit", function (event) {
        event.preventDefault();
        $("#save_res").html("Working...");
        var serializedata = $(this).serialize();
        $.post("editEventTitle.php", serializedata).done(function (responsedata) {
            $("#save_res").html(responsedata);
        });

    });
    $('#ModalEdit').on('show.bs.modal', function () {
                var modal = $(this);
                $("#save_res").html("");
                var sampleno = modal.find('.modal-body #title').val();
                $.get('editEventTitle.php', {sampleno: sampleno}).done(function (response_data) {
                    var esthrs = JSON.parse(response_data);
                    modal.find('.modal-body #esthrs').val(esthrs.ESTIMATEDHOUR);
                });
    });
</script>
