import './src/ui/home.dart';
import './src/ui/login.dart';
import './src/ui/login/login.dart';
import './src/ui/login/register.dart';

import './src/ui/splashscreen.dart';
import './src/ui/walktrough.dart';
import './src/blocs/authentication_bloc.dart';
import 'package:flutter/material.dart';

import 'src/blocs/authentication_bloc.dart';

import 'package:flutter_dotenv/flutter_dotenv.dart' as DotEnv;

AuthenticationBloc appAuth = new AuthenticationBloc();

void main() async {
  // Set default home.
  // Widget _defaultHome = new LoginPage();

  await DotEnv.load(fileName: ".env");

  // Run app!
  runApp(new MaterialApp(
    title: 'App',
    theme: ThemeData(primaryColor: Color(0xffD0D620), fontFamily: 'Open Sans'),
    // home: new SplashScreenPage(),
    home: new SplashScreenPage(),
    routes: <String, WidgetBuilder>{
      // Set routes for using the Navigator.
      '/home': (BuildContext context) => new HomePage(),
      '/login': (BuildContext context) => new LoginPage(),
      '/login-form': (BuildContext context) => new LoginFormPage(),
      '/register-form': (BuildContext context) => new RegisterFormPage(),

      '/splashscreen': (BuildContext context) => new SplashScreenPage(),
      '/walktrough': (BuildContext context) => new WalktroughPage(),
    },
  ));
}
