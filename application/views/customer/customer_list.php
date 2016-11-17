<table id="customer_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Όνομα</th>
            <th>Επώνυμο</th>
            <th>Τύπος</th>
            <th>Κατάσταση</th>
            <th>Κινητό</th>
            <th>Σταθερό</th>
            <th>E-mail</th>
            <th>Διεύθυνση</th>
            <th>Ενέργειες</th>
        </tr>
    </thead>
    <tfoot></tfoot>
</table>
<script>
    $(document).ready(function () {
        $('#customer_list').DataTable({
            "processing": true,
            "ajax": "/customer/get_customers_list",
            "columns": [
                {"data": "customer_checked"},
                {"data": "customer_id"},
                {"data": "customer_name"},
                {"data": "customer_lastname"},
                {"data": "customer_type"},
                {"data": "customer_status"},
                {"data": "customer_mobile"},
                {"data": "customer_phone"},
                {"data": "customer_email"},
                {"data": "customer_address"},
                {"data": "customer_actions"}
            ],
            "rowCallback": function(row, data, index) {
                var action_html = "<a class='btn btn-success edit-button' href='/customer/edit_customer/" + data.customer_id + "'><span class='glyphicon glyphicon-pencil' title='Επεξεργασία'></span></a>"
                                    + "<button class='btn btn-danger delete-button' type='submit' rel='" + data.customer_id + "'><span class='glyphicon glyphicon-remove' title='Διαγραφή'></span></button>";
                $('td:eq(0)', row).html('<input type="checkbox" id="customer_' + data.customer_id + '">');
                $("td:eq(10)", row).html(action_html);
            }
        })
    });
</script>