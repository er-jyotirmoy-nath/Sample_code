\\ Create Service using superagent ajax

function RegsDataService() {
    this.getRegsData = function (send_data) {
        var q = jQuery.Deferred();
        var request = window.superagent;
        request.post('model/regs_data_report_model.php')
                .set('Content-Type', 'application/json')
                .set('Accept', 'application/json')
                .send(send_data)
                .end(function (err, res) {
                    if (err) {
                        return q.reject(err);
                    } else {
                        var newresponse = JSON.parse(res.text);
                        return q.resolve(newresponse);
                    }
                });
        return q.promise();
    };
}

\\ Use Service to get data and add to datatable
var loadStep4Files = function () {
    
    var count1 = 0;
    var send_data = {load_step4: "get_step4_data"};
    var loadstep4 = new bs6920Service();
    $.when(loadstep4.getbs6920Data(JSON.stringify(send_data))).then(function (msg) {
        $('#example').dataTable().fnDestroy();
        var data = msg[0];
        console.log(data);
        $("#sac").html(msg[1]);
        if (!$.fn.DataTable.isDataTable('#example')) {
            var table3 = $('#example').dataTable({
                "data": data,
                "order": [[0, "desc"]],
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                columnDefs: [{
                        targets: -1,
                        visible: true
                    }]
            });

        }

    });
}
