<?php
include('session.php');

require("../important/backstage.php");
$backstage = new back_stage_class();

//set active navbar session
$_SESSION['navactive'] = 'trackbus';

//$transportation_details = json_decode($backstage->get_transportation_details());

if (isset($_GET["token"])){
            $longid1 = ($_GET["token"]);

            if ($longid1=="2ec9ys77io89s9") {
              if (isset($_GET["key"])){
            $longid = addslashes($_GET["key"]);
            $shortid = substr($longid, 17);

            $trackerlogin = json_decode($backstage->get_tracker_details_of_admin());
            $md5pw=md5("qFtAQwsz".$trackerlogin->tracker_password);

            $found='1';


}}
}else{

 //  $trackerlogin = json_decode($backstage->get_tracker_details_of_admin());
 //  $md5pw=md5("qFtAQwsz".$trackerlogin->tracker_password);

 //  $trackresult= json_decode(getTrackerDetails($trackerlogin->tracker_username, $md5pw));

 // $found='1';
}


?>

<!-- add adminheade.php here -->
<?php include_once("../config/header.php");?>
<?php include_once("navbar.php");?>
  <main>
    <div class="section no-pad-bot" id="index-banner">
      <?php include_once("../config/schoolname.php");?>
      <div class="row">
        <div class="col s12">
        </div>
      </div>
    </div>

