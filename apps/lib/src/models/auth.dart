class Auth {
  final String token;
  final String name;

  const Auth({this.token, this.name});

  @override
  List<Object> get props => [token, name];

  static Auth fromJson(dynamic json) {
    return Auth(name: json['name'], token: json['token']);
  }

  @override
  String getToken() => 'Token: $token';
}
