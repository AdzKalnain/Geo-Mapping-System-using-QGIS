<?php
    include_once 'include/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Map - Gravekeeper</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">

    <link rel="stylesheet" href="webmap/css/leaflet.css">
    <link rel="stylesheet" href="webmap/css/L.Control.Locate.min.css">
    <link rel="stylesheet" href="webmap/css/qgis2web.css">
    <link rel="stylesheet" href="webmap/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="webmap/css/leaflet-search.css">
    <link rel="stylesheet" href="assets/css/home.css">
    

</head>

<style>
    #loading {
    position: static;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0.7;
    background-color: transparent;
}
</style>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Gravekeeper</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="map.php">Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="login/index.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page">
        <section class="clean-block">
            <div class="container">
                <div class="row mt-4 pl-3 text-sm">
                    <h6>Legend:</h6>
                    <div class="col-sm-6 d-flex flex-column">
                        <span><i class="fa fa-square text-vacant"></i> Vacant</span>
                        <span><i class="fa fa-square text-occupied1"></i> Occupied by 1 person</span>
                        <span><i class="fa fa-square text-occupied2"></i> Occupied by 2 person</span>
                        <span><i class="fa fa-square text-occupied3"></i> Occupied by 3 person</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12 mt-4 pt-2">
                        <div>
                            <div id="map" style="border: 1px solid black; width: 99%; height: 450px;">
                                <div id="loading">
                                    <img id="loading-image" class="mx-auto" src="assets/img/Preloader_3.gif" alt="Loading..." />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer">
            <p class="text-muted d-flex justify-content-center"><small>© 2021 Gravekeeper</small></p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <script src="webmap/js/qgis2web_expressions.js"></script>
    <script src="webmap/js/leaflet.js"></script>
    <script src="webmap/js/L.Control.Locate.min.js"></script>
    <script src="webmap/js/leaflet.rotatedMarker.js"></script>
    <script src="webmap/js/leaflet.pattern.js"></script>
    <script src="webmap/js/leaflet-hash.js"></script>
    <script src="webmap/js/Autolinker.min.js"></script>
    <script src="webmap/js/rbush.min.js"></script>
    <script src="webmap/js/labelgun.min.js"></script>
    <script src="webmap/js/labels.js"></script>
    <script src="webmap/js/leaflet-search.js"></script>
    <script src="webmap/data/CemeteryCircumference_1.js"></script>
    <script src="webmap/data/road_2.js"></script>

    <script>
        $(window).on('load', function () {
            $('#loading').hide();
        }) 
    </script>

        <?php
            $result = mysqli_query($mysqli, "SELECT * FROM grave_record
            RIGHT JOIN grave_data ON grave_record.grave_id=grave_data.id
            LEFT JOIN grave_file ON grave_file.record_id=grave_record.record_id")
        ?>
        <script>
            var json_Marker_3 = {
            "type": "FeatureCollection",
            "name": "Marker_3",
            "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
            "features": [
                <?php
                    //  function format_interval(DateInterval $interval) {
                    //      $result = "";
                    //      if ($interval->y) { $result .= $interval->format("%y years"); }
                    //      if ($interval->m) { $result .= $interval->format("%m months"); }
                    //      if ($interval->d) { $result .= $interval->format("%d days"); }

                    //      return $result;
                    //  }
                    while($row = mysqli_fetch_array($result)) {

                        // $deathdate = new DateTime($row['record_death']);
                        // $currentdate = new DateTime(@date('Y-m-d H:i:s'));
                        // $difference = $deathdate->diff($currentdate);

                        //$deathdate = date_create($row['record_death']);
                        //$currentdate = date_create(@date('Y'));
                        //$decomposedate = date_create($row['record_death']);
                        // $decomposedate = new DateTime($row['record_death']);
                        //$decomposedate->modify('+8 year');
                        //$difference = date_diff($deathdate, $currentdate)->format('%y');
                        // $difference = date_diff($deathdate, $currentdate);

                        if ($row['status'] == 'occupied' OR 'occupied2' OR 'occupied3') {
                ?>
            { "type": "Feature", "properties": { "Grave No.": "<?php echo $row['grave_no']?>", 
                "Name": "<?php 
                            $graveno = $row['grave_no'];
                            $sql = "SELECT * FROM grave_record WHERE grave_id = $graveno";
                            if ($duplicate = mysqli_query($mysqli, $sql)) {
                                while ($dup = mysqli_fetch_assoc($duplicate)) {
                                    echo $dup['record_name'].', ';
                                }
                            }    
                        ?>",
                "Birth": "<?php 
                            if ($duplicate = mysqli_query($mysqli, $sql)) {
                                while ($dup = mysqli_fetch_assoc($duplicate)) {
                                    echo $dup['record_birth']."<br>";
                                }
                            }
                        ?>", 
                "Death": "<?php 
                            if ($duplicate = mysqli_query($mysqli, $sql)) {
                                while ($dup = mysqli_fetch_assoc($duplicate)) {
                                    echo $dup['record_death']."<br>";
                                }
                            }
                        ?>", 
                "Visibility": "<?php echo $row['record_visibility']; ?>", 
                "Status": "<?php echo $row['status']; ?>", 
                "Photos": "<?php 
                                $counter = 0;
                                $sql = "SELECT * FROM grave_file WHERE record_id = $graveno";
                                if ($duplicate = mysqli_query($mysqli, $sql)) {
                                    while ($dup = mysqli_fetch_assoc($duplicate)) {
                                        echo "<a href='upload/".$dup['grave_filename']."' target='_blank'><button class='btn btn-sm btn-secondary mr-1 mt-1'><span class='fas fa-images'></span></button></a>";
                                        $counter = $counter + 1;
                                    }
                                }
                            ?>",
                "auxiliary_storage_labeling_offsetquad": "<?php echo $row['label']; ?>" }, 
                "geometry": { "type": "Point", "coordinates": [<?php $trim = str_replace('""', '', $row['coordinates']); echo $trim; ?>] } },
                
                <?php
                        } else {
                            $trim = str_replace('""', '', $row['coordinates']);
                            echo '{ "type": "Feature", "properties": { "Grave No.": "'.$row['grave_no'].'",';
                                echo '"Name": "'."Empty".'",'; 
                                echo '"Birth": "'."Empty".'",'; 
                                echo '"Death": "'."Empty".'",'; 
                                echo '"Visibility": "'.$row['record_visibility'].'",'; 
                                echo '"Status": "'.$row['status'].'",';
                                echo '"Photos": "'."Empty".'",';  
                                echo '"auxiliary_storage_labeling_offsetquad": "'.$row['label'].'" },'; 
                                echo '"geometry": { "type": "Point", "coordinates": ['.$trim.'] } },';
                        }
                    }
                ?>
            ]
            }
        </script>

        <script>
            var map = L.map('map', {
                zoomControl:true, maxZoom:21, minZoom:20
            }).fitBounds([[6.913597497117801,122.13930750978687],[6.914359146460475,122.14088332323063]]);
            var hash = new L.Hash(map);
            map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
            var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
            L.control.locate({locateOptions: {maxZoom: 19}}).addTo(map);
            var bounds_group = new L.featureGroup([]);
            function setBounds() {
            }
            map.createPane('pane_GoogleSatellite_0');
            // Originally the zindex is 400, just reduced it to 100 so that searching is possible
            map.getPane('pane_GoogleSatellite_0').style.zIndex = 100;
            var layer_GoogleSatellite_0 = L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
                pane: 'pane_GoogleSatellite_0',
                opacity: 1.0,
                attribution: '',
                minZoom: 19,
                maxZoom: 21,
                minNativeZoom: 0,
                maxNativeZoom: 19
            });
            layer_GoogleSatellite_0;
            map.addLayer(layer_GoogleSatellite_0);
            function pop_CemeteryCircumference_1(feature, layer) {
                var popupContent = '<table>\
                        <tr>\
                            <td colspan="2">' + (feature.properties['Name'] !== null ? autolinker.link(feature.properties['Name'].toLocaleString()) : '') + '</td>\
                        </tr>\
                    </table>';
                // This is to remove the pop-ups in the circumference
                // layer.bindPopup(popupContent, {maxHeight: 400});
            }

            function style_CemeteryCircumference_1_0() {
                return {
                    pane: 'pane_CemeteryCircumference_1',
                    opacity: 1,
                    color: 'rgba(35,35,35,1.0)',
                    dashArray: '',
                    lineCap: 'butt',
                    lineJoin: 'miter',
                    weight: 1.0, 
                    fill: true,
                    fillOpacity: .6,
                    // fillColor: 'rgba(114,155,111,1.0)',
                    fillColor: '#858796',
                    // fillColor: '#53CC9D',
                    interactive: true,
                }
            }
            map.createPane('pane_CemeteryCircumference_1');
            map.getPane('pane_CemeteryCircumference_1').style.zIndex = 401;
            map.getPane('pane_CemeteryCircumference_1').style['mix-blend-mode'] = 'normal';
            var layer_CemeteryCircumference_1 = new L.geoJson(json_CemeteryCircumference_1, {
                attribution: '',
                interactive: true,
                dataVar: 'json_CemeteryCircumference_1',
                layerName: 'layer_CemeteryCircumference_1',
                pane: 'pane_CemeteryCircumference_1',
                onEachFeature: pop_CemeteryCircumference_1,
                style: style_CemeteryCircumference_1_0,
            });
            bounds_group.addLayer(layer_CemeteryCircumference_1);
            map.addLayer(layer_CemeteryCircumference_1);
            function pop_road_2(feature, layer) {
                var popupContent = '<table>\
                        <tr>\
                            <td colspan="2">' + (feature.properties['id'] !== null ? autolinker.link(feature.properties['id'].toLocaleString()) : '') + '</td>\
                        </tr>\
                    </table>';
                // This is to remove the pop-up on the road 
                // layer.bindPopup(popupContent, {maxHeight: 400});
            }

            function style_road_2_0() {
                return {
                    pane: 'pane_road_2',
                    opacity: 1,
                    color: 'rgba(239,229,192,1.0)',
                    // color: '#858796',
                    // color: '#008E76',
                    dashArray: '',
                    lineCap: 'square',
                    lineJoin: 'bevel',
                    weight: 12.0,
                    fillOpacity: 0,
                    interactive: true,
                }
            }
            map.createPane('pane_road_2');
            map.getPane('pane_road_2').style.zIndex = 402;
            map.getPane('pane_road_2').style['mix-blend-mode'] = 'normal';
            var layer_road_2 = new L.geoJson(json_road_2, {
                attribution: '',
                interactive: true,
                dataVar: 'json_road_2',
                layerName: 'layer_road_2',
                pane: 'pane_road_2',
                onEachFeature: pop_road_2,
                style: style_road_2_0,
            });
            bounds_group.addLayer(layer_road_2);
            map.addLayer(layer_road_2);
            function pop_Marker_3(feature, layer) {
                var popupContent = '<table>\
                        <tr>\
                            <th scope="row">Grave No.</th>\
                            <td>' + (feature.properties['Grave No.'] !== null ? autolinker.link(feature.properties['Grave No.'].toLocaleString()) : '') + '</td>\
                        </tr>\
                        <tr>\
                            <th scope="row">Name</th>\
                            <td>' + (feature.properties['Name'] !== null ? autolinker.link(feature.properties['Name'].toLocaleString()) : '') + '</td>\
                        </tr>\
                        <tr>\
                            <th scope="row">Birth</th>\
                            <td>' + (feature.properties['Birth'] !== null ? autolinker.link(feature.properties['Birth'].toLocaleString()) : '') + '</td>\
                        </tr>\
                        <tr>\
                            <th scope="row">Death</th>\
                            <td>' + (feature.properties['Death'] !== null ? autolinker.link(feature.properties['Death'].toLocaleString()) : '') + '</td>\
                        </tr>\
                        <tr>\
                            <th scope="row">Visibility</th>\
                            <td>' + (feature.properties['Visibility'] !== null ? autolinker.link(feature.properties['Visibility'].toLocaleString()) : '') + '</td>\
                        </tr>\
                        <tr>\
                            <th scope="row">Status</th>\
                            <td>' + (feature.properties['Status'] !== null ? autolinker.link(feature.properties['Status'].toLocaleString()) : '') + '</td>\
                        </tr>\
                        <tr>\
                            <th scope="row">Photos</th>\
                            <td>' + (feature.properties['Photos'] !== null ? autolinker.link(feature.properties['Photos'].toLocaleString()) : '') + '</td>\
                        </tr>\
                        <tr>\
                            <td colspan="2">' + (feature.properties['auxiliary_storage_labeling_offsetquad'] !== null ? autolinker.link(feature.properties['auxiliary_storage_labeling_offsetquad'].toLocaleString()) : '') + '</td>\
                        </tr>\
                    </table>';
                layer.bindPopup(popupContent, {maxHeight: 400});
            }

            function style_Marker_3_0(feature) {
                switch(String(feature.properties['Status'])) {
                    case 'occupied1':
                        return {
                    pane: 'pane_Marker_3',
                    radius: 8.0,
                    opacity: 1,
                    color: 'rgba(61,128,53,1.0)',
                    dashArray: '',
                    lineCap: 'butt',
                    lineJoin: 'miter',
                    weight: 2.0,
                    fill: true,
                    fillOpacity: 1,
                    // fillColor: 'rgba(251,124,92,1.0)',
                    // fillColor: '#3695E7',
                    // fillColor: '#4e73df',
                    fillColor: '#858796',
                    interactive: true,
                }
                        break;
                    case 'vacant':
                        return {
                    pane: 'pane_Marker_3',
                    radius: 8.0,
                    opacity: 1,
                    color: 'rgba(61,128,53,1.0)',
                    dashArray: '',
                    lineCap: 'butt',
                    lineJoin: 'miter',
                    weight: 2.0,
                    fill: true,
                    fillOpacity: 1,
                    // fillColor: 'rgba(27,187,72,1.0)',
                    // fillColor: '#17B88F',
                    fillColor: '#1cc88a',
                    interactive: true,
                }
                break;
                    case 'occupied2':
                    return {
                        pane: 'pane_Marker_3',
                        radius: 8.0,
                        opacity: 1,
                        color: 'rgba(61,128,53,1.0)',
                        dashArray: '',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 2.0,
                        fill: true,
                        fillOpacity: 1,
                        // rgb(24, 22, 22)
                        fillColor: 'rgb(128, 45, 45)',
                        interactive: true,
                    }
                    break;
                    case 'occupied3':
                    return {
                        pane: 'pane_Marker_3',
                        radius: 8.0,
                        opacity: 1,
                        color: 'rgba(61,128,53,1.0)',
                        dashArray: '',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 2.0,
                        fill: true,
                        fillOpacity: 1,
                        // rgb(24, 22, 22)
                        fillColor: 'rgb(24, 22, 22)',
                        interactive: true,
                    }
                }
            }
            map.createPane('pane_Marker_3');
            map.getPane('pane_Marker_3').style.zIndex = 403;
            map.getPane('pane_Marker_3').style['mix-blend-mode'] = 'normal';
            var layer_Marker_3 = new L.geoJson(json_Marker_3, {
                attribution: '',
                interactive: true,
                dataVar: 'json_Marker_3',
                layerName: 'layer_Marker_3',
                pane: 'pane_Marker_3',
                onEachFeature: pop_Marker_3,
                pointToLayer: function (feature, latlng) {
                    var context = {
                        feature: feature,
                        variables: {}
                    };
                    return L.circleMarker(latlng, style_Marker_3_0(feature));
                },
            });
            bounds_group.addLayer(layer_Marker_3);
            map.addLayer(layer_Marker_3);
            setBounds();
            map.addControl(new L.Control.Search({
                layer: layer_Marker_3,
                initial: false,
                hideMarkerOnCollapse: true,
                propertyName: 'Name'}));
            document.getElementsByClassName('search-button')[0].className +=
            ' fa fa-search';
            resetLabels([layer_Marker_3]);
            map.on("zoomend", function(){
                resetLabels([layer_Marker_3]);
            });
            map.on("layeradd", function(){
                resetLabels([layer_Marker_3]);
            });
            map.on("layerremove", function(){
                resetLabels([layer_Marker_3]);
            });
        </script>
</body>

</html>