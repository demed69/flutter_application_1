import 'package:flutter/material.dart';
import 'homepage.dart'; // Import file homepage.dart/ Import file login.dart

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: HomePage(), // Gunakan HomePage dari homepage.dart
    );
  }
}
