@include("layout-2.top")

<body class="template-color-1">
    <div class="main-wrapper">
        <!-- Begin Contact Main Page Area -->
        <div class="contact-main-page">
            <div class="container-fluid">
                <iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=KARELIYA%20INFOTECH,%20317,%203rd%20Floor,%20Polaris%20Commercial%20Mall%20BRTS,%20Canal%20Rd,%20Surat,%20Gujarat%20395010+(Kareliya%20Infoteach)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="500" frameborder="0"><a href="https://www.gps.ie/golf-gps/">best golf gps</a></iframe>
            <!-- <div id="google-map"></div> -->
            </div>
            <div class="container-fluid">

            
                <!-- <div class="row">
                    <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                        <div class="contact-page-side-content">
                            <h3 class="contact-page-title">Contact Us</h3>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-fax"></i> Address</h4>
                                <p>13, opp. arihant complex, near guru krupa school, Harinagar-2, Harinagar, Udhna, Surat, Gujarat 394210</p>
                            </div>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-phone"></i> Phone</h4>
                                <p>Mobile: 09016255540</p>
                                <p>Mobile: 09376107608</p>
                                <p>Mobile: 09662893535</p>
                                <p>Mobile: 09328680789</p>
                            </div>
                            <div class="single-contact-block">
                                <h4><i class="fab fa-whatsapp"></i> WhatsApp</h4>

                                <a href="https://wa.me/+918866797138" data-toggle="tooltip" target="_blank" title="WhatsApp"> +91 8866797138 </a>

                            </div>
                            <div class="single-contact-block last-child">
                                <h4><i class="fa fa-envelope-o"></i> Email</h4>
                                 <a href="mailto://jemosaigroup@gmail.com">jemosaigroup@gmail.com</a>

                            </div>
                            <p class="contact-page-message">
                                <h4>Business Hours</h4>
                                <br>
                                Monday:	9:00 AM – 10:00 PM
                                <br>
                                Tuesday:	9:00 AM – 10:00 PM
                                <br>
                                Wednesday:	9:00 AM – 10:00 PM
                                <br>
                                Thrusday:	9:00 AM – 10:00 PM
                                <br>
                                Friday:	9:00 AM – 10:00 PM
                                <br>
                                Saturday:	9:00 AM – 05:00 PM
                                <br>
                            </p>
                        </div>
                    </div>

                </div> -->

            <div class="contact-page-side-content">
                <h3 class="contact-page-title">Contact Us</h3>
                <br>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Address</h4>
                        <br>
                        <p> 13, opp. arihant complex, near guru krupa school, </p>
                        <p> Harinagar, Udhna, Surat, Gujarat 394210</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Phone</h4>
                        <br>
                        <p>Mobile: 09016255540 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile: 09376107608</p>
                        <p>Mobile: 09662893535 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile: 09328680789</p>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <p class="contact-page-message">
                        <h4>Business Hours</h4>
                        <br>

                        Monday:	9:00 AM – 10:00 PM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Tuesday:	9:00 AM – 10:00 PM
                        <br>
                        Wednesday:	9:00 AM – 10:00 PM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Thrusday:	9:00 AM – 10:00 PM
                        <br>
                        Friday:	9:00 AM – 10:00 PM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Saturday:	9:00 AM – 05:00 PM
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="single-contact-block">
                        <h4><i class="fab fa-whatsapp"></i> WhatsApp</h4>
                        <br>
                        <a href="https://wa.me/+91 9016201780" data-toggle="tooltip" target="_blank" title="WhatsApp"> +91 9016201780 </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <br>
                            <a href="mailto://nityanandjha13578@gmail.com">nityanandjha13578@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>


        </div>
        <!-- Contact Main Page Area End Here -->
    </div>

    @include("layout-2.script")

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <!-- Begin Uren's Google Map Area -->
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>

    <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 12,
                scrollwheel: false,
                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(40.740610, -73.935242), // New York
                // How you would like to style the map.
                // This is where you would paste any style found on
                styles: [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#e9e9e9"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 17
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 29
                            },
                            {
                                "weight": 0.2
                            }
                        ]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 18
                            }
                        ]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f5f5f5"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#dedede"
                            },
                            {
                                "lightness": 21
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{
                                "visibility": "on"
                            },
                            {
                                "color": "#ffffff"
                            },
                            {
                                "lightness": 16
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                                "saturation": 36
                            },
                            {
                                "color": "#333333"
                            },
                            {
                                "lightness": 40
                            }
                        ]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "geometry",
                        "stylers": [{
                                "color": "#f2f2f2"
                            },
                            {
                                "lightness": 19
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 20
                            }
                        ]
                    },
                    {
                        "featureType": "administrative",
                        "elementType": "geometry.stroke",
                        "stylers": [{
                                "color": "#fefefe"
                            },
                            {
                                "lightness": 17
                            },
                            {
                                "weight": 1.2
                            }
                        ]
                    }
                ]
            };
            // Get the HTML DOM element that will contain your map
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('google-map');
            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);
            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(21.162874, 72.84013),
                map: map,
                title: 'Limupa',
                animation: google.maps.Animation.BOUNCE
            });
        }
    </script>
    <!-- Uren's Google Map Area End Here -->

</body>


</html>
