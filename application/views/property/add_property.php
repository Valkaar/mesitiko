<form class="form-inline">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <select class="form-control selectpicker" id="transaction_type_id" title="Επιλέξτε τύπο συναλλαγής...">
                <?php foreach ($transaction_types as $transaction_type) { ?>
                <option value="<?= $transaction_type["transaction_type_id"]; ?>"><?= $transaction_type["transaction_type_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" id="property_type_id" title="Επιλέξτε τύπο ακινήτου...">
                <?php foreach ($property_types as $property_type) { ?>
                <option value="<?= $property_type["property_type_id"]; ?>"><?= $property_type["property_type_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" id="property_status_id" title="Επιλέξτε διαθεσιμότητα...">
                <?php foreach ($property_statuses as $property_status) { ?>
                <option value="<?= $property_status["property_status_id"]; ?>"><?= $property_status["property_status_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <select class="form-control selectpicker" id="prefecture_id" title="Επιλέξτε νομό...">
                <?php foreach ($prefectures as $prefecture) { ?>
                <option value="<?= $prefecture["prefecture_id"]; ?>"><?= $prefecture["prefecture_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" id="municipality_id" title="Επιλέξτε δήμο...">
                <?php foreach ($municipalities as $municipality) { ?>
                <option value="<?= $municipality["municipality_id"]; ?>"><?= $municipality["municipality_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" id="area_id" title="Επιλέξτε πόλη/χωριό...">
                <?php foreach ($areas as $area) { ?>
                <option value="<?= $area["area_id"]; ?>"><?= $area["area_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="address" placeholder="Διεύθυνση">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="address_no" placeholder="Αριθμός">
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="property_sqm" placeholder="Τετραγωνικά μέτρα" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" id="heating_id" title="Επιλέξτε τύπο θέρμανσης...">
                <?php foreach ($heatings as $heating) { ?>
                <option value="<?= $heating["heating_id"]; ?>"><?= $heating["heating_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-8">
            <textarea class="form-control" rows="5" cols="184" id="property_description" placeholder="Περιγραφή Ακινήτου"></textarea>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="text" class="form-control" id="property_price" placeholder="Τιμή" style="width: 100%;">
        </div>
        <div class="col-md-4">
           <input type="text" class="form-control" id="property_levels" placeholder="Επίπεδα" style="width: 100%;">
        </div>
        <div class="col-md-4">
           <input type="text" class="form-control" id="property_floor" placeholder="Όροφος" style="width: 100%;">
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <input type="text" class="form-control" id="balcony_sqm" placeholder="Τετραγωνικά μέτρα μπαλκονιού" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="garden_sqm" placeholder="Τετραγωνικά μέτρα κήπου" style="width: 100%;">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="property_label" placeholder="Ετικέτα ακινήτου" style="width: 100%;">
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
                <input type="text" class="form-control" style="width:100%;" placeholder="Αριθμός" name="fireplace_no" id="fireplace_no">
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-6" id="has_aircondition_switch">
                <input type="checkbox" name="has_aircondition" id="has_aircondition">
            </div>
            <div class="col-md-6" id="has_aircondition_input">
                <input type="text" class="form-control" style="width:100%;" placeholder="Αριθμός" name="aircondition_no" id="aircondition_no">
            </div>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary pull-right" id="submit_property">Αποθήκευση</button>
        </div>
    </div>
</form>
<script>
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
    
    $('#has_fireplace, #has_aircondition').on('switchChange.bootstrapSwitch', function(event, state) {
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
    
    $("body").off("click", "#submit_property").on("click", "#submit_property", function() {
        var property_object = {
            "transaction_type":     $("#transaction_type_id").val(),
            "property_type":        $("#property_type_id").val(),
            "property_status":      $("#property_status_id").val(),
            "prefecture":           $("#property_prefecture_id").val(),
            "municipality":         $("#property_municipallity_id").val(),
            "area":                 $("#property_area_id").val(),
            "address":              $("#property_address").val(),
            "address_no":           $("#property_address_no").val(),
            "property_sqm":         $("#property_sqm").val(),
            "heating_id":           $("#property_heating_id").val(),
            "property_price":       $("#property_price").val(),
            "property_levels":      $("#property_levels").val(),
            "property_floor":       $("#property_floor").val(),
            "balcony_sqm":          $("#property_balcony_sqm").val(),
            "garden_sqm":           $("#property_garden_sqm").val(),
            "property_description": $("#property_description").val(),
                     
            "is_furnished":     $('#is_furnished').bootstrapSwitch('state'),
            "has_fireplace":    $('#has_fireplace').bootstrapSwitch('state'),
            "has_aircondition": $('#has_aircondition').bootstrapSwitch('state')
        }
        
        $.ajax({
            type:   "post",
            url:    "/property/save_property",
            data:   {
                "property": property_object
            }
        }).done(function(data) {
            console.log(data);
        });
        
        console.log(property_object);
    });
</script>