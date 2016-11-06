<form class="form-inline">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="transaction_type_id" title="Επιλέξτε τύπους συναλλαγής...">
                <?php foreach ($transaction_types as $transaction_type) { ?>
                <option value="<?= $transaction_type["transaction_type_id"]; ?>"><?= $transaction_type["transaction_type_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="property_type_id" title="Επιλέξτε τύπους ακινήτου...">
                <?php foreach ($property_types as $property_type) { ?>
                <option value="<?= $property_type["property_type_id"]; ?>"><?= $property_type["property_type_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="property_status_id" title="Επιλέξτε διαθεσιμότητες...">
                <?php foreach ($property_statuses as $property_status) { ?>
                <option value="<?= $property_status["property_status_id"]; ?>"><?= $property_status["property_status_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="prefecture_id" title="Επιλέξτε νομούς...">
                <?php foreach ($prefectures as $prefecture) { ?>
                <option value="<?= $prefecture["prefecture_id"]; ?>"><?= $prefecture["prefecture_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="municipality_id" title="Επιλέξτε δήμους...">
                <?php foreach ($municipalities as $municipality) { ?>
                <option value="<?= $municipality["municipality_id"]; ?>"><?= $municipality["municipality_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="area_id" title="Επιλέξτε πόλεις/χωριά...">
                <?php foreach ($areas as $area) { ?>
                <option value="<?= $area["area_id"]; ?>"><?= $area["area_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="sqm_from" placeholder="Τ.Μ από">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="sqm_to" placeholder="Τ.Μ έως">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="balcony_sqm_from" placeholder="Τ.Μ μπαλκονιού από">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="balcony_sqm_to" placeholder="Τ.Μ μπαλκονιού έως">
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="heating_id" title="Επιλέξτε τύπους θέρμανσης...">
                <?php foreach ($heatings as $heating) { ?>
                <option value="<?= $heating["heating_id"]; ?>"><?= $heating["heating_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
             <div class="input-group">
                <input type="text" class="form-control" id="price_from" placeholder="Τιμή από">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="price_to" placeholder="Τιμή έως">
            </div>           
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
            <div class="input-group">
                <input type="text" class="form-control" id="pool_sqm_from" placeholder="Τ.Μ πισίνας από">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="pool_sqm_to" placeholder="Τ.Μ πισίνας έως">
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="garden_sqm_from" placeholder="Τ.Μ κήπου από">
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="garden_sqm_to" placeholder="Τ.Μ κήπου έως">
            </div>
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="property_description" placeholder="Περιγραφή ακινήτου" style="width: 100%;">
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
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
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
            "transaction_type": $("#transaction_type_id").val(),
            "property_type":    $("#property_type_id").val(),
            
            
            
            "is_furnished":     $('#is_furnished').bootstrapSwitch('state'),
            "has_fireplace":    $('#has_fireplace').bootstrapSwitch('state'),
            "has_aircondition": $('#has_aircondition').bootstrapSwitch('state')
        }
    });
</script>