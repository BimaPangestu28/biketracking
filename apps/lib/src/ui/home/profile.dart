import 'package:flutter/material.dart';

class ProfileWidget extends StatefulWidget {
  @override
  _ProfileWidgetState createState() => new _ProfileWidgetState();
}

class _ProfileWidgetState extends State<ProfileWidget>
    with SingleTickerProviderStateMixin {
  @override
  Widget build(BuildContext context) {
    TabController _controller = new TabController(length: 3, vsync: this);

    return Container(
        color: Color(0xffEFEFEF),
        child: Column(
          children: [
            Container(
              color: Color(0xff5CC6D0),
              padding: EdgeInsets.all(50),
              child: Column(
                children: [
                  Container(
                    height: 200,
                    width: MediaQuery.of(context).size.width,
                    child: Column(
                      children: [
                        Container(
                            width: 100.0,
                            height: 100.0,
                            decoration: new BoxDecoration(
                                color: Colors.white,
                                shape: BoxShape.circle,
                                image: new DecorationImage(
                                    fit: BoxFit.fill,
                                    image:
                                        AssetImage("assets/images/man.png")))),
                        Container(
                          margin: EdgeInsets.only(top: 15, bottom: 5),
                          child: Text(
                            "Bima Pangestu",
                            style: TextStyle(color: Colors.white, fontSize: 18),
                          ),
                        ),
                        Text(
                          "Asyiknya bersepeda ceria Bersama \n teman-teman di Jakarta",
                          textAlign: TextAlign.center,
                          style: TextStyle(color: Colors.white, fontSize: 14),
                        )
                      ],
                    ),
                  ),
                ],
              ),
            ),
            Container(
              decoration: new BoxDecoration(color: Colors.white),
              child: new TabBar(
                controller: _controller,
                labelColor: Color(0xff5CC6D0),
                indicatorColor: Color(0xff5CC6D0),
                tabs: [
                  new Tab(
                    text: 'Perjalanan',
                  ),
                  new Tab(
                    text: 'Statistik',
                  ),
                  new Tab(
                    text: 'Poin',
                  ),
                ],
              ),
            ),
            new Container(
              height: 80.0,
              child: new TabBarView(
                controller: _controller,
                children: <Widget>[
                  new Card(
                    child: new ListTile(
                      leading: const Icon(Icons.home),
                      title: new TextField(
                        decoration: const InputDecoration(
                            hintText: 'Search for address...'),
                      ),
                    ),
                  ),
                  new Card(
                    child: new ListTile(
                      leading: const Icon(Icons.location_on),
                      title:
                          new Text('Latitude: 48.09342\nLongitude: 11.23403'),
                      trailing: new IconButton(
                          icon: const Icon(Icons.my_location),
                          onPressed: () {}),
                    ),
                  ),
                  new Card(
                    child: new ListTile(
                      leading: const Icon(Icons.location_on),
                      title:
                          new Text('Latitude: 48.09342\nLongitude: 11.23403'),
                      trailing: new IconButton(
                          icon: const Icon(Icons.my_location),
                          onPressed: () {}),
                    ),
                  ),
                ],
              ),
            ),
          ],
        ));
  }
}
