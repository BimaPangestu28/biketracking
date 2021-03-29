import 'dart:async';
import 'package:flutter/material.dart';
import 'package:flutter_dotenv/flutter_dotenv.dart';
import 'dart:convert';
import '../helpers/toast.dart';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';

import 'package:http/http.dart' as http;

class AuthenticationBloc {
  final storage = new FlutterSecureStorage();
  final _baseUrl = env['IS_PRODUCTION'] == "true"
      ? env['PROD_BASE_URL']
      : env['DEV_BASE_URL'];

  // Login Fucntion
  Future<bool> login(context, data) async {
    final url = Uri.parse('$_baseUrl/login');
    final response = await http.post(url, body: data);

    final responeJson = json.decode(response.body);
    final name = responeJson['success']['name'];

    if (response.statusCode != 200) {
      Utils.displayToast("E-mail atau password salah");
      throw new Exception('error');
    }

    Utils.displayToast("Selamat $name kamu berhasil masuk");
    await storage.write(key: "auth", value: responeJson['success']['token']);
    Navigator.of(context).pushReplacementNamed("/home");

    return true;
  }

  // Register Fucntion
  Future<bool> register(context, data) async {
    final url = Uri.parse('$_baseUrl/register');

    final response = await http.post(url, body: data);
    final responeJson = json.decode(response.body)["error"];

    if (response.statusCode == 401) {
      try {
        Utils.displayToast(responeJson);
      } catch (e) {}

      try {
        Utils.displayToast(responeJson["password"][0]);
      } catch (e) {}

      try {
        Utils.displayToast(responeJson["email"][0]);
      } catch (e) {}

      try {
        Utils.displayToast(responeJson["name"][0]);
      } catch (e) {}
    }

    if (response.statusCode != 200) {
      throw new Exception('error');
    }

    Utils.displayToast("Selamat! Akun mu berhasil didaftarkan");
    Navigator.of(context).pushReplacementNamed("/login-form");

    return true;
  }

  Future<void> logout() async {
    return await new Future<void>.delayed(new Duration(seconds: 2));
  }
}
