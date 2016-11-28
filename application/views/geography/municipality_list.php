<table id="municipality_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Όνομα</th>
            <th>Νομός</th>
            <th>Ενέργειες</th>
        </tr>
    </thead>
    <tfoot></tfoot>
</table>
<script>
    $(document).ready(function () {
        $('#municipality_list').DataTable({
            "processing": true,
            "ajax": "/geography/get_municipalities_list",
            "columns": [
                {"data": "municipality_checked"},
                {"data": "municipality_id"},
                {"data": "municipality_label"},
                {"data": "municipality_prefecture"},
                {"data": "municipality_actions"}
            ],
            "rowCallback": function(row, data, index) {
                var action_html = "<a class='btn btn-success edit-button' href='/geography/edit_municipality/" + data.municipality_id + "'><span class='glyphicon glyphicon-pencil' title='Επεξεργασία'></span></a>";
                $('td:eq(0)', row).html('<input type="checkbox" id="municipality_' + data.municipality_id + '">');
                $("td:eq(4)", row).html(action_html);
            }
        });
    });
</script>