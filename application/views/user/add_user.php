<form class="form-inline">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="text" class="form-control" id="username" placeholder="Username" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="password" placeholder="Password" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="εμαιλ" placeholder="Email" style="width: 100%;">
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
            <select class="form-control selectpicker" id="municipality_id" title="User Status">
                <?php foreach ($user_statuses as $user_status) { ?>
                <option value="<?= $user_status["user_status_id"]; ?>"><?= $user_status["user_status_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <input type="checkbox" name="is_admin" id="is_admin">
        </div>
    </div>
</form>
<script>
    $("#is_admin").bootstrapSwitch({
        "onText": "Διαχειριστής",
        "offText": "Απλός χρήστης",
        "state": true
    });
</script>