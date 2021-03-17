import 'package:flutter/material.dart';

class TravelWidget extends StatelessWidget {
  final Color color;

  TravelWidget(this.color);

  @override
  Widget build(BuildContext context) {
    return Container(
      color: color,
    );
  }
}
