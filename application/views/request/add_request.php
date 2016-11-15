<form class="form-inline" id="add_request_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="transaction_type_id" title="Επιλέξτε τύπους συναλλαγής..." required>
                <?php foreach ($transaction_types as $transaction_type) { ?>
                <option value="<?= $transaction_type["transaction_type_id"]; ?>"><?= $transaction_type["transaction_type_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="property_type_id" title="Επιλέξτε τύπους ακινήτου..." required>
                <?php foreach ($property_types as $property_type) { ?>
                <option value="<?= $property_type["property_type_id"]; ?>"><?= $property_type["property_type_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="property_status_id" title="Επιλέξτε διαθεσιμότητες..." required>
                <?php foreach ($property_statuses as $property_status) { ?>
                <option value="<?= $property_status["property_status_id"]; ?>"><?= $property_status["property_status_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="prefecture_id" title="Επιλέξτε νομούς..." required>
                <?php foreach ($prefectures as $prefecture) { ?>
                <option value="<?= $prefecture["prefecture_id"]; ?>"><?= $prefecture["prefecture_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="municipality_id" title="Επιλέξτε δήμους..." required>
                <?php foreach ($municipalities as $municipality) { ?>
                <option value="<?= $municipality["municipality_id"]; ?>"><?= $municipality["municipality_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="area_id" title="Επιλέξτε πόλεις/χωριά..." required> 
                <?php foreach ($areas as $area) { ?>
                <option value="<?= $area["area_id"]; ?>"><?= $area["area_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="request_sqm_from" placeholder="Τ.Μ από" required>
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="request_sqm_to" placeholder="Τ.Μ έως" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="request_balcony_sqm_from" placeholder="Τ.Μ μπαλκονιού από" required>
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="request_balcony_sqm_to" placeholder="Τ.Μ μπαλκονιού έως" required>
            </div>
        </div>
        <div class="col-md-4">
            <select class="form-control selectpicker" multiple id="request_heating_id" title="Επιλέξτε τύπους θέρμανσης..." required>
                <?php foreach ($heatings as $heating) { ?>
                <option value="<?= $heating["heating_id"]; ?>"><?= $heating["heating_label"]; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
             <div class="input-group">
                <input type="text" class="form-control" id="price_from" placeholder="Τιμή από" required> 
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="price_to" placeholder="Τιμή έως" required>
            </div>           
        </div>
        <div class="col-md-4">
           <input type="text" class="form-control" id="property_levels" placeholder="Επίπεδα" style="width: 100%;" required>
        </div>
        <div class="col-md-4">
           <input type="text" class="form-control" id="property_floor" placeholder="Όροφος" style="width: 100%;" required>
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="pool_sqm_from" placeholder="Τ.Μ πισίνας από" required>
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="pool_sqm_to" placeholder="Τ.Μ πισίνας έως" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" class="form-control" id="garden_sqm_from" placeholder="Τ.Μ κήπου από" required>
                <span class="input-group-addon"></span>
                <input type="text" class="form-control" id="garden_sqm_to" placeholder="Τ.Μ κήπου έως" required>
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
            <button type="button" class="btn btn-primary pull-right" id="submit_request">Αποθήκευση</button>
        </div>
    </div>
</form>
<script>
    
    $("#add_request_form").validate();

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
    
    $("body").off("click", "#submit_request").on("click", "#submit_request", function() {
        if (!$("#add_request_form").valid()) {
            return false;
        }
        var request_object = {
            "transaction_type": $("#transaction_type_id").val(),
            "property_type":    $("#property_type_id").val(),
            "property_status":  $("#property_status_id").val(),
            "prefecture_id":    $("#prefecture_id").val(),
            "municipality_id":  $("#municipality_id").val(),
            "area_id":          $("#area_id").val(),
            "sqm_from":         $("#request_sqm_from").val(),
            "sqm_to":           $("#request_sqm_to").val(),
            "balcony_sqm_from": $("#request_balcony_sqm_from").val(),
            "balcony_sqm_to":   $("#request_balcony_sqm_to").val(),
            "heating":          $("#heating_id").val(),            
            "price_from":       $("#request_price_from").val(),
            "price_to":         $("#request_price_to").val(),
            "property_levels":  $("#property_levels").val(),
            "property_floor":   $("#property_floor").val(),            
            "pool_sqm_from":    $("#pool_sqm_from").val(),
            "pool_sqm_to":      $("#pool_sqm_to").val(),
            "garden_sqm_from":  $("#garden_sqm_from").val(),
            "garden_sqm_to":    $("#garden_sqm_to").val(),
            "fireplace_no":     $("#fireplace_no").val(),            
            "aircondition_no":  $("#aircondition_no").val(),            
            
                                
            "is_furnished":     $('#is_furnished').bootstrapSwitch('state'),
            "has_fireplace":    $('#has_fireplace').bootstrapSwitch('state'),
            "has_aircondition": $('#has_aircondition').bootstrapSwitch('state')
        }
        
        $.ajax({
            type:   "post",
            url:    "/request/save_request",
            data:   {
                "request": request_object
            }
        }).done(function(data) {
            console.log(data);
        });
       
       
    });
</script>