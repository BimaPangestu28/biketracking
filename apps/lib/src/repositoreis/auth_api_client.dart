import 'package:flutter_dotenv/flutter_dotenv.dart';
import 'dart:convert';

import 'package:http/http.dart' as http;
import 'package:meta/meta.dart';

import '../models/models.dart';

class AuthApiClient {
  final _baseUrl = env['IS_PRODUCTION'] == "true"
      ? env['PROD_BASE_URL']
      : env['DEV_BASE_URL'];

  final http.Client httpClient;
  AuthApiClient({
    @required this.httpClient,
  }) : assert(httpClient != null);

  Future<Auth> login(data) async {
    final url = Uri.parse('$_baseUrl/login');
    final response = await http.post(url, body: data);

    if (response.statusCode != 200) {
      throw new Exception('error getting quotes');
    }

    final json = jsonDecode(response.body);
    return Auth.fromJson(json);
  }
}
