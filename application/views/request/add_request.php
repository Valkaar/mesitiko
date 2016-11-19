<form class="form-inline" id="add_request_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Τύπος συναλλαγής</strong></span>
                <select class="form-control selectpicker" id="transaction_type_id" title="Επιλέξτε τύπο συναλλαγής..." required>
                    <?php foreach ($transaction_types as $transaction_type) { ?>
                        <?php
                        if (!empty($request_data) && isset($request_data["request_transaction_type_id"]) && $request_data["request_transaction_type_id"] == $transaction_type["transaction_type_id"]) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $transaction_type["transaction_type_id"]; ?>"<?= $selected; ?>><?= $transaction_type["transaction_type_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Τύποι ακινήτων</strong></span>
                <select class="form-control selectpicker" multiple id="property_type_id" title="Επιλέξτε τύπους ακινήτου..." required>
                    <?php foreach ($property_types as $property_type) { ?>
                        <?php
                        if (!empty($request_type_data) && is_array($request_type_data) && in_array($property_type["property_type_id"], $request_type_data)) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $property_type["property_type_id"]; ?>"<?= $selected; ?>><?= $property_type["property_type_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Διαθεσιμότητες</strong></span>
                <select class="form-control selectpicker" multiple id="property_status_id" title="Επιλέξτε διαθεσιμότητες..." required>
                    <?php foreach ($property_statuses as $property_status) { ?>
                        <?php
                        if (!empty($request_status_data) && is_array($request_status_data) && in_array($property_status["property_status_id"], $request_status_data)) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $property_status["property_status_id"]; ?>"<?= $selected; ?>><?= $property_status["property_status_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Νομοί</strong></span>
                <select class="form-control selectpicker" multiple id="prefecture_id" title="Επιλέξτε νομούς..." required>
                    <?php foreach ($prefectures as $prefecture) { ?>
                        <?php
                        if (!empty($request_prefecture_data) && is_array($request_prefecture_data) && in_array($prefecture["prefecture_id"], $request_prefecture_data)) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $prefecture["prefecture_id"]; ?>"<?= $selected; ?>><?= $prefecture["prefecture_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Δήμοι</strong></span>
                <select class="form-control selectpicker" multiple id="municipality_id" title="Επιλέξτε δήμους..." required>
                    <?php foreach ($municipalities as $municipality) { ?>
                        <?php
                        if (!empty($request_municipality_data) && is_array($request_municipality_data) && in_array($municipality["municipality_id"], $request_municipality_data)) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $municipality["municipality_id"]; ?>"<?= $selected; ?>><?= $municipality["municipality_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Περιοχές</strong></span>
                <select class="form-control selectpicker" multiple id="area_id" title="Επιλέξτε πόλεις/χωριά..." required> 
                    <?php foreach ($areas as $area) { ?>
                        <?php
                        if (!empty($request_area_data) && is_array($request_area_data) && in_array($area["area_id"], $request_area_data)) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $area["area_id"]; ?>"<?= $selected; ?>><?= $area["area_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Τ.Μ.</strong></span>
                <input type="text" class="form-control" id="request_sqm_from" placeholder="Τ.Μ. από" required
                       value="<?= !empty($request_data) && isset($request_data["request_sqm_from"]) ? $request_data["request_sqm_from"] : ""; ?>">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="request_sqm_to" placeholder="Τ.Μ. έως" required
                       value="<?= !empty($request_data) && isset($request_data["request_sqm_to"]) ? $request_data["request_sqm_to"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Τ.Μ. μπαλκονιού</strong></span>
                <input type="text" class="form-control" id="request_balcony_sqm_from" placeholder="Τ.Μ μπαλκονιού από" required
                       value="<?= !empty($request_data) && isset($request_data["request_balcony_sqm_from"]) ? $request_data["request_balcony_sqm_from"] : ""; ?>">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="request_balcony_sqm_to" placeholder="Τ.Μ μπαλκονιού έως" required
                       value="<?= !empty($request_data) && isset($request_data["request_balcony_sqm_to"]) ? $request_data["request_balcony_sqm_to"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Θέρμανση</strong></span>
                <select class="form-control selectpicker" multiple id="request_heating_id" title="Επιλέξτε τύπους θέρμανσης..." required>
                    <?php foreach ($heatings as $heating) { ?>
                        <?php
                        if (!empty($request_heating_data) && is_array($request_heating_data) && in_array($heating["heating_id"], $request_heating_data)) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $heating["heating_id"]; ?>"<?= $selected; ?>><?= $heating["heating_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Τιμή</strong></span>
                <input type="text" class="form-control" id="price_from" placeholder="Τιμή από" required
                       value="<?= !empty($request_data) && isset($request_data["request_price_from"]) ? $request_data["request_price_from"] : ""; ?>"> 
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="price_to" placeholder="Τιμή έως" required
                       value="<?= !empty($request_data) && isset($request_data["request_price_to"]) ? $request_data["request_price_to"] : ""; ?>">
            </div>           
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Επίπεδα</strong></span>
                <input type="text" class="form-control" id="property_levels" placeholder="Επίπεδα" style="width: 100%;" required
                       value="<?= !empty($request_data) && isset($request_data["request_levels"]) ? $request_data["request_levels"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Όροφος</strong></span>
                <input type="text" class="form-control" id="property_floor" placeholder="Όροφος" style="width: 100%;" required
                       value="<?= !empty($request_data) && isset($request_data["request_floor"]) ? $request_data["request_floor"] : ""; ?>">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Τ.Μ. πισίνας</strong></span>
                <input type="text" class="form-control" id="pool_sqm_from" placeholder="Τ.Μ. πισίνας από" required
                       value="<?= !empty($request_data) && isset($request_data["request_pool_sqm_from"]) ? $request_data["request_pool_sqm_from"] : ""; ?>">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="pool_sqm_to" placeholder="Τ.Μ. πισίνας έως" required
                       value="<?= !empty($request_data) && isset($request_data["request_pool_sqm_to"]) ? $request_data["request_pool_sqm_to"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 30%;"><strong>Τ.Μ. κήπου</strong></span>
                <input type="text" class="form-control" id="garden_sqm_from" placeholder="Τ.Μ. κήπου από" required
                       value="<?= !empty($request_data) && isset($request_data["request_garden_sqm_from"]) ? $request_data["request_garden_sqm_from"] : ""; ?>">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="garden_sqm_to" placeholder="Τ.Μ. κήπου έως" required
                       value="<?= !empty($request_data) && isset($request_data["request_garden_sqm_to"]) ? $request_data["request_garden_sqm_to"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="checkbox" name="is_furnished" id="is_furnished">
        </div>
        <div class="col-md-4">
            <div class="col-md-6" id="has_fireplace_switch">
                <input type="checkbox" name="has_fireplace" id="has_fireplace">
            </div>
            <div class="col-md-6" id="has_fireplace_input">
                <input type="text" class="form-control" style="width:100%;" placeholder="Αριθμός" name="fireplace_no" id="fireplace_no"
                       value="<?= !empty($request_data) && isset($request_data["request_fireplace"]) ? $request_data["request_fireplace"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-6" id="has_aircondition_switch">
                <input type="checkbox" name="has_aircondition" id="has_aircondition">
            </div>
            <div class="col-md-6" id="has_aircondition_input">
                <input type="text" class="form-control" style="width:100%;" placeholder="Αριθμός" name="aircondition_no" id="aircondition_no"
                       value="<?= !empty($request_data) && isset($request_data["request_air_condition"]) ? $request_data["request_air_condition"] : ""; ?>">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <button type="button" class="btn btn-primary pull-right" id="submit_request">Αποθήκευση</button>
        </div>
    </div>
    <input type="hidden" id="is_edit" value="<?= !empty($request_data) ? 1 : 0; ?>">
    <input type="hidden" id="request_id" value="<?= !empty($request_data) ? $request_data["request_id"] : 0; ?>">
</form>
<script>

    $("#add_request_form").validate();

    $('#is_furnished').bootstrapSwitch({
        "onText": "Επιπλωμένο",
        "offText": "Αδιάφορο",
        "state": true
    });
    $('#has_fireplace').bootstrapSwitch({
        "onText": "Τζάκι",
        "offText": "Αδιάφορο",
        "state": true
    });
    $('#has_aircondition').bootstrapSwitch({
        "onText": "A/C",
        "offText": "Αδιάφορο",
        "state": true
    });

    $('#has_fireplace, #has_aircondition').on('switchChange.bootstrapSwitch', function (event, state) {
        if (state) {
            $("#" + event.currentTarget.id + "_switch").addClass("col-md-6");
            $("#" + event.currentTarget.id + "_switch").removeClass("col-md-12");

            $("#" + event.currentTarget.id + "_input").show();
        } else {
            $("#" + event.currentTarget.id + "_switch").removeClass("col-md-6");
            $("#" + event.currentTarget.id + "_switch").addClass("col-md-12");

            $("#" + event.currentTarget.id + "_input").hide();
        }
    });

    $("body").off("click", "#submit_request").on("click", "#submit_request", function () {
        if (!$("#add_request_form").valid()) {
            return false;
        }

        var request_object = {
            "transaction_type": $("#transaction_type_id").val(),
            "property_type": $("#property_type_id").val(),
            "property_status": $("#property_status_id").val(),
            "prefecture_id": $("#prefecture_id").val(),
            "municipality_id": $("#municipality_id").val(),
            "area_id": $("#area_id").val(),
            "sqm_from": $("#request_sqm_from").val(),
            "sqm_to": $("#request_sqm_to").val(),
            "balcony_sqm_from": $("#request_balcony_sqm_from").val(),
            "balcony_sqm_to": $("#request_balcony_sqm_to").val(),
            "heating": $("#request_heating_id").val(),
            "price_from": $("#price_from").val(),
            "price_to": $("#price_to").val(),
            "property_levels": $("#property_levels").val(),
            "property_floor": $("#property_floor").val(),
            "pool_sqm_from": $("#pool_sqm_from").val(),
            "pool_sqm_to": $("#pool_sqm_to").val(),
            "garden_sqm_from": $("#garden_sqm_from").val(),
            "garden_sqm_to": $("#garden_sqm_to").val(),
            "fireplace_no": $("#fireplace_no").val(),
            "aircondition_no": $("#aircondition_no").val(),
            "is_furnished": $('#is_furnished').bootstrapSwitch('state'),
            "has_fireplace": $('#has_fireplace').bootstrapSwitch('state'),
            "has_aircondition": $('#has_aircondition').bootstrapSwitch('state'),
            
            "is_edit": $("#is_edit").val(),
            "request_id": $("#request_id").val(),
        }

        $.ajax({
            type: "post",
            url: "/request/save_request",
            data: {
                "request": request_object
            }
        }).done(function (data) {
            if ($("#is_edit").val() == 0) {
                $("#is_edit").val(1);
                $("#request_id").val(data);                
                window.location.href = "/request/edit_request/" + data;
            } else {
                window.location.href = "/request/edit_request/" + $("#request_id").val();                
            }
        });


    });
</script>