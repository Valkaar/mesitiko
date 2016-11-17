<form class="form-inline" id="add_customer_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Τύπος πελάτη</strong></span>
                <select class="form-control selectpicker" id="customer_type" title="Επιλέξτε τύπο πελάτη...">
                    <?php foreach ($customer_types as $customer_type) { ?>
                        <?php
                        if (!empty($customer_data) && isset($customer_data["customer_customer_type_id"]) && $customer_data["customer_customer_type_id"] == $customer_type["customer_type_id"]) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $customer_type["customer_type_id"]; ?>"<?= $selected; ?>><?= $customer_type["customer_type_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Κατάσταση πελάτη</strong></span>
                <select class="form-control selectpicker" id="customer_status" title="Επιλέξτε κατάσταση πελάτη...">
                    <?php foreach ($customer_statuses as $customer_status) { ?>
                        <?php
                        if (!empty($customer_data) && isset($customer_data["customer_customer_status_id"]) && $customer_data["customer_customer_status_id"] == $customer_status["customer_status_id"]) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $customer_status["customer_status_id"]; ?>"<?= $selected; ?>><?= $customer_status["customer_status_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Όνομα πελάτη</strong></span>
                <input type="text" class="form-control" id="customer_name" placeholder="Όνομα" style="width: 100%;"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_name"]) ? $customer_data["customer_name"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Επίθετο πελάτη</strong></span>
                <input type="text" class="form-control" id="customer_lastname" placeholder="Επίθετο" style="width: 100%;"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_lastname"]) ? $customer_data["customer_lastname"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Διεύθυνση πελάτη</strong></span>
                <input type="text" class="form-control" id="customer_address" placeholder="Διεύθυνση"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_address"]) ? $customer_data["customer_address"] : ""; ?>">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="customer_address_no" placeholder="Αριθμός"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_address_no"]) ? $customer_data["customer_address_no"] : ""; ?>">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Σταθερό τηλ.</strong></span>
                <input type="text" class="form-control" id="customer_telephone" placeholder="Σταθερό τηλέφωνο" style="width: 100%;"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_telephone"]) ? $customer_data["customer_telephone"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Κινητό τηλ.</strong></span>
                <input type="text" class="form-control" id="customer_mobile" placeholder="Κινητό τηλέφωνο" style="width: 100%;"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_mobile"]) ? $customer_data["customer_mobile"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>E-mail πελάτη</strong></span>
                <input type="text" class="form-control" id="customer_email" placeholder="Email" style="width: 100%;"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_email"]) ? $customer_data["customer_email"] : ""; ?>">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Όνομα χρήστη</strong></span>
                <input type="text" class="form-control" id="customer_username" placeholder="Όνομα χρήστη" style="width: 100%;"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_username"]) ? $customer_data["customer_username"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Κωδικός χρήστη</strong></span>
                <input type="password" class="form-control" id="customer_password" placeholder="Κωδικός" style="width: 100%;"
                       value="<?= !empty($customer_data) && isset($customer_data["customer_password"]) ? $customer_data["customer_password"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Επιβεβαίωση</strong></span>
                <input type="password" class="form-control" id="customer_password_repeat" placeholder="Επιβεβαίωση κωδικού" style="width: 100%;" value="">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary pull-right" id="submit_customer">Αποθήκευση</button>
        </div>
    </div>
    <input type="hidden" id="is_edit" value="<?= !empty($customer_data) ? 1 : 0; ?>">
    <input type="hidden" id="customer_id" value="<?= !empty($customer_data) ? $customer_data["customer_id"] : 0; ?>">
</form>
<script>

    $("#add_customer_form").validate();

    $("body").off("click", "#submit_customer").on("click", "#submit_customer", function () {
        if (!$("#add_customer_form").valid()) {
            return false;
        }

        var customer_object = {
            "customer_type": $("#customer_type").val(),
            "customer_status": $("#customer_status").val(),
            "customer_name": $("#customer_name").val(),
            "customer_lastname": $("#customer_lastname").val(),
            "customer_address": $("#customer_address").val(),
            "customer_address_no": $("#customer_address_no").val(),
            "customer_telephone": $("#customer_telephone").val(),
            "customer_mobile": $("#customer_mobile").val(),
            "customer_email": $("#customer_email").val(),
            "customer_username": $("#customer_username").val(),
            "customer_password": $("#customer_password").val(),
            
            "is_edit": $("#is_edit").val(),
            "customer_id": $("#customer_id").val()
        };

        $.ajax({
            type: "post",
            url: "/customer/save_customer",
            data: {
                "customer": customer_object
            }
        }).done(function (data) {
            if ($("#is_edit").val() == 0) {
                $("#is_edit").val(1);
                $("#customer_id").val(data);                
                window.location.href = "/customer/edit_customer/" + data;
            } else {
                window.location.href = "/customer/edit_customer/" + $("#customer_id").val();                
            }
        });


    });
</script>