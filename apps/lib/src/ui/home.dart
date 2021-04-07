import 'package:flutter/material.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';

import './home/profile.dart';
import './home/home.dart';
import './home/travel.dart';

class HomePage extends StatefulWidget {
  @override
  HomeScreen createState() => HomeScreen();
}

class HomeScreen extends State<HomePage> {
  final storage = new FlutterSecureStorage();
  int _currentIndex = 1;

  final List<Widget> _children = [
    HomeWidget(Colors.white),
    TravelWidget(),
    ProfileWidget(),
  ];

  // PageController _pageController = PageController();

  @override
  void initState() {
    super.initState();
    // _pageController = PageController();
  }

  @override
  void dispose() {
    // _pageController.dispose();
    super.dispose();
  }

  void onTabTapped(int index) {
    setState(() {
      _currentIndex = index;
      // _pageController.animateToPage(index,
      //     duration: Duration(milliseconds: 500), curve: Curves.easeOut);
    });
  }

  logout() async {
    await storage.delete(key: "auth");
    Navigator.of(context).pushReplacementNamed("/login");
  }

  getIconTopBar() {
    if (_currentIndex == 2) {
      return GestureDetector(
        onTap: logout,
        child: Row(
          children: [
            GestureDetector(
              child: Icon(CupertinoIcons.arrow_right_square),
            ),
            Container(
              margin: EdgeInsets.only(left: 7.5),
              child: Text(
                "Keluar",
                style: TextStyle(fontSize: 14),
              ),
            )
          ],
        ),
      );
    } else {
      return Row(
        children: [
          GestureDetector(
            child: Icon(CupertinoIcons.chat_bubble_text_fill),
          ),
          GestureDetector(
            child: Container(
              margin: EdgeInsets.only(left: 15),
              child: Icon(CupertinoIcons.bell_fill),
            ),
          )
        ],
      );
    }
  }

  @override
  Widget build(BuildContext context) => new Scaffold(
        appBar: new AppBar(
          backgroundColor: Color(0xffffffff),
          title: Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Image.asset(
                'assets/images/logo_home.png',
                // height: 25,
                width: 70,
              ),
              getIconTopBar()
            ],
          ),
        ),
        // body: _children[_currentIndex],
        // body: SizedBox.expand(
        //   child: PageView(
        //     controller: _pageController,
        //     onPageChanged: (index) {
        //       setState(() => _currentIndex = index);
        //     },
        //     children: _children,
        //   ),
        // ),
        body: _children[_currentIndex],
        bottomNavigationBar: BottomNavigationBar(
          onTap: onTabTapped,
          currentIndex: _currentIndex,
          items: [
            BottomNavigationBarItem(
              icon: new Icon(CupertinoIcons.house_fill),
              title: new Text('Beranda'),
            ),
            BottomNavigationBarItem(
              icon: new Icon(CupertinoIcons.location_north_fill),
              title: new Text('Perjalanan'),
            ),
            BottomNavigationBarItem(
                icon: Icon(CupertinoIcons.person_alt), title: Text('Profile'))
          ],
        ),
      );
}
