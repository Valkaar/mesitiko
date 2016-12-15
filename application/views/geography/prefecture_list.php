<table id="prefecture_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Όνομα</th>
            <th>Ενέργειες</th>
        </tr>
    </thead>
    <tfoot></tfoot>
</table>
<script>
    $(document).ready(function () {
        $('#prefecture_list').DataTable({
            "processing": true,
            "ajax": "<?= base_url(); ?>geography/get_prefectures_list",
            "columns": [
                {"data": "prefecture_checked"},
                {"data": "prefecture_id"},
                {"data": "prefecture_label"},
                {"data": "prefecture_actions"}
            ],
            "rowCallback": function(row, data, index) {
                var action_html = "<a class='btn btn-success edit-button' href='<?= base_url(); ?>geography/edit_prefecture/" + data.prefecture_id + "'><span class='glyphicon glyphicon-pencil' title='Επεξεργασία'></span></a>";
                $('td:eq(0)', row).html('<input type="checkbox" id="prefecture_' + data.prefecture_id + '">');
                $("td:eq(3)", row).html(action_html);
            }
        });
    });
</script>