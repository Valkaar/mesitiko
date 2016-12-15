<form class="form-inline" id="add_municipality_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Όνομα νομού</strong></span>
                <input type="text" class="form-control" id="municipality_label" placeholder="Όνομα νομού" style="width: 100%;"
                       value="<?= !empty($municipality_data) && isset($municipality_data["municipality_label"]) ? $municipality_data["municipality_label"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Νομός</strong></span>
                <select class="form-control selectpicker" id="municipality_prefecture_id" title="Επιλέξτε νομό...">
                    <?php foreach ($prefectures as $prefecture) { ?>
                        <?php
                        if (!empty($municipality_data) && isset($municipality_data["municipality_prefecture_id"]) && $municipality_data["municipality_prefecture_id"] == $prefecture["prefecture_id"]) {
                            $selected = " selected";
                        } else {
                            $selected = "";
                        }
                        ?>
                        <option value="<?= $prefecture["prefecture_id"]; ?>"<?= $selected; ?>><?= $prefecture["prefecture_label"]; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Γεωγραφικό πλάτος</strong></span>
                <input type="text" class="form-control" id="municipality_latitude" placeholder="Γεωγραφικό πλάτος" style="width: 100%;"
                       value="<?= !empty($municipality_data) && isset($municipality_data["municipality_latitude"]) ? $municipality_data["municipality_latitude"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Γεωγραφικό μήκος</strong></span>
                <input type="text" class="form-control" id="municipality_longitude" placeholder="Γεωγραφικό μήκος" style="width: 100%;"
                       value="<?= !empty($municipality_data) && isset($municipality_data["municipality_longitude"]) ? $municipality_data["municipality_longitude"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Επίπεδο Zoom</strong></span>
                <input type="text" class="form-control" id="municipality_zoom" placeholder="Επίπεδο Zoom" style="width: 100%;"
                       value="<?= !empty($municipality_data) && isset($municipality_data["municipality_zoom"]) ? $municipality_data["municipality_zoom"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Ακτίνα</strong></span>
                <input type="text" class="form-control" id="municipality_radius" placeholder="Ακτίνα" style="width: 100%;"
                       value="<?= !empty($municipality_data) && isset($municipality_data["municipality_radius"]) ? $municipality_data["municipality_radius"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-warning pull-left" style="width: 100%;" id="back_to_list">Επιστροφή στη λίστα</button>                        
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-danger pull-left" style="width: 100%;" id="clear_form">Καθαρισμός φόρμας</button>                        
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-success pull-right" style="width: 100%;" id="submit_municipality_clear">Αποθήκευση και καθαρισμός</button>            
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-primary pull-right" style="width: 100%;" id="submit_municipality">Αποθήκευση και επιστροφή</button>            
            </div>
        </div>
        <div class="col-md-8">
            <div id="map_container" class="map_container"></div>
        </div>
    </div>

    <input type="hidden" id="is_edit" value="<?= !empty($municipality_data) ? 1 : 0; ?>">
    <input type="hidden" id="municipality_id" value="<?= !empty($municipality_data) ? $municipality_data["municipality_id"] : 0; ?>">
</form>
<script>
    $("body").off("click", "#back_to_list").on("click", "#back_to_list", function () {
        window.location.href = "<?= base_url(); ?>geography/municipality_list";
    });
    $("body").off("click", "#clear_form").on("click", "#clear_form", function () {
        window.location.href = "<?= base_url(); ?>geography/add_municipality";
    });

    $("body").off("click", "#submit_municipality_remain, #submit_municipality_clear, #submit_municipality").on("click", "#submit_municipality_remain, #submit_municipality_clear, #submit_municipality", function() {
        var that = this;

        var municipality_object = {
            municipality_label: $("#municipality_label").val(),
            municipality_latitude: $("#municipality_latitude").val(),
            municipality_longitude: $("#municipality_longitude").val(),
            municipality_zoom: $("#municipality_zoom").val(),
            municipality_radius: $("#municipality_radius").val(),
            
            municipality_prefecture_id: $("#municipality_prefecture_id").val(),

            is_edit: $("#is_edit").val(),
            municipality_id: $("#municipality_id").val()
        };

        $.ajax({
            type: "post",
            url: "<?= base_url(); ?>geography/save_municipality",
            data: {
                "municipality": municipality_object
            }
        }).done(function(data) {
            if ($("#is_edit").val() == 0) {
                $("#is_edit").val(1);
                $("#request_id").val(data);                
            }

            if ($(that).attr("id") === "submit_municipality_remain") {
                window.location.href = "<?= base_url(); ?>geography/edit_municipality/" + data;
            } else if ($(that).attr("id") === "submit_municipality_clear") {
                window.location.href = "<?= base_url(); ?>geography/add_municipality";
            } else if ($(that).attr("id") === "submit_municipality") {
                window.location.href = "<?= base_url(); ?>geography/municipality_list";                
            }
        });
    });

    var map, marker, circle;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map_container'), {
            center: {lat: <?= !empty($municipality_data) ? $municipality_data["municipality_latitude"] : 38.7262675; ?>, 
                    lng: <?= !empty($municipality_data) ? $municipality_data["municipality_longitude"] : 23.3699379; ?>},
            zoom: <?= !empty($municipality_data) ? $municipality_data["municipality_zoom"] : 7; ?>
        });

        <?php if (!empty($municipality_data)) { ?>
            marker = new google.maps.Marker({
                position: {lat: <?= !empty($municipality_data) ? $municipality_data["municipality_latitude"] : 38.7262675; ?>, 
                            lng: <?= !empty($municipality_data) ? $municipality_data["municipality_longitude"] : 23.3699379; ?>},
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
                center: {lat: <?= !empty($municipality_data) ? $municipality_data["municipality_latitude"] : 38.7262675; ?>, 
                        lng: <?= !empty($municipality_data) ? $municipality_data["municipality_longitude"] : 23.3699379; ?>},
                radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 17000; ?>
            });

            marker.addListener("drag", function (event) {
                $("#municipality_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                $("#municipality_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

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
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 17000; ?>
                });
            } else {
                marker.setPosition(event.latLng);

                circle.setCenter(event.latLng);
            }

            marker.addListener("drag", function (event) {
                $("#municipality_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                $("#municipality_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                circle.setCenter(event.latLng);
            });

            $("#municipality_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
            $("#municipality_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));
            $("#municipality_zoom").val(map.getZoom());
            $("#municipality_radius").val(circle.getRadius());
        });

        map.addListener('zoom_changed', function (event) {
            $("#municipality_zoom").val(map.getZoom());
        });
    }

    $("body").off("input", "#municipality_latitude").on("input", "#municipality_latitude", function () {
        if (typeof marker !== "undefined") {
            marker.setPosition({lat: parseFloat($("#municipality_latitude").val()), lng: parseFloat($("#municipality_longitude").val())});

            circle.setCenter({lat: parseFloat($("#municipality_latitude").val()), lng: parseFloat($("#municipality_longitude").val())});
        } else {
            if ($("#municipality_longitude").val() !== "") {
                marker = new google.maps.Marker({
                    position: {lat: parseFloat($("#municipality_latitude").val()), lng: parseFloat($("#municipality_longitude").val())},
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
                    center: {lat: parseFloat($("#municipality_latitude").val()), lng: parseFloat($("#municipality_longitude").val())},
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 17000; ?>
                });

                marker.addListener("drag", function (event) {
                    $("#municipality_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                    $("#municipality_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                    circle.setCenter(event.latLng);
                });
                $("#municipality_zoom").val(map.getZoom());
                $("#municipality_radius").val(circle.getRadius());
            }
        }
    });

    $("body").off("input", "#municipality_longitude").on("input", "#municipality_longitude", function () {
        if (typeof marker !== "undefined") {
            marker.setPosition({lat: parseFloat($("#municipality_latitude").val()), lng: parseFloat($("#municipality_longitude").val())});

            circle.setCenter({lat: parseFloat($("#municipality_latitude").val()), lng: parseFloat($("#municipality_longitude").val())});
        } else {
            if ($("#municipality_latitude").val() !== "") {
                marker = new google.maps.Marker({
                    position: {lat: parseFloat($("#municipality_latitude").val()), lng: parseFloat($("#municipality_longitude").val())},
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
                    center: {lat: parseFloat($("#municipality_latitude").val()), lng: parseFloat($("#municipality_longitude").val())},
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 17000; ?>
                });

                marker.addListener("drag", function (event) {
                    $("#municipality_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                    $("#municipality_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                    circle.setCenter(event.latLng);
                });
                $("#municipality_zoom").val(map.getZoom());
                $("#municipality_radius").val(circle.getRadius());
            }
        }
    });
    
    $("body").off("input", "#municipality_zoom").on("input", "#municipality_zoom", function() {
        if ($("#municipality_zoom").val() !== "" && !isNaN($("#municipality_zoom").val())) {
            map.setZoom(parseInt($("#municipality_zoom").val()));
        }
    });
    
    $("body").off("input", "#municipality_radius").on("input", "#municipality_radius", function() {
        if (typeof marker !== "undefined" && !isNaN($("#municipality_radius").val())) {
            circle.setRadius(parseInt($("#municipality_radius").val()));
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-Q_DOviiI1d5lCHmL76KaQ1jVtCFjl14&callback=initMap" async defer></script>