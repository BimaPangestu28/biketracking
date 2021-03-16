import 'dart:async';
import 'dart:math';
import 'dart:convert';

import 'package:google_sign_in/google_sign_in.dart';
import 'package:flutter_facebook_login/flutter_facebook_login.dart';
import 'package:http/http.dart' as http;

class AuthenticationBloc {
  // Login Fucntion
  Future<bool> login() async {
    return await new Future<bool>.delayed(
        new Duration(seconds: 2), () => new Random().nextBool());
  }

  Future<void> logout() async {
    return await new Future<void>.delayed(new Duration(seconds: 2));
  }

  Future<void> googleLogin() async {
    GoogleSignIn _googleSignIn = GoogleSignIn(
      scopes: [
        'email',
        // you can add extras if you require
      ],
    );

    _googleSignIn.signIn().then((GoogleSignInAccount acc) async {
      GoogleSignInAuthentication auth = await acc.authentication;
      print(acc.id);
      print(acc.email);
      print(acc.displayName);
      print(acc.photoUrl);

      acc.authentication.then((GoogleSignInAuthentication auth) async {
        print(auth.idToken);
        print(auth.accessToken);
      });
    });
  }

  Future<void> facebookLogin() async {
    final facebookLogin = FacebookLogin();
    final facebookLoginResult = await facebookLogin.logIn(['email']);

    print(facebookLoginResult.accessToken);
    print(facebookLoginResult.accessToken.token);
    print(facebookLoginResult.accessToken.expires);
    print(facebookLoginResult.accessToken.permissions);
    print(facebookLoginResult.accessToken.userId);
    print(facebookLoginResult.accessToken.isValid());

    print(facebookLoginResult.errorMessage);
    print(facebookLoginResult.status);

    final token = facebookLoginResult.accessToken.token;

    /// for profile details also use the below code
    final graphResponse = await http.get(Uri.https("https://graph.facebook.com",
        "v2.12/me?fields=name,first_name,last_name,email&access_token=$token"));
    final profile = json.decode(graphResponse.body);
    print(profile);
    /*
    from profile you will get the below params
    {
     "name": "Iiro Krankka",
     "first_name": "Iiro",
     "last_name": "Krankka",
     "email": "iiro.krankka\u0040gmail.com",
     "id": "<user id here>"
    }
   */
  }
}
