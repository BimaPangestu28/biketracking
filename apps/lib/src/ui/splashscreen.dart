import 'dart:async';
import 'package:flutter/material.dart';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';

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

  startSplashScreen() async {
    final storage = new FlutterSecureStorage();
    var duration = const Duration(seconds: 1);

    final auth = await storage.read(key: "auth");
    final showWalktrough = await storage.read(key: "showWalktrough");

    // Get result of the login function.
    String redirectPath = "/login";
    if (auth != null) {
      redirectPath = "/home";
    }

    if (showWalktrough == null || showWalktrough != "false") {
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
