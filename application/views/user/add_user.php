<form class="form-inline">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="text" class="form-control" id="username" placeholder="Όνομα χρήστη" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="password" placeholder="Κωδικός πρόσβασης" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="email" placeholder="Email" style="width: 100%;">
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="name" placeholder="Όνομα">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="lastname" placeholder="Επίθετο">
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" id="status" title="Κατάσταση χρήστη">
                <?php foreach ($user_statuses as $user_status) { ?>
                <option value="<?= $user_status["user_status_id"]; ?>"><?= $user_status["user_status_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <input type="checkbox" name="is_admin" id="is_admin">
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary pull-right" id="submit_user">Αποθήκευση</button>
        </div>
    </div>
</form>
<script>
    $("#is_admin").bootstrapSwitch({
        "onText": "Διαχειριστής",
        "offText": "Απλός χρήστης",
        "state": true
    });
    
    $("body").off("click", "#submit_user").on("click", "#submit_user", function() {
        var user_object = {
            
            "username":     $("#user_username").val(),
            "password":     $("#user_password").val(),
            "email":        $("#user_email").val(),
            "name":         $("#user_name").val(),
            "lastname":     $("#user_lastname").val(),
            "status":       $("#user_status_id").val(),
            
            "is_admin":     $('#is_admin').bootstrapSwitch('state')
        }

        console.log(user_object);
    });
</script>