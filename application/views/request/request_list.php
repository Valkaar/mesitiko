<table id="request_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Ημέρα δημιουργίας</th>
            <th>Τύπος συναλλαγής</th>
            <th>Όνομα πελάτη</th>
            <th>Εύρος έκτασης</th>
            <th>Εύρος τιμής</th>
            <th>Ενέργειες</th>
        </tr>
    </thead>
    <tfoot></tfoot>
</table>

<div id="modal_content_wrapper"></div>

<script>
    $(document).ready(function () {
        $('#request_list').DataTable({
            "processing": true,
            "ajax": "<?= base_url(); ?>request/get_requests_list",
            "columns": [
                {"data": "request_checked"},
                {"data": "request_id"},
                {"data": "request_created"},
                {"data": "transaction_type"},
                {"data": "customer_name"},
                {"data": "request_sqm_range"},
                {"data": "request_price_range"},
                {"data": "request_actions"}
            ],
            "rowCallback": function(row, data, index) {
                var action_html = "<a class='btn btn-success edit-button' href='<?= base_url(); ?>request/edit_request/" + data.request_id + "'><span class='glyphicon glyphicon-pencil' title='Επεξεργασία'></span></a>"
                                    + "<button class='btn btn-warning request-list-button' type='submit' rel='" + data.request_id + "'><span class='glyphicon glyphicon-home' title='Ακίνητα'></span></button>";
                $('td:eq(0)', row).html('<input type="checkbox" id="request_' + data.request_id + '">');
                $("td:eq(7)", row).html(action_html);
            }
        });
    });

    $("body").off("click", ".request-list-button").on("click", ".request-list-button", function () {
        $.ajax({
            type: "post",
            url: "<?= base_url(); ?>request/get_matching_properties_list",
            data: {
                request_id: $(this).attr("rel")
            }
        }).done(function(data) {
            $("#modal_content_wrapper").html(data);
            $('#matching_properties').modal();
        });
    });
</script>