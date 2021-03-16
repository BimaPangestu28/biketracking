import './src/ui/home.dart';
import './src/ui/login.dart';
import './src/blocs/authentication_bloc.dart';
import 'package:flutter/material.dart';

import 'src/blocs/authentication_bloc.dart';

AuthenticationBloc appAuth = new AuthenticationBloc();

void main() async {
  // Set default home.
  Widget _defaultHome = new LoginPage();

  // Get result of the login function.
  bool _result = await appAuth.login();
  if (_result) {
    _defaultHome = new HomePage();
  }

  // Run app!
  runApp(new MaterialApp(
    title: 'App',
    home: _defaultHome,
    routes: <String, WidgetBuilder>{
      // Set routes for using the Navigator.
      '/home': (BuildContext context) => new HomePage(),
      '/login': (BuildContext context) => new LoginPage()
    },
  ));
}
