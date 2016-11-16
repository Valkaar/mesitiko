<form class="form-inline" id="add_property_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Τύπος συναλλαγής</strong></span>
                <select class="form-control selectpicker" id="transaction_type_id" title="Επιλέξτε τύπο συναλλαγής..." required>
                    <?php foreach ($transaction_types as $transaction_type) { ?>
                        <?php
                        if (!empty($property_data) && isset($property_data["property_transaction_type_id"]) && $property_data["property_transaction_type_id"] == $transaction_type["transaction_type_id"]) {
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
                <span class="input-group-addon" style="width: 45%;"><strong>Τύπος ακινήτου</strong></span>
                <select class="form-control selectpicker" id="property_type_id" title="Επιλέξτε τύπο ακινήτου...">
                    <?php foreach ($property_types as $property_type) { ?>
                        <?php
                        if (!empty($property_data) && isset($property_data["property_property_type_id"]) && $property_data["property_property_type_id"] == $property_type["property_type_id"]) {
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
                <span class="input-group-addon" style="width: 45%;"><strong>Διαθεσιμότητα</strong></span>
                <select class="form-control selectpicker" id="property_status_id" title="Επιλέξτε διαθεσιμότητα...">
                    <?php foreach ($property_statuses as $property_status) { ?>
                        <?php
                        if (!empty($property_data) && isset($property_data["property_property_status_id"]) && $property_data["property_property_status_id"] == $property_status["property_status_id"]) {
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
                <span class="input-group-addon" style="width: 45%;"><strong>Νομός</strong></span>
                <select class="form-control selectpicker" id="prefecture_id" title="Επιλέξτε νομό...">
                    <?php foreach ($prefectures as $prefecture) { ?>
                        <?php
                        if (!empty($property_data) && isset($property_data["property_prefecture_id"]) && $property_data["property_prefecture_id"] == $prefecture["prefecture_id"]) {
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
                <span class="input-group-addon" style="width: 45%;"><strong>Δήμος</strong></span>
                <select class="form-control selectpicker" id="municipality_id" title="Επιλέξτε δήμο..." style="width: 100%;">
                    <?php foreach ($municipalities as $municipality) { ?>
                        <?php
                        if (!empty($property_data) && isset($property_data["property_municipality_id"]) && $property_data["property_municipality_id"] == $municipality["municipality_id"]) {
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
                <span class="input-group-addon" style="width: 45%;"><strong>Περιοχή</strong></span>
                <select class="form-control selectpicker" id="area_id" title="Επιλέξτε πόλη/χωριό..." style="width: 100%;">
                    <?php foreach ($areas as $area) { ?>
                        <?php
                        if (!empty($property_data) && isset($property_data["property_area_id"]) && $property_data["property_area_id"] == $area["area_id"]) {
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
                <span class="input-group-addon" style="width: 45%;"><strong>Διεύθυνση</strong></span>
                <input type="text" class="form-control" id="address" placeholder="Διεύθυνση"
                       value="<?= !empty($property_data) && isset($property_data["property_address"]) ? $property_data["property_address"] : ""; ?>">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="address_no" placeholder="Αριθμός"
                       value="<?= !empty($property_data) && isset($property_data["property_address_no"]) ? $property_data["property_address_no"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Τετραγωνικά μέτρα</strong></span>
                <input type="text" class="form-control" id="property_sqm" placeholder="Τετραγωνικά μέτρα" style="width: 100%;" required
                       value="<?= !empty($property_data) && isset($property_data["property_sqm"]) ? $property_data["property_sqm"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Θέρμανση</strong></span>
                <select class="form-control selectpicker" id="heating_id" title="Επιλέξτε τύπο θέρμανσης...">
                    <?php foreach ($heatings as $heating) { ?>
                        <?php
                        if (!empty($property_data) && isset($property_data["property_heating_id"]) && $property_data["property_heating_id"] == $heating["heating_id"]) {
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
        <div class="col-md-6">
            <textarea class="form-control" style="width:100%;" rows="5" cols="184" id="property_description" placeholder="Περιγραφή Ακινήτου"><?= !empty($property_data) && isset($property_data["property_description"]) ? $property_data["property_description"] : ""; ?></textarea>
        </div>
        <div class="col-md-6">
            <textarea class="form-control" style="width:100%;" rows="5" cols="184" id="property_description_en" placeholder="Περιγραφή Ακινήτου (Αγγλικά)"><?= !empty($property_data) && isset($property_data["property_description_en"]) ? $property_data["property_description_en"] : ""; ?></textarea>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Τιμή ακινήτου</strong></span>
                <input type="text" class="form-control" id="property_price" placeholder="Τιμή" style="width: 100%;"
                       value="<?= !empty($property_data) && isset($property_data["property_price"]) ? $property_data["property_price"] : ""; ?>">
                <span class="input-group-addon glyphicon glyphicon-euro"></span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Επίπεδα</strong></span>
                <input type="text" class="form-control" id="property_levels" placeholder="Επίπεδα" style="width: 100%;"
                       value="<?= !empty($property_data) && isset($property_data["property_levels"]) ? $property_data["property_levels"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Όροφος</strong></span>
                <input type="text" class="form-control" id="property_floor" placeholder="Όροφος" style="width: 100%;"
                       value="<?= !empty($property_data) && isset($property_data["property_floor"]) ? $property_data["property_floor"] : ""; ?>">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Έκταση μπαλκονιού</strong></span>
                <input type="text" class="form-control" id="balcony_sqm" placeholder="Τετραγωνικά μέτρα μπαλκονιού" style="width: 100%;"
                       value="<?= !empty($property_data) && isset($property_data["property_balcony_sqm"]) ? $property_data["property_balcony_sqm"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Έκταση κήπου</strong></span>
                <input type="text" class="form-control" id="garden_sqm" placeholder="Τετραγωνικά μέτρα κήπου" style="width: 100%;"
                       value="<?= !empty($property_data) && isset($property_data["property_garden_sqm"]) ? $property_data["property_garden_sqm"] : ""; ?>">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Ετικέτα ακινήτου</strong></span>
                <input type="text" class="form-control" id="property_label" placeholder="Ετικέτα ακινήτου" style="width: 100%;"
                       value="<?= !empty($property_data) && isset($property_data["property_label"]) ? $property_data["property_label"] : ""; ?>">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="checkbox" name="is_furnished" id="is_furnished">
        </div>
        <div class="col-md-4">
            <div class="col-md-6" id="has_fireplace_switch">
                <input type="checkbox" name="has_fireplace" id="has_fireplace" checked="false">
            </div>
            <div class="col-md-6" id="has_fireplace_input">
                <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 45%;"><strong>Αριθμός</strong></span>
                    <input type="text" class="form-control" style="width:100%;" placeholder="Αριθμός" name="fireplace_no" id="fireplace_no"
                       value="<?= !empty($property_data) && isset($property_data["property_label"]) ? $property_data["property_fireplace"] : ""; ?>">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-6" id="has_aircondition_switch">
                <input type="checkbox" name="has_aircondition" id="has_aircondition">
            </div>
            <div class="col-md-6" id="has_aircondition_input">
                <div class="input-group" style="width: 100%;">
                    <span class="input-group-addon" style="width: 45%;"><strong>Αριθμός</strong></span>
                    <input type="text" class="form-control" style="width:100%;" placeholder="Αριθμός" name="aircondition_no" id="aircondition_no"
                       value="<?= !empty($property_data) && isset($property_data["property_label"]) ? $property_data["propery_air_condition"] : ""; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary pull-right" id="submit_property">Αποθήκευση</button>
        </div>
    </div>
    <input type="hidden" id="is_edit" value="<?= !empty($property_data) ? 1 : 0; ?>">
    <input type="hidden" id="property_id" value="<?= !empty($property_data) ? $property_data["property_id"] : 0; ?>">
</form>
<script>
    $("#add_property_form").validate();

    $('#is_furnished').bootstrapSwitch({
        "onText": "Επιπλωμένο",
        "offText": "Μη επιπλωμένο",
        "state": true
    });
    $('#has_fireplace').bootstrapSwitch({
        "onText": "Τζάκι",
        "offText": "Χωρίς",
        "state": true
    });
    $('#has_aircondition').bootstrapSwitch({
        "onText": "A/C",
        "offText": "Χωρίς",
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

    $("body").off("click", "#submit_property").on("click", "#submit_property", function () {
        if (!$("#add_property_form").valid()) {
            return false;
        }
        var property_object = {
            "transaction_type": $("#transaction_type_id").val(),
            "property_type": $("#property_type_id").val(),
            "property_status": $("#property_status_id").val(),
            "property_prefecture": $("#prefecture_id").val(),
            "property_municipality": $("#municipality_id").val(),
            "property_area": $("#area_id").val(),
            "property_address": $("#address").val(),
            "property_address_no": $("#address_no").val(),
            "property_sqm": $("#property_sqm").val(),
            "heating_id": $("#heating_id").val(),
            "property_price": $("#property_price").val(),
            "property_levels": $("#property_levels").val(),
            "property_floor": $("#property_floor").val(),
            "property_balcony_sqm": $("#balcony_sqm").val(),
            "property_garden_sqm": $("#garden_sqm").val(),
            "property_description": $("#property_description").val(),
            "property_description_en": $("#property_description_en").val(),
            "property_label": $("#property_label").val(),
            
            "property_furnished": $('#is_furnished').bootstrapSwitch('state'),
            "has_fireplace": $('#has_fireplace').bootstrapSwitch('state'),
            "property_fireplace": $("#fireplace_no").val(),
            "has_aircondition": $('#has_aircondition').bootstrapSwitch('state'),
            "propery_air_condition": $("#aircondition_no").val(),
            
            "is_edit": $("#is_edit").val(),
            "property_id": $("#property_id").val(),
        };

        $.ajax({
            type: "post",
            url: "/property/save_property",
            data: {
                "property": property_object
            }
        }).done(function(data) {
            if ($("#is_edit").val() == 0) {
                $("#is_edit").val(1);
                $("#property_id").val(data);                
                window.location.href = "/property/edit_property/" + data;
            } else {
                window.location.href = "/property/edit_property/" + $("#property_id").val();                
            }
        });
    });
</script>