<!-- ========================== All Busses div ==================================== -->
        <div id="all_busses_div">
              <?php  if($found == '1'){  ?>
                <div id="map" style="width:97%;height:400px; margin: 15px;"></div>
        </div>

<!-- ============================================================= -->
              
            <?php } else if($found == '0') { ?>
            <div class="row">
                <div class="col s12">
                    <div class="card grey darken-3">
                        <div class="card-content white-text">
                            <span class="card-title center"><span style="color:#80ceff;">No Bus Details Found...</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else {} ?>
        </div>

        </main>

<?php include_once("../config/footer.php");?> 

<?php if (isset($_REQUEST['resp'])) 
{
  if (isset($_SESSION['result_success'])) 
  {
    $result1=$_SESSION['result_success'];
    echo "<script>Materialize.toast('$result1', 3000, 'rounded'); </script>";
  unset($_SESSION['result_success']);
  }
  
} ?>


<!--  ================== Start Map ==================== -->

<script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
          
          var imagePerson='data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjMycHgiIGhlaWdodD0iMzJweCIgdmlld0JveD0iMCAwIDQ4NS4yMTIgNDg1LjIxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDg1LjIxMiA0ODUuMjEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTI4OC4wOTUsNDUuNDljMCwyNS4xMTQtMjAuMzc3LDQ1LjQ4OC00NS40OSw0NS40ODhjLTI1LjExNCwwLTQ1LjQ5LTIwLjM3NC00NS40OS00NS40ODggICBjMC0yNS4xMTMsMjAuMzc2LTQ1LjQ5LDQ1LjQ5LTQ1LjQ5QzI2Ny43MTgsMCwyODguMDk1LDIwLjM3NiwyODguMDk1LDQ1LjQ5eiBNMjcyLjkzMSwxMjEuMzA0aC02MC42NSAgIGMtMTYuNzY1LDAtMzAuMzI3LDEzLjU2Mi0zMC4zMjcsMzAuMzI0VjI3Mi45M2gzMC4zMjd2MTIxLjMwN2g2MC42NVYyNzIuOTNoMzAuMzIyVjE1MS42MjggICBDMzAzLjI1MywxMzQuODY3LDI4OS42OTEsMTIxLjMwNCwyNzIuOTMxLDEyMS4zMDR6IE0zMDMuMjUzLDMwNi40ODJ2MzAuNjI2YzcwLjYzMiw4LjM1NCwxMjEuMzA3LDMwLjczNywxMjEuMzA3LDU3LjEyOSAgIGMwLDMzLjQ5MS04MS40NzMsNjAuNjQ5LTE4MS45NTUsNjAuNjQ5UzYwLjY0OSw0MjcuNzI4LDYwLjY0OSwzOTQuMjM3YzAtMjYuMzkyLDUwLjcwMS00OC43NzUsMTIxLjMwNC01Ny4xMjl2LTMwLjYyNiAgIGMtODIuMjcxLDkuMDA4LTE1MS42MjgsMzcuMDg1LTE1MS42MjgsODcuNzU1YzAsNjIuODM4LDEwNi42MTUsOTAuOTc2LDIxMi4yOCw5MC45NzZjMTA1LjY2MiwwLDIxMi4yODItMjguMTM4LDIxMi4yODItOTAuOTc2ICAgQzQ1NC44ODcsMzQzLjU2NywzODUuNTMsMzE1LjQ5LDMwMy4yNTMsMzA2LjQ4MnoiIGZpbGw9IiMwMDZERjAiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K';
                  
          var imageBus='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAA3QAAAN0BcFOiBwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVFiF7ZZNbBtFFMd/M7vrXdtJjNNUCSWVYzhErYiQ0jZQ3PZSRFGFgBMITpzhhnIpQqCioiJAIuIAqBeQEEIqlyqIA+JDVUWIAhEgOKQfENOWpthpCc6uY3u/hsOW1CZ2ZXNIOORJK828ef/3/8+bjx2hlGIjTW4o+6aATQH/BwG6Pz12UFPieQVb1oNQKOZFGDzL/tmrALpU4oSCO9eDHEAJ7kE3YwIehmgJOifXEqCnGj8t0b4Ia+Aws4/mAPT6gQ8qhyiGaYqexd3aBYZMm2+9nfhKsOT6vNr7MQCi70Ho2tGY1ZlDFU4B8GltL2f9DE5gEA+v81DyHJ+7ewAohXFKf1liYuCTNzTY2yDgtDvKBf8OzpdWeKLHY0VzmKzu40q5Rlpch972Zjjr7uArd5R5u8KoeYlha5nJ6j4A5u0Ktucz3j8wlpk53LPmFBQqLit+cHNifkCx6rbHXGd/1jxKrt/gW/Z8Sq5PqOCFhZwMjdhrDRXIGT9ySe5kW1Kw2/yNId1miF/oSZrssi7fmtHqW23uis0xI1L0JTVy8V/Jald5xJpiOhzktm4DAF9JkOZTIpga6/h3KPofa9wDUkfJEM690goB8e1NN6ruXjQ65cdIusium31l9kBliZa5jDToOrB2KXX7m/aPzz/WnS5jDtzoaAboFmHVp2kuoYEAcJrm0rc8WepYgOhPRw1poOLRBSq7YqzJFdsKsVtfsHqrgfzlKlOzNgC53d1kt1uNAZqJiveCEE0UauQL3Ux9VwSK5O7bRjaTal/AmZlljr/9O34Q7c8PTy1y5JlBDtzbEwVYW1GJXm7UttGkyZnvJcffnMYPwgh/8ixHntvDgdzg2nAE5XpHGCom3lvADxQjwwlGhhP4QeQLw0iQsvqbkIdg3k5oZZh49yf8IKzDh0y888MqftVUiETxOrB6YxSuedhOgBBwbDzDsfEMQoDtBBSueU3LCEBQBiNFYbGC7bhN8C6FxZV6dpTvnNbl/TNH+Xr/W+h+CqBWUzEh+FkpYic++iMKVSAEbq2mRqSULuW5u6guRDvRtdPoSg9qpWXNW7poStcQgs+UwvgX3jOlc0h6bjSLgCuMTeZFs2f5A9nki0qIo/U+odRLX+TLL7cuwX/DNxUAcDDb9TSSxwEIOfll3nm/HfJO8S0FrJdt+JtwU8CmgA0X8DdENWuKnwB43gAAAABJRU5ErkJggg==';

          var map, infoWindow;
          var markerMyLocation;
          var newPos;
          //var contentString = new Array();
          var contentString = {};
          var Markers = {};
                

          function initMap() {

            var mylocation = {lat: 27.687835, lng: 85.343293};

            map = new google.maps.Map(document.getElementById('map'), {
              center: mylocation,
              zoom: 12,
              //disableDefaultUI: true
            });

            infoWindow = new google.maps.InfoWindow;

            // Try HTML5 geolocation
            //Get user current location
            //var pos = new google.maps.LatLng( (Math.random()*(85*2)-85), (Math.random()*(180*2)-180) );
            if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {

                  var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                  };
                  markerMyLocation = new google.maps.Marker({
                    position: pos,
                    map: map,
                    title:"Your Current Location",
                    icon: imagePerson
                  });
                  map.setCenter(pos);


            //Msg of on click on current location
            var infowindowMsg = new google.maps.InfoWindow({
              content:"Your Current Location"
            });

            //click event Listner on markerMyLocation
            google.maps.event.addListener(markerMyLocation, 'mouseover', function() {
              infowindowMsg.open(map,markerMyLocation);
            });
            google.maps.event.addListener(markerMyLocation, 'mouseout', function() {
              infowindowMsg.close(map,markerMyLocation);
            });
            google.maps.event.addListener(markerMyLocation, 'dblclick', function() {
              //map.setCenter(markerMyLocation.getPosition());
              map.panTo(markerMyLocation.getPosition());
              map.setZoom(15);

            });

              }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
              });
            } else {
              // Browser doesn't support Geolocation
              handleLocationError(false, infoWindow, map.getCenter());
            }


           

            //For multiple buses            
            var i=1;

            var TBL=JSON.parse(localStorage.getItem("buses"));
            //debugger;
            
            $.ajax({
              type: "POST",
                url: '../config/get_tracker_info.php',
                dataType: 'json',
                data: {functionname: 'gettrackinfo', arguments: ["<?php echo $trackerlogin->tracker_username; ?>","<?php echo $md5pw; ?>"]},

                success: function (obj, textstatus) {
                    if( !('error' in obj) ) {
                        var businfo = obj.result;
                        businfo.forEach(function(element) {
                                  // debugger;
                                  if(!TBL.includes(element.name)){
                                      //alert(element.name);
                                      return;
                                  }

                                //var latLng = new google.maps.LatLng(element.latitude,element.longitude);
                                var latLng = {lat: element.latitude, lng: element.longitude};

                                var marker = new google.maps.Marker({
                                  position: latLng,
                                  title:"Bus no:"+element.name,
                                  map: map,
                                  icon: imageBus
                                });

                               contentString[i] ='<h5>'+element.name+'</h5>'+
                                '<p><b>Speed:'+element.speed+' km/hr</b><p>' +
                                '<p>Desciption:'+element.description+'</p>'+
                                '<p>last updated:'+element.time+'</p>';

                                google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                                  return function() {
                                    infoWindow.setContent(contentString[i]);
                                    infoWindow.setOptions({maxWidth: 200});
                                    infoWindow.open(map, marker);
                                  }
                                }) (marker, i));
                                google.maps.event.addListener(marker, 'mouseout', (function(marker, i) {
                                  return function() {
                                    infoWindow.close(map, marker);
                                  }
                                }) (marker, i));

                                Markers[i] = marker;

                                  i++;
                          });
                    }
                    else {
                        console.log(obj.error);
                    }
                }
  
            });
