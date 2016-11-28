<table id="area_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Όνομα</th>
            <th>Δήμος</th>
            <th>Νομός</th>
            <th>Ενέργειες</th>
        </tr>
    </thead>
    <tfoot></tfoot>
</table>
<script>
    $(document).ready(function () {
        $('#area_list').DataTable({
            "processing": true,
            "ajax": "/geography/get_areas_list",
            "columns": [
                {"data": "area_checked"},
                {"data": "area_id"},
                {"data": "area_label"},
                {"data": "area_municipality"},
                {"data": "area_prefecture"},
                {"data": "area_actions"}
            ],
            "rowCallback": function(row, data, index) {
                var action_html = "<a class='btn btn-success edit-button' href='/geography/edit_area/" + data.area_id + "'><span class='glyphicon glyphicon-pencil' title='Επεξεργασία'></span></a>";
                $('td:eq(0)', row).html('<input type="checkbox" id="area_' + data.area_id + '">');
                $("td:eq(5)", row).html(action_html);
            }
        });
    });
</script>