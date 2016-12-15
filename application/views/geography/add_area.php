<form class="form-inline" id="add_area_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Όνομα νομού</strong></span>
                <input type="text" class="form-control" id="area_label" placeholder="Όνομα νομού" style="width: 100%;"
                       value="<?= !empty($area_data) && isset($area_data["area_label"]) ? $area_data["area_label"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Δήμος</strong></span>
                <select class="form-control selectpicker" id="area_municipality_id" title="Επιλέξτε δήμο..." style="width: 100%;">
                    <?php foreach ($municipalities as $municipality) { ?>
                        <?php
                        if (!empty($municipality_data) && isset($municipality_data["area_municipality_id"]) && $municipality_data["area_municipality_id"] == $municipality["municipality_id"]) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $municipality["municipality_id"]; ?>"<?= $selected; ?>><?= $municipality["municipality_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Γεωγραφικό πλάτος</strong></span>
                <input type="text" class="form-control" id="area_latitude" placeholder="Γεωγραφικό πλάτος" style="width: 100%;"
                       value="<?= !empty($area_data) && isset($area_data["area_latitude"]) ? $area_data["area_latitude"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Γεωγραφικό μήκος</strong></span>
                <input type="text" class="form-control" id="area_longitude" placeholder="Γεωγραφικό μήκος" style="width: 100%;"
                       value="<?= !empty($area_data) && isset($area_data["area_longitude"]) ? $area_data["area_longitude"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Επίπεδο Zoom</strong></span>
                <input type="text" class="form-control" id="area_zoom" placeholder="Επίπεδο Zoom" style="width: 100%;"
                       value="<?= !empty($area_data) && isset($area_data["area_zoom"]) ? $area_data["area_zoom"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Ακτίνα</strong></span>
                <input type="text" class="form-control" id="area_radius" placeholder="Ακτίνα" style="width: 100%;"
                       value="<?= !empty($area_data) && isset($area_data["area_radius"]) ? $area_data["area_radius"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-warning pull-left" style="width: 100%;" id="back_to_list">Επιστροφή στη λίστα</button>                        
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-danger pull-left" style="width: 100%;" id="clear_form">Καθαρισμός φόρμας</button>                        
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-success pull-right" style="width: 100%;" id="submit_area_clear">Αποθήκευση και καθαρισμός</button>            
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-primary pull-right" style="width: 100%;" id="submit_area">Αποθήκευση και επιστροφή</button>            
            </div>
        </div>
        <div class="col-md-8">
            <div id="map_container" class="map_container"></div>
        </div>
    </div>

    <input type="hidden" id="is_edit" value="<?= !empty($area_data) ? 1 : 0; ?>">
    <input type="hidden" id="area_id" value="<?= !empty($area_data) ? $area_data["area_id"] : 0; ?>">
</form>
<script>
    $("body").off("click", "#back_to_list").on("click", "#back_to_list", function () {
        window.location.href = "<?= base_url(); ?>geography/area_list";
    });
    $("body").off("click", "#clear_form").on("click", "#clear_form", function () {
        window.location.href = "<?= base_url(); ?>geography/add_area";
    });

    $("body").off("click", "#submit_area_remain, #submit_area_clear, #submit_area").on("click", "#submit_area_remain, #submit_area_clear, #submit_area", function() {
        var that = this;

        var area_object = {
            area_label: $("#area_label").val(),
            area_latitude: $("#area_latitude").val(),
            area_longitude: $("#area_longitude").val(),
            area_zoom: $("#area_zoom").val(),
            area_radius: $("#area_radius").val(),
            
            area_municipality_id: $("#area_municipality_id").val(),

            is_edit: $("#is_edit").val(),
            area_id: $("#area_id").val()
        };

        $.ajax({
            type: "post",
            url: "<?= base_url(); ?>geography/save_area",
            data: {
                "area": area_object
            }
        }).done(function(data) {
            if ($("#is_edit").val() == 0) {
                $("#is_edit").val(1);
                $("#request_id").val(data);                
            }

            if ($(that).attr("id") === "submit_area_remain") {
                window.location.href = "<?= base_url(); ?>geography/edit_area/" + data;
            } else if ($(that).attr("id") === "submit_area_clear") {
                window.location.href = "<?= base_url(); ?>geography/add_area";
            } else if ($(that).attr("id") === "submit_area") {
                window.location.href = "<?= base_url(); ?>geography/area_list";                
            }
        });
    });

    var map, marker, circle;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map_container'), {
            center: {lat: <?= !empty($area_data) ? $area_data["area_latitude"] : 38.7262675; ?>, 
                    lng: <?= !empty($area_data) ? $area_data["area_longitude"] : 23.3699379; ?>},
            zoom: <?= !empty($area_data) ? $area_data["area_zoom"] : 7; ?>
        });

        <?php if (!empty($area_data)) { ?>
            marker = new google.maps.Marker({
                position: {lat: <?= !empty($area_data) ? $area_data["area_latitude"] : 38.7262675; ?>, 
                            lng: <?= !empty($area_data) ? $area_data["area_longitude"] : 23.3699379; ?>},
                map: map,
                draggable: true
            });

            circle = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: {lat: <?= !empty($area_data) ? $area_data["area_latitude"] : 38.7262675; ?>, 
                        lng: <?= !empty($area_data) ? $area_data["area_longitude"] : 23.3699379; ?>},
                radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 1700; ?>
            });

            marker.addListener("drag", function (event) {
                $("#area_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                $("#area_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                circle.setCenter(event.latLng);
            });
        <?php } ?>

        map.addListener('click', function (event) {
            if (typeof marker === "undefined") {
                marker = new google.maps.Marker({
                    position: event.latLng,
                    map: map,
                    draggable: true
                });

                circle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: map,
                    center: event.latLng,
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 1700; ?>
                });
            } else {
                marker.setPosition(event.latLng);

                circle.setCenter(event.latLng);
            }

            marker.addListener("drag", function (event) {
                $("#area_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                $("#area_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                circle.setCenter(event.latLng);
            });

            $("#area_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
            $("#area_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));
            $("#area_zoom").val(map.getZoom());
            $("#area_radius").val(circle.getRadius());
        });

        map.addListener('zoom_changed', function (event) {
            $("#area_zoom").val(map.getZoom());
        });
    }

    $("body").off("input", "#area_latitude").on("input", "#area_latitude", function () {
        if (typeof marker !== "undefined") {
            marker.setPosition({lat: parseFloat($("#area_latitude").val()), lng: parseFloat($("#area_longitude").val())});

            circle.setCenter({lat: parseFloat($("#area_latitude").val()), lng: parseFloat($("#area_longitude").val())});
        } else {
            if ($("#area_longitude").val() !== "") {
                marker = new google.maps.Marker({
                    position: {lat: parseFloat($("#area_latitude").val()), lng: parseFloat($("#area_longitude").val())},
                    map: map,
                    draggable: true
                });

                circle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: map,
                    center: {lat: parseFloat($("#area_latitude").val()), lng: parseFloat($("#area_longitude").val())},
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 1700; ?>
                });

                marker.addListener("drag", function (event) {
                    $("#area_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                    $("#area_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                    circle.setCenter(event.latLng);
                });
                $("#area_zoom").val(map.getZoom());
                $("#area_radius").val(circle.getRadius());
            }
        }
    });

    $("body").off("input", "#area_longitude").on("input", "#area_longitude", function () {
        if (typeof marker !== "undefined") {
            marker.setPosition({lat: parseFloat($("#area_latitude").val()), lng: parseFloat($("#area_longitude").val())});

            circle.setCenter({lat: parseFloat($("#area_latitude").val()), lng: parseFloat($("#area_longitude").val())});
        } else {
            if ($("#area_latitude").val() !== "") {
                marker = new google.maps.Marker({
                    position: {lat: parseFloat($("#area_latitude").val()), lng: parseFloat($("#area_longitude").val())},
                    map: map,
                    draggable: true
                });

                circle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#FF0000',
                    fillOpacity: 0.35,
                    map: map,
                    center: {lat: parseFloat($("#area_latitude").val()), lng: parseFloat($("#area_longitude").val())},
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 1700; ?>
                });

                marker.addListener("drag", function (event) {
                    $("#area_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                    $("#area_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                    circle.setCenter(event.latLng);
                });
                $("#area_zoom").val(map.getZoom());
                $("#area_radius").val(circle.getRadius());
            }
        }
    });
    
    $("body").off("input", "#area_zoom").on("input", "#area_zoom", function() {
        if ($("#area_zoom").val() !== "" && !isNaN($("#area_zoom").val())) {
            map.setZoom(parseInt($("#area_zoom").val()));
        }
    });
    
    $("body").off("input", "#area_radius").on("input", "#area_radius", function() {
        if (typeof marker !== "undefined" && !isNaN($("#area_radius").val())) {
            circle.setRadius(parseInt($("#area_radius").val()));
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-Q_DOviiI1d5lCHmL76KaQ1jVtCFjl14&callback=initMap" async defer></script>