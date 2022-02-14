<?php
    include ('includes/data.php');
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <link rel="stylesheet" href="css/leaflet.css">
        <link rel="stylesheet" href="css/qgis2web.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <style>
        #map {
            /* width: 1147px; */
            border: 1px solid black;
            width: 99%;
            height: 540px;
        }
        </style>
        <title></title>
    </head>
    <body>
        <div id="map">
        </div>

        <script src="jquery/jquery.min.js"></script>
        <script src="js/qgis2web_expressions.js"></script>
        <script src="js/leaflet.js"></script>
        <script src="js/leaflet-svg-shape-markers.min.js"></script>
        <script src="js/leaflet.rotatedMarker.js"></script>
        <script src="js/leaflet.pattern.js"></script>
        <script src="js/leaflet-hash.js"></script>
        <script src="js/Autolinker.min.js"></script>
        <script src="js/rbush.min.js"></script>
        <script src="js/labelgun.min.js"></script>
        <script src="js/labels.js"></script>
        <script src="data/CemeteryCircumference_1.js"></script>
        <script src="data/road_2.js"></script>
        <!-- <script src="data/Marker_3.js"></script> -->
        
        <?php
            $result = mysqli_query($db, "SELECT * FROM grave_data")
        ?>
        <script>
            var json_Marker_3 = {
            "type": "FeatureCollection",
            "name": "Marker_3",
            "crs": { "type": "name", "properties": { "name": "urn:ogc:def:crs:OGC:1.3:CRS84" } },
            "features": [
                <?php
                    while($row = mysqli_fetch_array($result)) {
                ?>
            { "type": "Feature", "properties": { "Grave No.": "<?php echo $row['grave_no']; ?>", "Name": "<?php echo $row['name']; ?>", "Birth": "<?php echo $row['birth']; ?>", "Death": "<?php echo $row['death']; ?>", "Visibility": "<?php echo $row['visibility']; ?>", "Status": "<?php echo $row['status']; ?>", "auxiliary_storage_labeling_offsetquad": "<?php echo $row['label']; ?>" }, "geometry": { "type": "Point", "coordinates": [<?php $trim = str_replace('""', '', $row['coordinates']); echo $trim; ?>] } },
                <?php
                    }
                ?>
            ]
            }
        </script>
        
        <script>
        var map = L.map('map', {
            zoomControl:true, maxZoom:21, minZoom:19
        }).fitBounds([[6.913435823404048,122.13926755926411],[6.914197473007376,122.14090041572904]]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
        var bounds_group = new L.featureGroup([]);
        function setBounds() {
        }
        map.createPane('pane_GoogleSatellite_0');
        map.getPane('pane_GoogleSatellite_0').style.zIndex = 400;
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
            layer.bindPopup(popupContent, {maxHeight: 400});
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
                fillOpacity: 1,
                fillColor: 'rgba(114,155,111,1.0)',
                interactive: false,
            }
        }
        map.createPane('pane_CemeteryCircumference_1');
        map.getPane('pane_CemeteryCircumference_1').style.zIndex = 401;
        map.getPane('pane_CemeteryCircumference_1').style['mix-blend-mode'] = 'normal';
        var layer_CemeteryCircumference_1 = new L.geoJson(json_CemeteryCircumference_1, {
            attribution: '',
            interactive: false,
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
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_road_2_0() {
            return {
                pane: 'pane_road_2',
                opacity: 1,
                color: 'rgba(239,229,192,1.0)',
                dashArray: '',
                lineCap: 'square',
                lineJoin: 'bevel',
                weight: 12.0,
                fillOpacity: 0,
                interactive: false,
            }
        }
        map.createPane('pane_road_2');
        map.getPane('pane_road_2').style.zIndex = 402;
        map.getPane('pane_road_2').style['mix-blend-mode'] = 'normal';
        var layer_road_2 = new L.geoJson(json_road_2, {
            attribution: '',
            interactive: false,
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
                        <td colspan="2">' + (feature.properties['auxiliary_storage_labeling_offsetquad'] !== null ? autolinker.link(feature.properties['auxiliary_storage_labeling_offsetquad'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {maxHeight: 400});
        }

        function style_Marker_3_0(feature) {
            switch(String(feature.properties['Status'])) {
                case 'occupied':
                    return {
                pane: 'pane_Marker_3',
                shape: 'square',
                radius: 8.0,
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(251,124,92,1.0)',
                interactive: true,
            }
                    break;
                case 'vacant':
                    return {
                pane: 'pane_Marker_3',
                shape: 'square',
                radius: 8.0,
                opacity: 1,
                color: 'rgba(35,35,35,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 1,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(27,187,72,1.0)',
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
                return L.shapeMarker(latlng, style_Marker_3_0(feature));
            },
        });
        bounds_group.addLayer(layer_Marker_3);
        map.addLayer(layer_Marker_3);
        setBounds();
        var i = 0;
        layer_Marker_3.eachLayer(function(layer) {
            var context = {
                feature: layer.feature,
                variables: {}
            };
            layer.bindTooltip((layer.feature.properties['Grave No.'] !== null?String('<div style="color: #f6f5ff; font-size: 5pt; font-family: \'MS Shell Dlg 2\', sans-serif;">' + layer.feature.properties['Grave No.']) + '</div>':''), {permanent: true, offset: [-0, -16], className: 'css_Marker_3'});
            labels.push(layer);
            totalMarkers += 1;
              layer.added = true;
              addLabel(layer, i);
              i++;
        });
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
