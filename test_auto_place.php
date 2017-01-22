<!--<html>
       <head>
       <style type="text/css">
               body {
                       font-family: sans-serif;
                       font-size: 14px;
               }
       </style>
       <title>Google Maps JavaScript API v3 Example: Places Autocomplete</title>
       <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
        <script type="text/javascript">
               function initialize() {
				   alert( "test" );
                       var input = document.getElementById('searchTextField');
					   alert( "va"+input );
                       var autocomplete = new google.maps.places.Autocomplete(input);
               }
               google.maps.event.addDomListener(window, 'load', initialize);
       </script>
       </head>
           <body>
               <div>
                       <input id="searchTextField" type="text" size="50" placeholder="Enter a location" autocomplete="on">
               </div>
           </body>
       </html-->
	   
	   
	   <html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    </head>
    <body>
        <input type="text" id="address" style="width: 500px;"></input>

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCgwupCCqrpms0vsY6k4ijoVEeGgNZQnZs&language=en-AU"></script>
        <script>
            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
        </script>
    </body>
</html>
	   
	
<!--html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    </head>
    <body>
        <input type="text" id="address" style="width: 500px;"></input>

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCgwupCCqrpms0vsY6k4ijoVEeGgNZQnZs&language=en-AU"></script>
        <script>
            var autocomplete = new google.maps.places.Autocomplete($("#address")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });
        </script>
    </body>
</html-->