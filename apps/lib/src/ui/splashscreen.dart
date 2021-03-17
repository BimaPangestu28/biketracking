import 'dart:async';
import 'package:flutter/material.dart';
import 'package:localstorage/localstorage.dart';

import '../blocs/authentication_bloc.dart';

AuthenticationBloc appAuth = new AuthenticationBloc();

class SplashScreenPage extends StatefulWidget {
  @override
  _SplashScreen createState() => _SplashScreen();
}

class _SplashScreen extends State<SplashScreenPage> {
  void initState() {
    super.initState();
    startSplashScreen();
  }

  startSplashScreen() {
    final LocalStorage storage = new LocalStorage('pityu');
    var duration = const Duration(seconds: 1);

    // Get result of the login function.
    String redirectPath = "/login";
    if (storage.getItem('auth') != "null") {
      redirectPath = "/home";
    }

    if (storage.getItem('showWalktrough') == "null") {
      redirectPath = "/walktrough";
    }

    return Timer(duration, () {
      Navigator.of(context).pushReplacementNamed(redirectPath);
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: <Widget>[
            Image(
              image: AssetImage("assets/images/logo.png"),
              width: 150,
            )
          ],
        ),
      ),
    );
  }
}
