import 'dart:async';

import 'package:meta/meta.dart';
import '../models/models.dart';
import './auth_api_client.dart';

class AuthRepository {
  final AuthApiClient authApiClient;

  AuthRepository({@required this.authApiClient})
      : assert(authApiClient != null);

  Future<Auth> login(data) async {
    return await authApiClient.login(data);
  }
}
