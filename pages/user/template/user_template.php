<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title><?php echo $title;?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo web_root; ?>pages/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?php echo web_root; ?>pages/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>pages/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>pages/assets/fonts/fontawesome5-overrides.min.css">
    
    <!-- WEB QGIS CSS Components -->
    <link rel="stylesheet" href="<?php echo web_root; ?>webmap/css/leaflet.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>webmap/css/L.Control.Locate.min.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>webmap/css/qgis2web.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>webmap/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>webmap/css/leaflet-search.css">

    <!-- DataTable -->
    <link rel="stylesheet" href="<?php echo web_root; ?>pages/assets/DataTables/datatables.css">

    <!-- Custom Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo web_root; ?>pages/assets/css/admin.css">

</head>
      
<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-secondary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="<?php echo web_root; ?>pages/admin/index.php?page=dashboard">
                    <div class="sidebar-brand-icon"><i class="fas fa-mosque"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Gravekeeper</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link <?php echo $home; ?>" href="<?php echo web_root; ?>pages/user/index.php?page=home"><i class="fas fa-tachometer-alt"></i><span>Home</span></a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $service; ?>" href="<?php echo web_root; ?>pages/user/index.php?page=service"><i class="fas fa-dolly"></i><span>Service</span></a></li>
                    <li class="nav-item"><a class="nav-link <?php echo $map; ?>" href="<?php echo web_root; ?>pages/user/index.php?page=map"><i class="fas fa-map"></i><span>Map</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ml-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
                                        <img class="border rounded-circle img-profile" src="<?php echo web_root; ?>pages/assets/img/profile/profile.jpg">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                                        <a class="dropdown-item" href="<?php echo web_root; ?>include/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="message mt-3 mx-4">
                    <?php 
                        check_message();
                    ?>
                </div>
                <?php require_once $content; ?>
            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Gravekeeper 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    
    <script src="ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="<?php echo web_root; ?>pages/assets/js/jquery.min.js"></script>
    <script src="<?php echo web_root; ?>pages/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo web_root; ?>pages/assets/js/chart.min.js"></script>
    <script src="<?php echo web_root; ?>pages/assets/js/bs-init.js"></script>
    <script src="<?php echo web_root; ?>pages/assets/js/theme.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <!-- <script src="ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
    <script src="<?php echo web_root; ?>pages/assets/js/tables.js"></script>

    <!-- Optional -->
    <script src="<?php echo web_root; ?>pages/assets/js/popper.js"></script>
    
    <!-- Web QGIS Components -->
    <script src="<?php echo web_root; ?>webmap/js/qgis2web_expressions.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/leaflet.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/L.Control.Locate.min.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/leaflet.rotatedMarker.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/leaflet.pattern.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/leaflet-hash.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/Autolinker.min.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/rbush.min.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/labelgun.min.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/labels.js"></script>
    <script src="<?php echo web_root; ?>webmap/js/leaflet-search.js"></script>
    <script src="<?php echo web_root; ?>webmap/data/CemeteryCircumference_1.js"></script>
    <script src="<?php echo web_root; ?>webmap/data/road_2.js"></script>

    <!-- Extra Functions -->
    <script src="<?php echo web_root; ?>pages/assets/js/receipt.js"></script>
    <script src="<?php echo web_root; ?>pages/assets/js/preloader.js"></script>
    <script src="<?php echo web_root; ?>pages/assets/js/refresh.js"></script>
    <script src="<?php echo web_root; ?>pages/assets/js/fixedtab.js"></script>

    <!-- DataTables -->
    <script src="<?php echo web_root; ?>pages/assets/DataTables/datatables.js"></script>

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

                    if ($row['status'] == 'occupied1' OR 'occupied2' OR 'occupied3') {
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
                    break;
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