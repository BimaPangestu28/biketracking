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

  // Login Fucntion
  Future<bool> start(context, data) async {
    final url = Uri.parse('$_baseUrl/trips/start');
    final response = await http.post(url, body: data);

    // final responeJson = json.decode(response.body);

    if (response.statusCode != 200) {
      Utils.displayToast("Terjadi masalah pada server");
      throw new Exception('error');
    }

    Utils.displayToast("Perjalanan kamu telah dimulai");

    return true;
  }
}
