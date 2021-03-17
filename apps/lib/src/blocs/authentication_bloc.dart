import 'dart:async';
import 'dart:math';
// import 'dart:convert';

// import 'package:google_sign_in/google_sign_in.dart';
// import 'package:flutter_facebook_login/flutter_facebook_login.dart';
// import 'package:http/http.dart' as http;

class AuthenticationBloc {
  // Login Fucntion
  Future<bool> login() async {
    return await new Future<bool>.delayed(
        new Duration(seconds: 2), () => new Random().nextBool());
  }

  Future<void> logout() async {
    return await new Future<void>.delayed(new Duration(seconds: 2));
  }
}
