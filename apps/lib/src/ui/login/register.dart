import 'package:flutter/material.dart';
import 'package:localstorage/localstorage.dart';

import '../../blocs/authentication_bloc.dart';

AuthenticationBloc appAuth = new AuthenticationBloc();

class RegisterFormPage extends StatefulWidget {
  @override
  State<StatefulWidget> createState() => new _RegisterFormPageState();
}

class _RegisterFormPageState extends State<RegisterFormPage> {
  final LocalStorage storage = new LocalStorage('pityu');

  TextEditingController nameController = new TextEditingController();
  TextEditingController emailController = new TextEditingController();
  TextEditingController passwordController = new TextEditingController();

  @override
  Widget build(BuildContext context) => new Scaffold(
        body: new Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage("assets/images/background_login_form.png"),
                fit: BoxFit.cover,
              ),
            ),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.center,
              children: [
                Container(
                  margin: EdgeInsets.only(
                      bottom: 10,
                      right: MediaQuery.of(context).size.height * .085,
                      left: MediaQuery.of(context).size.height * .085),
                  child: TextField(
                    textAlign: TextAlign.center,
                    controller: nameController,
                    decoration: InputDecoration(
                      hintText: 'Masukkan nama kamu',
                      filled: true,
                      fillColor: Colors.white,
                      contentPadding: const EdgeInsets.only(
                          left: 14.0, bottom: 8.0, top: 8.0),
                      focusedBorder: OutlineInputBorder(
                        borderSide: BorderSide(color: Colors.white),
                        borderRadius: BorderRadius.circular(25.7),
                      ),
                      enabledBorder: UnderlineInputBorder(
                        borderSide: BorderSide(color: Colors.white),
                        borderRadius: BorderRadius.circular(25.7),
                      ),
                    ),
                  ),
                ),
                Container(
                  margin: EdgeInsets.only(
                      bottom: 10,
                      right: MediaQuery.of(context).size.height * .085,
                      left: MediaQuery.of(context).size.height * .085),
                  child: TextField(
                    textAlign: TextAlign.center,
                    controller: emailController,
                    decoration: InputDecoration(
                      hintText: 'Masukkan email kamu',
                      filled: true,
                      fillColor: Colors.white,
                      contentPadding: const EdgeInsets.only(
                          left: 14.0, bottom: 8.0, top: 8.0),
                      focusedBorder: OutlineInputBorder(
                        borderSide: BorderSide(color: Colors.white),
                        borderRadius: BorderRadius.circular(25.7),
                      ),
                      enabledBorder: UnderlineInputBorder(
                        borderSide: BorderSide(color: Colors.white),
                        borderRadius: BorderRadius.circular(25.7),
                      ),
                    ),
                  ),
                ),
                Container(
                  margin: EdgeInsets.only(
                      bottom: 40,
                      right: MediaQuery.of(context).size.height * .085,
                      left: MediaQuery.of(context).size.height * .085),
                  child: TextField(
                    controller: passwordController,
                    obscureText: true,
                    textAlign: TextAlign.center,
                    decoration: InputDecoration(
                      hintText: 'Password',
                      filled: true,
                      fillColor: Colors.white,
                      contentPadding: const EdgeInsets.only(
                          left: 14.0, bottom: 8.0, top: 8.0),
                      focusedBorder: OutlineInputBorder(
                        borderSide: BorderSide(color: Colors.white),
                        borderRadius: BorderRadius.circular(25.7),
                      ),
                      enabledBorder: UnderlineInputBorder(
                        borderSide: BorderSide(color: Colors.white),
                        borderRadius: BorderRadius.circular(25.7),
                      ),
                    ),
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
                            MaterialStateProperty.all(Color(0xffD0D620)),
                        padding: MaterialStateProperty.all(EdgeInsets.symmetric(
                            vertical: 15, horizontal: 100)),
                        elevation: MaterialStateProperty.all(0)),
                    child: Text(
                      "Daftar",
                      style: TextStyle(fontSize: 18, color: Color(0xffffffff)),
                    ),
                    onPressed: () {
                      appAuth.register(context, {
                        "name": nameController.text,
                        "email": emailController.text,
                        "password": passwordController.text
                      });
                    },
                  ),
                ),
                Container(
                    margin: EdgeInsets.only(top: 15),
                    child: GestureDetector(
                      child: Text('Sudah memiliki akun',
                          style: TextStyle(color: Colors.white)),
                      onTap: () => {
                        Navigator.of(context)
                            .pushReplacementNamed("/login-form")
                      },
                    ))
              ],
            )),
      );
}
