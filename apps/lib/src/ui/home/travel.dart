import 'dart:async';

import 'package:flutter/material.dart';
import 'package:flutter_polyline_points/flutter_polyline_points.dart';
import 'package:geocoding/geocoding.dart';
import 'package:geolocator/geolocator.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';

import 'dart:math' show cos, sqrt, asin;

class TravelWidget extends StatefulWidget {
  @override
  TravelWidgetState createState() => TravelWidgetState();
}

class TravelWidgetState extends State<TravelWidget> {
  CameraPosition _initialLocation = CameraPosition(target: LatLng(0.0, 0.0));
  GoogleMapController mapController;
  StreamSubscription<Position> _positionStreamSubscription;
  Map<PolylineId, Polyline> polylines = {};

  int hours = 0;
  int minutes = 0;
  int seconds = 0;

  Position _currentPosition;
  String _currentAddress;

  final startAddressController = TextEditingController();
  final destinationAddressController = TextEditingController();

  final startAddressFocusNode = FocusNode();
  final desrinationAddressFocusNode = FocusNode();
  bool start = false;

  Set<Marker> markers = {};

  PolylinePoints polylinePoints;
  List<LatLng> polylineCoordinates = [];

  // Starting point latitude
  double _originLatitude = 0;
  // Starting point longitude
  double _originLongitude = 0;
  // Destination latitude
  double _destLatitude = 6.849660;
  // Destination Longitude
  double _destLongitude = 3.648190;

  final _scaffoldKey = GlobalKey<ScaffoldState>();

  // Method when map created
  void _onMapCreated(GoogleMapController controller) {
    mapController = controller;

    final positionStream = Geolocator.getPositionStream();
    _positionStreamSubscription = positionStream.handleError((error) {
      _positionStreamSubscription?.cancel();
      _positionStreamSubscription = null;
    }).listen((position) => {this._getCurrentLocation(position.speed)});
    // _positionStreamSubscription?.pause();

    new Future.delayed(const Duration(seconds: 1), () {
      mapController.animateCamera(
        CameraUpdate.newCameraPosition(
          CameraPosition(
            target:
                LatLng(_currentPosition.latitude, _currentPosition.longitude),
            zoom: 18.0,
          ),
        ),
      );
    });
  }

  // Method for retrieving the current location
  _getCurrentLocation(_speed) async {
    await Geolocator.getCurrentPosition(desiredAccuracy: LocationAccuracy.high)
        .then((Position position) async {
      setState(() {
        if (_originLatitude == 0) {
          _originLatitude = position.latitude;
          _originLongitude = position.longitude;
        }

        _currentPosition = position;
        print('CURRENT POS: $_currentPosition');
        print('CURRENT SPEED: ' + _speed.toString()); // Meter per second
        mapController.animateCamera(
          CameraUpdate.newCameraPosition(
            CameraPosition(
              target: LatLng(position.latitude, position.longitude),
              zoom: 18.0,
            ),
          ),
        );
      });
      await _createPolylines(
          Position(latitude: _originLatitude, longitude: _originLongitude),
          Position(latitude: position.latitude, longitude: position.longitude));
    }).catchError((e) {
      print(e);
    });
  }

  // Formula for calculating distance between two coordinates
  // https://stackoverflow.com/a/54138876/11910277
  double _coordinateDistance(lat1, lon1, lat2, lon2) {
    var p = 0.017453292519943295;
    var c = cos;
    var a = 0.5 -
        c((lat2 - lat1) * p) / 2 +
        c(lat1 * p) * c(lat2 * p) * (1 - c((lon2 - lon1) * p)) / 2;
    return 12742 * asin(sqrt(a));
  }

