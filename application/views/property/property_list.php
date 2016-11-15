<table id="property_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Τύπος ακινήτου</th>
            <th>Τύπος συναλλαγής</th>
            <th>Νομός</th>
            <th>Δήμος</th>
            <th>Περιοχή</th>
            <th>Τετραγωνικά</th>
            <th>Τιμή</th>
            <th>Ενέργειες</th>
        </tr>
    </thead>
    <tfoot></tfoot>
</table>
<script>
    $(document).ready(function () {
        $('#property_list').DataTable({
            "processing": true,
            "ajax": "/property/get_properties_list",
            "columns": [
                {"data": "property_checked"},
                {"data": "property_id"},
                {"data": "property_type"},
                {"data": "property_transaction_type"},
                {"data": "property_prefecture"},
                {"data": "property_municipality"},
                {"data": "property_area"},
                {"data": "property_sqm"},
                {"data": "property_price"},
                {"data": "property_actions"}
            ],
            "rowCallback": function(row, data, index) {
                var action_html = "<a class='btn btn-success edit-button' href='/property/edit_property/" + data.property_id + "'><span class='glyphicon glyphicon-pencil' title='Επεξεργασία'></span></a>"
                                    + "<button class='btn btn-danger delete-button' type='submit' rel='" + data.property_id + "'><span class='glyphicon glyphicon-remove' title='Διαγραφή'></span></button>";
                $('td:eq(0)', row).html('<input type="checkbox" id="property_' + data.property_id + '">');
                $("td:eq(9)", row).html(action_html);
            }
        })
    });
</script>