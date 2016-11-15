<form class="form-inline" id="add_user_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="text" class="form-control" id="username" placeholder="Όνομα χρήστη" required style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="password" placeholder="Κωδικός πρόσβασης" required style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="email" placeholder="Email" required style="width: 100%;">
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="name" required placeholder="Όνομα">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="lastname" required placeholder="Επίθετο">
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" id="status" required title="Κατάσταση χρήστη">
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
            <button type="button" class="btn btn-primary pull-right" id="submit_user" required>Αποθήκευση</button>
        </div>
    </div>
</form>
<script>
    
    $("#add_user_form").validate();
    
    $("#is_admin").bootstrapSwitch({
        "onText": "Διαχειριστής",
        "offText": "Απλός χρήστης",
        "state": true
    });
    
    $("body").off("click", "#submit_user").on("click", "#submit_user", function() {
        if (!$("#add_user_form").valid()) {
            return false;
        }
        
        var user_object = {
            
            "username":     $("#username").val(),
            "password":     $("#password").val(),
            "email":        $("#email").val(),
            "name":         $("#name").val(),
            "lastname":     $("#lastname").val(),
            "status":       $("#status").val(),
            
            "is_admin":     $('#is_admin').bootstrapSwitch('state')
        }

        console.log(user_object);
        
        $.ajax({
            type:   "post",
            url:    "/user/save_user",
            data:   {
                "user": user_object
            }
        }).done(function(data) {
            console.log(data);
        });
    });
</script>