  // Create the polylines for showing the route between two places
  _createPolylines(Position start, Position destination) async {
    polylinePoints = PolylinePoints();
    PolylineResult result = await polylinePoints.getRouteBetweenCoordinates(
      "AIzaSyDRf6O9hge6_RkX81e2D97xhZATYhuXKBM", // Google Maps API Key
      PointLatLng(start.latitude, start.longitude),
      PointLatLng(destination.latitude, destination.longitude),
      travelMode: TravelMode.transit,
    );

    if (result.points.isNotEmpty) {
      result.points.forEach((PointLatLng point) {
        if (polylineCoordinates.length > 1) {
          polylineCoordinates[1] = LatLng(point.latitude, point.longitude);
        } else {
          polylineCoordinates.add(LatLng(point.latitude, point.longitude));
        }
        print(polylineCoordinates);
      });
    }

    polylines = {};

    PolylineId id = PolylineId('poly');
    Polyline polyline = Polyline(
      polylineId: id,
      color: Colors.red,
      points: polylineCoordinates,
      width: 3,
    );
    polylines[id] = polyline;
    print(id);
  }

  @override
  void initState() {
    super.initState();
    _getCurrentLocation({});
  }

  @override
  Widget build(BuildContext context) {
    var height = MediaQuery.of(context).size.height;
    var width = MediaQuery.of(context).size.width;
    return Container(
      height: height,
      width: width,
      child: Scaffold(
        key: _scaffoldKey,
        body: Column(
          children: <Widget>[
            SizedBox(
              width: MediaQuery.of(context)
                  .size
                  .width, // or use fixed size like 200
              height: MediaQuery.of(context).size.height - 400,
              child: Stack(
                children: [
                  // Map View
                  GoogleMap(
                    markers: markers != null ? Set<Marker>.from(markers) : null,
                    initialCameraPosition: _initialLocation,
                    myLocationEnabled: true,
                    myLocationButtonEnabled: false,
                    mapType: MapType.normal,
                    zoomGesturesEnabled: true,
                    zoomControlsEnabled: false,
                    polylines: Set<Polyline>.of(polylines.values),
                    onMapCreated: _onMapCreated,
                  ),
                  // Show zoom buttons
                  SafeArea(
                    child: Padding(
                      padding: const EdgeInsets.only(left: 10.0),
                      child: Column(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: <Widget>[
                          ClipOval(
                            child: Material(
                              color: Colors.blue[100], // button color
                              child: InkWell(
                                splashColor: Colors.blue, // inkwell color
                                child: SizedBox(
                                  width: 50,
                                  height: 50,
                                  child: Icon(Icons.add),
                                ),
                                onTap: () {
                                  mapController.animateCamera(
                                    CameraUpdate.zoomIn(),
                                  );
                                },
                              ),
                            ),
                          ),
                          SizedBox(height: 20),
                          ClipOval(
                            child: Material(
                              color: Colors.blue[100], // button color
                              child: InkWell(
                                splashColor: Colors.blue, // inkwell color
                                child: SizedBox(
                                  width: 50,
                                  height: 50,
                                  child: Icon(Icons.remove),
                                ),
                                onTap: () {
                                  mapController.animateCamera(
                                    CameraUpdate.zoomOut(),
                                  );
                                },
                              ),
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                  SafeArea(
                    child: Align(
                      alignment: Alignment.bottomRight,
                      child: Padding(
                        padding:
                            const EdgeInsets.only(right: 10.0, bottom: 10.0),
                        child: ClipOval(
                          child: Material(
                            color: Colors.orange[100], // button color
                            child: InkWell(
                              splashColor: Colors.orange, // inkwell color
                              child: SizedBox(
                                width: 56,
                                height: 56,
                                child: Icon(Icons.my_location),
                              ),
                              onTap: () {
                                mapController.animateCamera(
                                  CameraUpdate.newCameraPosition(
                                    CameraPosition(
                                      target: LatLng(
                                        _currentPosition.latitude,
                                        _currentPosition.longitude,
                                      ),
                                      zoom: 18.0,
                                    ),
                                  ),
                                );
                              },
                            ),
                          ),
                        ),
                      ),
                    ),
                  ),
                ],
              ),
            ),
            Column(
              children: [
                Container(
                  child: Text("$hours:$minutes:$seconds"),
                ),
                ElevatedButton(
                    onPressed: () {
                      setState(() {
                        start = !start;

                        if (start) {
                          Timer.periodic(Duration(seconds: 1), (Timer timer) {
                            setState(() {
                              seconds++;
                            });
                          });
                        }
                      });
                    },
                    child: Text(start ? "Berhenti" : "Start sekarang"))
              ],
            )
          ],
        ),
      ),
    );
  }
}
