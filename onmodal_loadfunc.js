//Modal open event

 <script >
        $('#exampleModal').on('show.bs.modal', function (event) {
        var myBookId = $(this).data('id');
        $("#sample_number_inter").val(myBookId);
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        
        modal.find('.modal-title').text('New message for ' + myBookId)
       
            Event = [];
            Event[0] = myBookId;
            Event[1] = "0";
            Event[2] = '9';
            $.ajax({
                url: 'adddesc.php',
                type: "POST",
                data: {Event: Event},
                beforeSend: function (msg) {
                    $("#loadcom_inter").html("<i class=\"fa fa-refresh fa-spin\"  ></i>");
                     
                },
                afterSend: function (msg) {
                    $("#loadcom_inter").html("<i class=\"fa fa-refresh fa-spin\"  ></i>");

                },
                success: function (data) {
                    $(".modal-body #loadcom_inter").html(data);
                    $("#com_inter").html("");
                }
            });
      });
    </script>
