import 'dart:async';
import 'dart:io';

import 'package:flutter/material.dart';
import 'package:flutter_polyline_points/flutter_polyline_points.dart';
import 'package:geolocator/geolocator.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:image_picker/image_picker.dart';

import 'dart:math' show cos, sqrt, asin;

import 'package:rflutter_alert/rflutter_alert.dart';

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
  double _lastLatitude = 0;
  // Starting point longitude
  double _lastLongitude = 0;
  double _originLongitude = 0;
  String distance = "0";

  final _scaffoldKey = GlobalKey<ScaffoldState>();

  // Start Soptwatch
  Stopwatch watch = Stopwatch();
  Timer timer;
  bool startStop = true;
  String speed = "0.00";
  List speedCollection = [];

  String elapsedTime = '00:00:00';

  updateTime(Timer timer) {
    if (watch.isRunning) {
      setState(() {
        elapsedTime = transformMilliSeconds(watch.elapsedMilliseconds);
      });
    }
  }

  openAlert() {
    if (!start) {
      return Alert(
          context: context,
          title: "Pilih Perjalanan\nMenyenangkan Kamu",
          content: Column(
            children: <Widget>[
              Row(
                children: [
                  Container(
                    child: Column(
                      children: [
                        GestureDetector(
                          onTap: () =>
                              {startOrStop(), Navigator.of(context).pop()},
                          child: Container(
                            padding: const EdgeInsets.all(25),
                            decoration: BoxDecoration(
                              color: Colors.white,
                              borderRadius: BorderRadius.all(10),
                              boxShadow: [
                                BoxShadow(
                                  color: Colors.grey.withOpacity(0.5),
                                  spreadRadius: 5,
                                  blurRadius: 7,
                                  offset: Offset(
                                      0, 3), // changes position of shadow
                                ),
                              ],
                            ),
                            child: Column(
                              children: [
                                Image(
                                    image: AssetImage(
                                        "assets/images/bycle_icon.png")),
                                Text("Sepeda")
                              ],
                            ),
                          ),
                        )
                      ],
                    ),
                  )
                ],
              )
            ],
          )).show();
    }
  }

  startOrStop() async {
    if (startStop) {
      setState(() {
        start = true;
      });

      await Geolocator.getCurrentPosition(
              desiredAccuracy: LocationAccuracy.high)
          .then((Position position) async {
        setState(() {
          _originLatitude = position.latitude;
          _originLongitude = position.longitude;
          _lastLatitude = position.latitude;
          _lastLongitude = position.longitude;
        });

        mapController.animateCamera(
          CameraUpdate.zoomIn(),
        );
      }).catchError((e) {
        print(e);
      });

      startWatch();
    } else {
      await Geolocator.getCurrentPosition(
              desiredAccuracy: LocationAccuracy.high)
          .then((Position position) async {
        setState(() {
          _originLatitude = position.latitude;
          _originLongitude = position.longitude;
          _lastLatitude = position.latitude;
          _lastLongitude = position.longitude;
          start = false;
          polylines.clear();
          polylineCoordinates = [];
          hours = 0;
          minutes = 0;
          seconds = 0;
        });
      }).catchError((e) {
        print(e);
      });

      stopWatch();
    }
  }

  startWatch() {
    setState(() {
      startStop = false;
      watch.start();
      timer = Timer.periodic(Duration(milliseconds: 100), updateTime);
    });
  }

  stopWatch() {
    setState(() {
      startStop = true;
      watch.stop();
      setTime();
    });
  }

  setTime() {
    var timeSoFar = watch.elapsedMilliseconds;
    setState(() {
      elapsedTime = transformMilliSeconds(timeSoFar);
    });
  }

  transformMilliSeconds(int milliseconds) {
    int hundreds = (milliseconds / 10).truncate();
    int seconds = (hundreds / 100).truncate();
    int minutes = (seconds / 60).truncate();
    int hours = (minutes / 60).truncate();

    String hoursStr = (hours % 60).toString().padLeft(2, '0');
    String minutesStr = (minutes % 60).toString().padLeft(2, '0');
    String secondsStr = (seconds % 60).toString().padLeft(2, '0');

    return "$hoursStr:$minutesStr:$secondsStr";
  }
  // Stop Stopwatch

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
        _currentPosition = position;
        final _distance = _coordinateDistance(_lastLatitude, _lastLongitude,
            position.latitude, position.longitude);

        if (start) {
          speedCollection.add(_speed);
          speed = _speed.toString();
          distance = (double.parse(distance) + _distance)
              .toStringAsFixed(2)
              .toString();
          _lastLatitude = position.latitude;
          _lastLongitude = position.longitude;
        } else {
          speed = "0.00";
          distance = "0";
        }
        mapController.animateCamera(
          CameraUpdate.newCameraPosition(
            CameraPosition(
              target: LatLng(position.latitude, position.longitude),
              zoom: 18.0,
            ),
          ),
        );
      });

      if (start) {
        await _createPolylines(
            Position(latitude: _originLatitude, longitude: _originLongitude),
            Position(
                latitude: position.latitude, longitude: position.longitude));
      }
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

    polylineCoordinates
        .add(LatLng(destination.latitude, destination.longitude));

    polylines = {};

    PolylineId id = PolylineId('poly');
    Polyline polyline = Polyline(
      polylineId: id,
      color: Colors.red,
      points: polylineCoordinates,
      width: 3,
    );
    polylines[id] = polyline;
  }

  File _image;
  final picker = ImagePicker();

  Future getImage() async {
    final pickedFile = await picker.getImage(source: ImageSource.camera);

    setState(() {
      if (pickedFile != null) {
        _image = File(pickedFile.path);
      } else {
        print('No image selected.');
      }
    });
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
              height: MediaQuery.of(context).size.height * .5,
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
                  margin: EdgeInsets.only(top: 20),
                  child: Text(
                    "Durasi Waktu",
                    style: TextStyle(fontSize: 18),
                  ),
                ),
                Container(
                  margin: EdgeInsets.only(top: 5, bottom: 10),
                  child: Text(
                    elapsedTime,
                    style: TextStyle(fontSize: 32),
                  ),
                ),
                Container(
                  margin: EdgeInsets.only(bottom: 30, top: 10),
                  child: Row(
                    children: [
                      Expanded(
                        flex: 4,
                        child: Column(
                          children: [
                            Text(
                              "Jarak \n (km)",
                              textAlign: TextAlign.center,
                            ),
                            Container(
                                child: Text(
                                  distance,
                                  style: TextStyle(fontSize: 24),
                                  textAlign: TextAlign.center,
                                ),
                                margin: EdgeInsets.only(top: 5)),
                          ],
                        ),
                      ),
                      Expanded(
                          child: Column(
                            children: [
                              Text(
                                "Kilokalori \n (kkal)",
                                textAlign: TextAlign.center,
                              ),
                              Container(
                                  child: Text(
                                    "0",
                                    style: TextStyle(fontSize: 24),
                                    textAlign: TextAlign.center,
                                  ),
                                  margin: EdgeInsets.only(top: 5)),
                            ],
                          ),
                          flex: 4),
                      Expanded(
                        child: Column(
                          children: [
                            Text(
                              "Kecepatan \n (m/jam)",
                              textAlign: TextAlign.center,
                            ),
                            Container(
                                child: Text(
                                  speed,
                                  style: TextStyle(fontSize: 24),
                                  textAlign: TextAlign.center,
                                ),
                                margin: EdgeInsets.only(top: 5)),
                          ],
                        ),
                        flex: 4,
                      )
                    ],
                  ),
                ),
                Row(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: [
                    Visibility(
                        visible: start,
                        child: Container(
                          margin: EdgeInsets.only(right: 10),
                          child: GestureDetector(
                            onTap: getImage,
                            child: Container(
                              width: 50.0,
                              height: 50.0,
                              decoration: new BoxDecoration(
                                  color: Colors.white,
                                  shape: BoxShape.circle,
                                  image: new DecorationImage(
                                      fit: BoxFit.scaleDown,
                                      image: AssetImage(
                                          "assets/images/photo-camera-icon.png"))),
                            ),
                          ),
                        )),
                    Container(
                      child: ElevatedButton(
                        onPressed: openAlert,
                        style: ButtonStyle(
                            shape: MaterialStateProperty.all<
                                RoundedRectangleBorder>(RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(50.0),
                            )),
                            backgroundColor:
                                MaterialStateProperty.all(Color(0xff5CC6D0)),
                            padding: MaterialStateProperty.all(
                                EdgeInsets.symmetric(
                                    vertical: 15, horizontal: 50)),
                            elevation: MaterialStateProperty.all(0)),
                        child: Text(start ? "Berhenti" : "Start sekarang",
                            style: TextStyle(fontSize: 18)),
                      ),
                    )
                  ],
                )
              ],
            )
          ],
        ),
      ),
    );
  }
}
