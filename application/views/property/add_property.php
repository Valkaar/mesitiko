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
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
</form>