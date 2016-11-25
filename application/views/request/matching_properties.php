<div class="modal fade" id="matching_properties" tabindex="-1" role="dialog" aria-labelledby="matching_properties_label">
    <div class="modal-dialog modal-lg" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="matching_properties_label">Ακίνητα που ταιριάζουν στη ζήτηση</h4>
            </div>
            <div class="modal-body">
                <table id="matching_properties_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#matching_properties_list").DataTable({
            "processing": true,
            "ajax": {
                "url": "/request/get_matching_properties",
                "type": "post",
                "data": {
                    "request_id": <?= $request_id; ?>
                }
            },
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
        }); 
    });
</script>