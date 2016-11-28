<form class="form-inline" id="add_prefecture_form">    
    <div class="row margin-bottom-30">
        <div class="col-md-4">
            <div class="input-group" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Όνομα νομού</strong></span>
                <input type="text" class="form-control" id="prefecture_label" placeholder="Όνομα νομού" style="width: 100%;"
                       value="<?= !empty($prefecture_data) && isset($prefecture_data["prefecture_label"]) ? $prefecture_data["prefecture_label"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Γεωγραφικό πλάτος</strong></span>
                <input type="text" class="form-control" id="prefecture_latitude" placeholder="Γεωγραφικό πλάτος" style="width: 100%;"
                       value="<?= !empty($prefecture_data) && isset($prefecture_data["prefecture_latitude"]) ? $prefecture_data["prefecture_latitude"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Γεωγραφικό μήκος</strong></span>
                <input type="text" class="form-control" id="prefecture_longitude" placeholder="Γεωγραφικό μήκος" style="width: 100%;"
                       value="<?= !empty($prefecture_data) && isset($prefecture_data["prefecture_longitude"]) ? $prefecture_data["prefecture_longitude"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Επίπεδο Zoom</strong></span>
                <input type="text" class="form-control" id="prefecture_zoom" placeholder="Επίπεδο Zoom" style="width: 100%;"
                       value="<?= !empty($prefecture_data) && isset($prefecture_data["prefecture_zoom"]) ? $prefecture_data["prefecture_zoom"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <span class="input-group-addon" style="width: 45%;"><strong>Ακτίνα</strong></span>
                <input type="text" class="form-control" id="prefecture_radius" placeholder="Ακτίνα" style="width: 100%;"
                       value="<?= !empty($prefecture_data) && isset($prefecture_data["prefecture_radius"]) ? $prefecture_data["prefecture_radius"] : ""; ?>">
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-warning pull-left" style="width: 100%;" id="back_to_list">Επιστροφή στη λίστα</button>                        
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-danger pull-left" style="width: 100%;" id="clear_form">Καθαρισμός φόρμας</button>                        
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-info pull-left" style="width: 100%;" id="submit_prefecture_remain">Αποθήκευση και παραμονή</button>            
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-success pull-right" style="width: 100%;" id="submit_prefecture_clear">Αποθήκευση και καθαρισμός</button>            
            </div>
            <div class="input-group margin-top-30" style="width: 100%;">
                <button type="button" class="btn btn-primary pull-right" style="width: 100%;" id="submit_prefecture">Αποθήκευση και επιστροφή</button>            
            </div>
        </div>
        <div class="col-md-8">
            <div id="map_container" class="map_container"></div>
        </div>
    </div>

    <input type="hidden" id="is_edit" value="<?= !empty($prefecture_data) ? 1 : 0; ?>">
    <input type="hidden" id="prefecture_id" value="<?= !empty($prefecture_data) ? $prefecture_data["prefecture_id"] : 0; ?>">