/* var obj = <?php echo json_encode($trackresult); ?>;
 console.log(obj)*/

          async function refreshbuses() {
              var j=1;
              //alert('refresed');
              //var object=<?php echo getTrackerDetails($trackerlogin->tracker_username, $md5pw); ?>;

              $.ajax({
              type: "POST",
                url: '../config/get_tracker_info.php',
                dataType: 'json',
                data: {functionname: 'gettrackinfo', arguments: ["<?php echo $trackerlogin->tracker_username; ?>","<?php echo $md5pw; ?>"]},

                success: function (obj, textstatus) {
                    if( !('error' in obj) ) {
                        var businfo = obj.result;

                        console.log(businfo);

                        businfo.forEach(function(element1) {

                          if(!TBL.includes(element1.name)){
                                  return;
                              }

                          //console.log(element.latitude+","+element.longitude);
                          console.log(element1.time);

                            //var latLng = new google.maps.LatLng( (Math.random()*(85*2)-85), (Math.random()*(180*2)-180) );
                             var latLng = new google.maps.LatLng(element1.latitude,element1.longitude);
                              //var latLng = {lat: element.latitude, lng: element.longitude};

                              var myMarker = Markers[j];
                              //var markerPosition = myMarker.getPosition();
                              //map.setCenter(markerPosition);
                              //google.maps.event.trigger(myMarker, 'click');
                              myMarker.setPosition(latLng);

                              //myMarker.contentString("hhhh");
                              
                              contentString[j] ='<h5>'+element1.name+'</h5>'+
                              '<p><b>Speed:'+element1.speed+' km/hr</b><p>' +
                              '<p>Desciption:'+element1.description+'</p>'+
                              '<p>last updated:'+element1.time+'</p>';

                                j++;
                          });

                      }
                      else {
                          console.log(obj.error);
                      }
                  }
    
              });


              y = 15;
               setTimeout(refreshbuses, y*1000);
            }

            refreshbuses();



            async function refreshLocation() {
              
              if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function(position) {

                  newPos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                  };


              markerMyLocation.setPosition(newPos);

                  }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                  });
                } else {
                  // Browser doesn't support Geolocation
                  handleLocationError(false, infoWindow, map.getCenter());
                }

                x = 5;  
               //Materialize.toast('updated', 4000, 'rounded'); 
               setTimeout(refreshLocation, x*1000); 
            }

            refreshLocation();
          } //end of initMap



          function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                                  'Failed to load your current location' :
                                  'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
          }

          google.maps.event.addDomListener(window, 'load', initMap);

    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_UTF6NCoUfYioglesA3UXqWXUOq4fWgo&callback=initMap">
    </script>

   <!--  ====================================== End Map ================================= -->