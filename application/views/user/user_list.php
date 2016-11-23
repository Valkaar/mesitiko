<table id="user_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th>Όνομα</th>
            <th>Επώνυμο</th>
            <th>E-mail</th>
            <th>Κατάσταση</th>
            <th>Διαχειριστής</th>
            <th>Ενέργειες</th>
        </tr>
    </thead>
    <tfoot></tfoot>
</table>
<script>
    $(document).ready(function () {
        $('#user_list').DataTable({
            "processing": true,
            "ajax": "/user/get_users_list",
            "columns": [
                {"data": "user_checked"},
                {"data": "user_id"},
                {"data": "user_name"},
                {"data": "user_lastname"},
                {"data": "user_email"},
                {"data": "user_status"},
                {"data": "user_isadmin"},
                {"data": "user_actions"}
            ],
            "rowCallback": function(row, data, index) {
                var action_html = "<a class='btn btn-success edit-button' href='/user/edit_user/" + data.user_id + "'><span class='glyphicon glyphicon-pencil' title='Επεξεργασία'></span></a>"
                                    + "<button class='btn btn-danger delete-button' type='submit' rel='" + data.user_id + "'><span class='glyphicon glyphicon-remove' title='Διαγραφή'></span></button>";
                $('td:eq(0)', row).html('<input type="checkbox" id="user_' + data.user_id + '">');
                $("td:eq(7)", row).html(action_html);
            }
        })
    });
    
    $("body").off("click", ".delete-button").on("click", ".delete-button", function() {
        $.ajax({
            type: "post",
            url: "/user/delete_user",
            data: {
                user_id: $(this).attr("rel")
            }
        }).done(function(data) {
            window.location.href = "/user/user_list";
        });
    });
</script>