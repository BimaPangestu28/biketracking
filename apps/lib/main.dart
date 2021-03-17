import './src/ui/home.dart';
import './src/ui/login.dart';
import './src/ui/splashscreen.dart';
import './src/ui/walktrough.dart';
import './src/blocs/authentication_bloc.dart';
import 'package:flutter/material.dart';

import 'src/blocs/authentication_bloc.dart';

AuthenticationBloc appAuth = new AuthenticationBloc();

void main() async {
  // Set default home.
  // Widget _defaultHome = new LoginPage();

  // Run app!
  runApp(new MaterialApp(
    title: 'App',
    // home: new SplashScreenPage(),
    home: new SplashScreenPage(),
    routes: <String, WidgetBuilder>{
      // Set routes for using the Navigator.
      '/home': (BuildContext context) => new HomePage(),
      '/login': (BuildContext context) => new LoginPage(),
      '/splashscreen': (BuildContext context) => new SplashScreenPage(),
      '/walktrough': (BuildContext context) => new WalktroughPage(),
    },
  ));
}
