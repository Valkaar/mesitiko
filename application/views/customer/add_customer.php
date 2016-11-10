<form class="form-inline">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <select class="form-control selectpicker" id="customer_type_id" title="Επιλέξτε τύπο πελάτη...">
                <?php foreach ($customer_types as $customer_type) { ?>
                <option value="<?= $customer_type["customer_type_id"]; ?>"><?= $customer_type["customer_type_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" id="customer_status_id" title="Επιλέξτε κατάσταση πελάτη...">
                <?php foreach ($customer_statuses as $customer_status) { ?>
                <option value="<?= $customer_status["customer_status_id"]; ?>"><?= $customer_status["customer_status_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="text" class="form-control" id="customer_name" placeholder="Όνομα" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="customer_lastname" placeholder="Επίθετο" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="customer_address" placeholder="Διεύθυνση">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="customer_address_no" placeholder="Αριθμός">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="text" class="form-control" id="customer_telephone" placeholder="Σταθερό τηλέφωνο" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="customer_mobile" placeholder="Κινητό τηλέφωνο" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="customer_email" placeholder="Email" style="width: 100%;">
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="text" class="form-control" id="customer_usename" placeholder="Username" style="width: 100%;">
        </div>
        <div class="col-md-4">
           <input type="text" class="form-control" id="customer_password" placeholder="Password" style="width: 100%;">
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary pull-right" id="submit_customer">Αποθήκευση</button>
        </div>
    </div>
</form>
<script>
    $("body").off("click", "#submit_customer").on("click", "#submit_customer", function() {
        var customer_object = {
            "customer_type":        $("#customer_type_id").val(),
            "customer_status":      $("#customer_status_id").val(),
            "customer_name":        $("#customer_name").val(),
            "customer_lastname":    $("#customer_lastname").val(),
            "customer_address":     $("#customer_address").val(),
            "customer_address_no":  $("#customer_address_no").val(),
            "customer_telephone":   $("#customer_telephone").val(),
            "customer_mobile":      $("#customer_mobile").val(),
            "customer_email":       $("#customer_email").val(),
            "customer_usename":     $("#customer_username").val(),
            "customer_password":    $("#customer_password").val()
        }
        
        console.log(customer_object);
        
        $.ajax({
            type:   "post",
            url:    "/customer/save_customer",
            data:   {
                "customer": customer_object
            }
        }).done(function(data) {
            console.log(data);
        });
        
        
    });