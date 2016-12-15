<form class="form-inline" id="add_user_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><strong>Όνομα χρήστη</strong></span>
            <input type="text" class="form-control" id="username" placeholder="Όνομα χρήστη" required style="width: 100%;"
                       value="<?= !empty($user_data) && isset($user_data["user_username"]) ? $user_data["user_username"] : ""; ?>">
        </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><strong>Κωδικός</strong></span>
                <input type="password" class="form-control" id="password" placeholder="Κωδικός πρόσβασης" required style="width: 100%;"
                       value="<?= !empty($user_data) && isset($user_data["user_password"]) ? $user_data["user_name"] : ""; ?>">
                <span class="input-group-addon"></span>
                <input type="password" class="form-control" id="confirm_password" required placeholder="Επιβεβαίωση" value="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><strong>E-mail</strong></span>
            <input type="text" class="form-control" id="email" placeholder="Email" required style="width: 100%;"
                       value="<?= !empty($user_data) && isset($user_data["user_email"]) ? $user_data["user_email"] : ""; ?>">
        </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><strong>Ονοματεπώνυμο</strong></span>
                <input type="text" class="form-control" id="name" required placeholder="Όνομα"
                       value="<?= !empty($user_data) && isset($user_data["user_name"]) ? $user_data["user_name"] : ""; ?>">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="lastname" required placeholder="Επίθετο"
                       value="<?= !empty($user_data) && isset($user_data["user_lastname"]) ? $user_data["user_lastname"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 20%;"><strong>Κατάσταση χρήστη</strong></span>
            <select class="form-control selectpicker" id="status" required title="Κατάσταση χρήστη">
                <?php foreach ($user_statuses as $user_status) { ?>
                        <?php
                        if (!empty($user_data) && isset($user_data["user_user_status_id"]) && $user_data["user_user_status_id"] == $user_status["user_status_id"]) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                    <option value="<?= $user_status["user_status_id"]; ?>"<?= $selected; ?>><?= $user_status["user_status_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        </div>
        <div class="col-md-4">
            <input type="checkbox" name="is_admin" id="is_admin">
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-2">
            <button type="button" class="btn btn-warning pull-left" id="back_to_list">Επιστροφή στη λίστα</button>                        
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-danger pull-left" id="clear_form">Καθαρισμός φόρμας</button>                        
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-info pull-left" id="submit_user_remain">Αποθήκευση και παραμονή</button>            
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-success pull-right" id="submit_user_clear">Αποθήκευση και καθαρισμός</button>            
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-primary pull-right" id="submit_user">Αποθήκευση και επιστροφή</button>            
        </div>
    </div>
    <input type="hidden" id="is_edit" value="<?= !empty($user_data) ? 1 : 0; ?>">
    <input type="hidden" id="user_id" value="<?= !empty($user_data) ? $user_data["user_id"] : 0; ?>">
</form>
<script>

    $("#add_user_form").validate();

    $("body").off("click", "#back_to_list").on("click", "#back_to_list", function () {
        window.location.href = "<?= base_url(); ?>user/user_list";
    });
    $("body").off("click", "#clear_form").on("click", "#clear_form", function () {
        window.location.href = "<?= base_url(); ?>user/add_user";
    });

    $("#is_admin").bootstrapSwitch({
        "onText": "Διαχειριστής",
        "offText": "Απλός χρήστης",
        "state": true
    });

    $("body").off("click", "#submit_user, #submit_user_remain, #submit_user_clear").on("click", "#submit_user, #submit_user_remain, #submit_user_clear", function () {
        var that = this;
        
        if (!$("#add_user_form").valid()) {
            return false;
        }

        var user_object = {
            "name": $("#name").val(),
            "lastname": $("#lastname").val(),
            "username": $("#username").val(),
            "password": $("#password").val(),
            "email": $("#email").val(),
            "status": $("#status").val(),
            "is_admin": $('#is_admin').bootstrapSwitch('state'),
            
            "is_edit": $("#is_edit").val(),
            "user_id": $("#user_id").val()
        };
        
        $.ajax({
            type: "post",
            url: "<?= base_url(); ?>user/save_user",
            data: {
                "user": user_object
            }
        }).done(function (data) {
            if ($("#is_edit").val() == 0) {
                $("#is_edit").val(1);
                $("#user_id").val(data);                
            }
            
            if ($(that).attr("id") === "submit_user_remain") {
                window.location.href = "<?= base_url(); ?>user/edit_user/" + data;
            } else if ($(that).attr("id") === "submit_user_clear") {
                window.location.href = "<?= base_url(); ?>user/add_user";
            } else if ($(that).attr("id") === "submit_user") {
                window.location.href = "<?= base_url(); ?>user/user_list";                
            }
        });
    });
</script>