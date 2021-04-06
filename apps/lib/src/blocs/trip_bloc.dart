import 'dart:async';
import 'package:flutter/material.dart';
import 'package:flutter_dotenv/flutter_dotenv.dart';
import 'dart:convert';
import '../helpers/toast.dart';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';

import 'package:http/http.dart' as http;

class TripBloc {
  final storage = new FlutterSecureStorage();
  final _baseUrl = env['IS_PRODUCTION'] == "true"
      ? env['PROD_BASE_URL']
      : env['DEV_BASE_URL'];

  // Start Fucntion
  Future<bool> start(context, data) async {
    final url = Uri.parse('$_baseUrl/login');
    final response = await http.post(url, body: data);

    final responeJson = json.decode(response.body);
    final name = responeJson['success']['name'];

    if (response.statusCode != 200) {
      Utils.displayToast("Terjadi kesalahan pada server");
      throw new Exception('error');
    }

    return true;
  }

  // Start Fucntion
  Future<bool> getCategories() async {
    final url = Uri.parse('$_baseUrl/trips/categories');
    final response = await http.get(url);
    print(url);
    print(json.decode(response.body));
    final responeJson = json.decode(response.body);

    if (response.statusCode != 200) {
      Utils.displayToast("Terjadi kesalahan pada server");
      throw new Exception('error');
    }

    return true;
  }
}
