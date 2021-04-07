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
  Future<dynamic> start(data) async {
    String token = await storage.read(key: "auth");

    final url = Uri.parse('$_baseUrl/trips/start');
    final response = await http.post(url, body: data, headers: {
      'Authorization': 'Bearer $token',
    });

    if (response.statusCode != 201) {
      Utils.displayToast("Terjadi kesalahan pada server");
      return false;
    }

    return json.decode(response.body)['data'];
  }

  // Get Category Fucntion
  Future<dynamic> getCategories() async {
    String token = await storage.read(key: "auth");

    try {
      final url = Uri.parse('$_baseUrl/trips/categories');
      final response = await http.get(url, headers: {
        'Authorization': 'Bearer $token',
      });

      return json.decode(response.body)['data'];
    } catch (e) {
      Utils.displayToast("Terjadi kesalahan pada server");
      return false;
    }
  }

  // Get Save Coordinate Fucntion
  Future<bool> saveCoordinate(tripId, data) async {
    String token = await storage.read(key: "auth");

    try {
      final url = Uri.parse('$_baseUrl/trips/$tripId/save-coordinate');
      http.post(url, body: data, headers: {
        'Authorization': 'Bearer $token',
      });

      return true;
    } catch (e) {
      Utils.displayToast("Terjadi kesalahan pada server");
      return false;
    }
  }

  // Save Speed Fucntion
  Future<bool> saveSpeed(tripId, data) async {
    String token = await storage.read(key: "auth");

    try {
      final url = Uri.parse('$_baseUrl/trips/$tripId/save-speed');
      http.post(url, body: data, headers: {
        'Authorization': 'Bearer $token',
      });

      return true;
    } catch (e) {
      Utils.displayToast("Terjadi kesalahan pada server");
      return false;
    }
  }

  Future<bool> finish(tripId, data) async {
    String token = await storage.read(key: "auth");

    try {
      final url = Uri.parse('$_baseUrl/trips/$tripId/finish');
      final response = await http.post(url, body: data, headers: {
        'Authorization': 'Bearer $token',
      });

      return json.decode(response.body)['data'];
    } catch (e) {
      print(e);
      Utils.displayToast("Terjadi kesalahan pada server");
      return false;
    }
  }
}
