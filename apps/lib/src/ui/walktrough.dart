import 'package:flutter/material.dart';
import 'package:carousel_slider/carousel_options.dart';
import 'package:carousel_slider/carousel_slider.dart';
import 'package:localstorage/localstorage.dart';

List<Object> list = [
  "assets/images/walktrough_1.png",
  "assets/images/walktrough_2.png",
  "assets/images/walktrough_3.png",
  "assets/images/walktrough_4.png"
];

List<Object> listTexts = [
  "Ketauhi kebutuhan kesehatan kamu dengan perjalan seru!",
  "Menjadikan masyarakat hidup lebih sehat",
  "Menjaga alam dengan mengurangi polusi dari asap kendaraan",
  "Mengurangi penggunaan bahan bakar minyak (BBM)"
];

class WalktroughPage extends StatefulWidget {
  @override
  WalktroughScreen createState() => WalktroughScreen();
}

class WalktroughScreen extends State<WalktroughPage> {
  final LocalStorage storage = new LocalStorage('pityu');

  void initState() {
    super.initState();
  }

  _toLoginPage() {
    storage.setItem('showWalktrough', "false");
    Navigator.of(context).pushReplacementNamed("/login");
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        body: Column(
      children: [
        Builder(
          builder: (context) {
            final double height = MediaQuery.of(context).size.height;
            return CarouselSlider(
              options: CarouselOptions(
                height: height,
                viewportFraction: 1.0,
                enlargeCenterPage: false,
                enableInfiniteScroll: false,
              ),
              items: list
                  .map((item) => Container(
                        child: Column(
                          mainAxisAlignment: MainAxisAlignment.center,
                          children: [
                            Column(
                              children: [
                                Image(
                                    width: 225,
                                    height: 225,
                                    image: AssetImage(item.toString())),
                                Container(
                                  child: Text(
                                    listTexts[list.indexOf(item)],
                                    style: TextStyle(
                                        fontSize: 20,
                                        color:
                                            Color.fromRGBO(255, 255, 255, 1)),
                                    textAlign: TextAlign.center,
                                  ),
                                  margin: EdgeInsets.symmetric(
                                      horizontal: 50, vertical: 10),
                                )
                              ],
                            ),
                            Column(children: [
                              Row(
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: list.map((data) {
                                  int _current = list.indexOf(item);
                                  return Container(
                                    width: 10.0,
                                    height: 10.0,
                                    margin: EdgeInsets.symmetric(
                                        vertical: 40.0, horizontal: 5.0),
                                    decoration: BoxDecoration(
                                      shape: BoxShape.circle,
                                      color: _current == list.indexOf(data)
                                          ? Color.fromRGBO(255, 255, 255, 1)
                                          : Color.fromRGBO(62, 177, 188, 1),
                                    ),
                                  );
                                }).toList(),
                              ),
                              Container(
                                  child: list.indexOf(item) < 3
                                      ? new GestureDetector(
                                          child: Text(
                                            "Skip",
                                            style: TextStyle(
                                                color: Color.fromRGBO(
                                                    255, 255, 255, 1)),
                                          ),
                                          onTap: _toLoginPage,
                                        )
                                      : ElevatedButton(
                                          style: ButtonStyle(
                                              shape: MaterialStateProperty.all<
                                                      RoundedRectangleBorder>(
                                                  RoundedRectangleBorder(
                                                borderRadius:
                                                    BorderRadius.circular(50.0),
                                              )),
                                              backgroundColor:
                                                  MaterialStateProperty.all(
                                                      Color(0xffD0D620)),
                                              padding:
                                                  MaterialStateProperty.all(
                                                      EdgeInsets.symmetric(
                                                          vertical: 15,
                                                          horizontal: 60)),
                                              elevation:
                                                  MaterialStateProperty.all(0)),
                                          child: Text(
                                            "Mulai Sekarang",
                                            style: TextStyle(fontSize: 18),
                                          ),
                                          onPressed: _toLoginPage))
                            ])
                          ],
                        ),
                        color: Color(0xff5CC6D0),
                      ))
                  .toList(),
            );
          },
        ),
      ],
    ));
  }
}
