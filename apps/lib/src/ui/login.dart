import 'package:flutter/material.dart';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';

class LoginPage extends StatefulWidget {
  @override
  State<StatefulWidget> createState() => new _LoginPageState();
}

class _LoginPageState extends State<LoginPage> {
  final storage = new FlutterSecureStorage();

  @override
  Widget build(BuildContext context) => new Scaffold(
        body: new Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage("assets/images/background_login.png"),
                fit: BoxFit.cover,
              ),
            ),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                new Center(
                    child: Image(
                  image: AssetImage("assets/images/logo.png"),
                  width: 150,
                  height: 150,
                )),
                Container(
                  margin: EdgeInsets.symmetric(vertical: 40, horizontal: 100),
                  child: Text(
                    "Rute Kebersamaan Perjalanan Kamu",
                    style: TextStyle(fontSize: 18),
                    textAlign: TextAlign.center,
                  ),
                ),
                Container(
                  child: ElevatedButton(
                    style: ButtonStyle(
                        shape:
                            MaterialStateProperty.all<RoundedRectangleBorder>(
                                RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(50.0),
                        )),
                        backgroundColor:
                            MaterialStateProperty.all(Color(0xff5CC6D0)),
                        padding: MaterialStateProperty.all(EdgeInsets.symmetric(
                            vertical: 15, horizontal: 100)),
                        elevation: MaterialStateProperty.all(0)),
                    child: Text(
                      "Masuk",
                      style: TextStyle(fontSize: 18, color: Color(0xffffffff)),
                    ),
                    onPressed: () {
                      Navigator.of(context).pushReplacementNamed("/login-form");
                    },
                  ),
                ),
                Container(
                  margin: EdgeInsets.only(top: 20),
                  child: ElevatedButton(
                    style: ButtonStyle(
                        shape:
                            MaterialStateProperty.all<RoundedRectangleBorder>(
                                RoundedRectangleBorder(
                          borderRadius: BorderRadius.circular(50.0),
                        )),
                        backgroundColor:
                            MaterialStateProperty.all(Color(0xff5CC6D0)),
                        padding: MaterialStateProperty.all(EdgeInsets.symmetric(
                            vertical: 15, horizontal: 100)),
                        elevation: MaterialStateProperty.all(0)),
                    child: Text(
                      "Daftar",
                      style: TextStyle(fontSize: 18, color: Color(0xffffffff)),
                    ),
                    onPressed: () {
                      Navigator.of(context)
                          .pushReplacementNamed("/register-form");
                    },
                  ),
                )
              ],
            )),
      );
}
