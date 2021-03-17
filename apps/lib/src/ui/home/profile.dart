import 'package:flutter/material.dart';

class ProfileWidget extends StatelessWidget {
  final Color color;

  ProfileWidget(this.color);

  @override
  Widget build(BuildContext context) {
    return Container(
      color: color,
    );
  }
}