</form>
<script>
    $("body").off("click", "#back_to_list").on("click", "#back_to_list", function () {
        window.location.href = "/geography/prefecture_list";
    });
    $("body").off("click", "#clear_form").on("click", "#clear_form", function () {
        window.location.href = "/geography/add_prefecture";
    });

    $("body").off("click", "#submit_prefecture_remain, #submit_prefecture_clear, #submit_prefecture").on("click", "#submit_prefecture_remain, #submit_prefecture_clear, #submit_prefecture", function() {
        var that = this;

        var prefecture_object = {
            prefecture_label: $("#prefecture_label").val(),
            prefecture_latitude: $("#prefecture_latitude").val(),
            prefecture_longitude: $("#prefecture_longitude").val(),
            prefecture_zoom: $("#prefecture_zoom").val(),
            prefecture_radius: $("#prefecture_radius").val(),

            is_edit: $("#is_edit").val(),
            prefecture_id: $("#prefecture_id").val()
        };

        $.ajax({
            type: "post",
            url: "/geography/save_prefecture",
            data: {
                "prefecture": prefecture_object
            }
        }).done(function(data) {
            if ($("#is_edit").val() == 0) {
                $("#is_edit").val(1);
                $("#request_id").val(data);                
            }

            if ($(that).attr("id") === "submit_prefecture_remain") {
                window.location.href = "/geography/edit_prefecture/" + data;
            } else if ($(that).attr("id") === "submit_prefecture_clear") {
                window.location.href = "/geography/add_prefecture";
            } else if ($(that).attr("id") === "submit_prefecture") {
                window.location.href = "/geography/prefecture_list";                
            }
        });
    });

    var map, marker, circle;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map_container'), {
            center: {lat: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_latitude"] : 38.7262675; ?>, 
                    lng: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_longitude"] : 23.3699379; ?>},
            zoom: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_zoom"] : 7; ?>
        });

        <?php if (!empty($prefecture_data)) { ?>
            marker = new google.maps.Marker({
                position: {lat: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_latitude"] : 38.7262675; ?>, 
                            lng: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_longitude"] : 23.3699379; ?>},
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
                center: {lat: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_latitude"] : 38.7262675; ?>, 
                        lng: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_longitude"] : 23.3699379; ?>},
                radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 40000; ?>
            });

            marker.addListener("drag", function (event) {
                $("#prefecture_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                $("#prefecture_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

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
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 40000; ?>
                });
            } else {
                marker.setPosition(event.latLng);

                circle.setCenter(event.latLng);
            }

            marker.addListener("drag", function (event) {
                $("#prefecture_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                $("#prefecture_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                circle.setCenter(event.latLng);
            });

            $("#prefecture_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
            $("#prefecture_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));
            $("#prefecture_zoom").val(map.getZoom());
            $("#prefecture_radius").val(circle.getRadius());
        });

        map.addListener('zoom_changed', function (event) {
            $("#prefecture_zoom").val(map.getZoom());
        });
    }

    $("body").off("input", "#prefecture_latitude").on("input", "#prefecture_latitude", function () {
        if (typeof marker !== "undefined") {
            marker.setPosition({lat: parseFloat($("#prefecture_latitude").val()), lng: parseFloat($("#prefecture_longitude").val())});

            circle.setCenter({lat: parseFloat($("#prefecture_latitude").val()), lng: parseFloat($("#prefecture_longitude").val())});
        } else {
            if ($("#prefecture_longitude").val() !== "") {
                marker = new google.maps.Marker({
                    position: {lat: parseFloat($("#prefecture_latitude").val()), lng: parseFloat($("#prefecture_longitude").val())},
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
                    center: {lat: parseFloat($("#prefecture_latitude").val()), lng: parseFloat($("#prefecture_longitude").val())},
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 40000; ?>
                });

                marker.addListener("drag", function (event) {
                    $("#prefecture_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                    $("#prefecture_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                    circle.setCenter(event.latLng);
                });
                $("#prefecture_zoom").val(map.getZoom());
                $("#prefecture_radius").val(circle.getRadius());
            }
        }
    });

    $("body").off("input", "#prefecture_longitude").on("input", "#prefecture_longitude", function () {
        if (typeof marker !== "undefined") {
            marker.setPosition({lat: parseFloat($("#prefecture_latitude").val()), lng: parseFloat($("#prefecture_longitude").val())});

            circle.setCenter({lat: parseFloat($("#prefecture_latitude").val()), lng: parseFloat($("#prefecture_longitude").val())});
        } else {
            if ($("#prefecture_latitude").val() !== "") {
                marker = new google.maps.Marker({
                    position: {lat: parseFloat($("#prefecture_latitude").val()), lng: parseFloat($("#prefecture_longitude").val())},
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
                    center: {lat: parseFloat($("#prefecture_latitude").val()), lng: parseFloat($("#prefecture_longitude").val())},
                    radius: <?= !empty($prefecture_data) ? $prefecture_data["prefecture_radius"] : 40000; ?>
                });

                marker.addListener("drag", function (event) {
                    $("#prefecture_latitude").val(parseFloat(Math.round(event.latLng.lat() * 1000000) / 1000000).toFixed(6));
                    $("#prefecture_longitude").val(parseFloat(Math.round(event.latLng.lng() * 1000000) / 1000000).toFixed(6));

                    circle.setCenter(event.latLng);
                });
                $("#prefecture_zoom").val(map.getZoom());
                $("#prefecture_radius").val(circle.getRadius());
            }
        }
    });
    
    $("body").off("input", "#prefecture_zoom").on("input", "#prefecture_zoom", function() {
        if ($("#prefecture_zoom").val() !== "" && !isNaN($("#prefecture_zoom").val())) {
            map.setZoom(parseInt($("#prefecture_zoom").val()));
        }
    });
    
    $("body").off("input", "#prefecture_radius").on("input", "#prefecture_radius", function() {
        if (typeof marker !== "undefined" && !isNaN($("#prefecture_radius").val())) {
            circle.setRadius(parseInt($("#prefecture_radius").val()));
        }
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-Q_DOviiI1d5lCHmL76KaQ1jVtCFjl14&callback=initMap" async defer></script>