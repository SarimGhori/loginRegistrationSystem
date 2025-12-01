Login & Registration System (PHP + MySQL)

A simple Login and Registration system made using PHP and MySQL.

Features

User signup

User login

Password saved in database

Session system

Logout option

Files
index.php        # Login page
register.php     # Signup page
dashboard.php    # After login page
logout.php       # Logout script
db.php           # Database connection

Database Setup

Create database:

CREATE DATABASE login_system;


Create table:

CREATE TABLE users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  password VARCHAR(255)
);

How to Run

Put project inside htdocs

Start Apache + MySQL

Open browser:

http://localhost/project-folder/


Bas!
