import 'package:flutter/material.dart';

class HomeWidget extends StatelessWidget {
  final Color color;

  HomeWidget(this.color);

  @override
  Widget build(BuildContext context) {
    return Container(
      color: Color(0xffEFEFEF),
      child: ListView(
        padding: const EdgeInsets.all(30),
        children: <Widget>[
          Container(
            padding: EdgeInsets.all(20),
            decoration: BoxDecoration(
                color: Color(0xff5CC6D0),
                shape: BoxShape.rectangle,
                borderRadius: BorderRadius.all(Radius.circular(10))),
            margin: EdgeInsets.only(bottom: 15),
            child: Column(children: [
              Row(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Image(image: AssetImage("assets/images/logo_home_small.png")),
                  Image(
                    image: AssetImage("assets/images/destination_icon.png"),
                    width: 100,
                  )
                ],
              ),
              Container(
                margin: EdgeInsets.only(top: 20),
                alignment: Alignment.topLeft,
                child: Text(
                  "Ketauhi kebutuhan\nkesehatan kamu\ndengan perjalan seru!",
                  style: TextStyle(color: Colors.white, fontSize: 16),
                ),
              )
            ]),
          ),
          Container(
            padding: EdgeInsets.all(20),
            decoration: BoxDecoration(
                color: Color(0xff5CC6D0),
                shape: BoxShape.rectangle,
                borderRadius: BorderRadius.all(Radius.circular(10))),
            margin: EdgeInsets.only(bottom: 15),
            child: Column(children: [
              Row(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Image(image: AssetImage("assets/images/logo_home_small.png")),
                  Image(
                    image: AssetImage("assets/images/healthy_icon.png"),
                    width: 100,
                  )
                ],
              ),
              Container(
                margin: EdgeInsets.only(top: 20),
                alignment: Alignment.topLeft,
                child: Text(
                  "Menjadikan\nmasyarakat\nhidup lebih sehat",
                  style: TextStyle(color: Colors.white, fontSize: 16),
                ),
              )
            ]),
          ),
          Container(
            padding: EdgeInsets.all(20),
            decoration: BoxDecoration(
                color: Color(0xff5CC6D0),
                shape: BoxShape.rectangle,
                borderRadius: BorderRadius.all(Radius.circular(10))),
            margin: EdgeInsets.only(bottom: 15),
            child: Column(children: [
              Row(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Image(image: AssetImage("assets/images/logo_home_small.png")),
                  Image(
                    image: AssetImage("assets/images/leaf_icon.png"),
                    width: 100,
                  )
                ],
              ),
              Container(
                margin: EdgeInsets.only(top: 20),
                alignment: Alignment.topLeft,
                child: Text(
                  "Menjaga alam dengan\nmengurangi polusi\ndari asap kendaraan",
                  style: TextStyle(color: Colors.white, fontSize: 16),
                ),
              )
            ]),
          ),
        ],
      ),
    );
  }
}
