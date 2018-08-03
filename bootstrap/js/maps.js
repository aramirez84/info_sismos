var customLabel = {
        Escuela: {
          label: 'Es'
        },
        Edificio: {
          label: 'Ed'
        },
        Plaza: {
          label: 'Pl'
        },
        Embarcadero: {
          label: 'EM'
        },
        Iglesia: {
          label: 'Ig'
        }
      };
 var datos = [];
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(19.424530, -99.134076),
          zoom: 10
        });
        
        var infoWindow = new google.maps.InfoWindow;
        $('select').change(function (){
            var zoom=map.getZoom();
            if(zoom!=10){
                map.setZoom(10);
                infoWindow.close();
                DeleteMarkers(datos);
            }
        valor = $(this).val();
        opcion = $(this).attr('id');
        buscar(valor,opcion);
        });
        function buscar(valor,opcion)
        {
       

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/sismos/index.php/principal/busca_info',function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var bounds  = new google.maps.LatLngBounds();    
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));
              bounds.extend(point);
              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label,
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
                map.fitBounds(bounds); 
                map.panToBounds(bounds);
              });
              datos = marker;
            });
          });
        }
    }

    function DeleteMarkers(datos) {
        //Loop through all the markers and remove
        var markers = datos;
        setMapOnAll(null);
        for (var i = 0; i < markers.length; i++) {
            console.log(markers[i]);
            markers[i].setMap(null);
        }
        markers = [];
    };
      function downloadUrl(url,callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState === 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };
        
        request.open('POST', url, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("opcion="+opcion+"&valor="+valor);
      }
      function doNothing() {}