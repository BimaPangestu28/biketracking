import 'package:flutter/material.dart';

class HomeWidget extends StatelessWidget {
  final Color color;

  HomeWidget(this.color);

  @override
  Widget build(BuildContext context) {
    return Container(
      color: color,
    );
  }
}
