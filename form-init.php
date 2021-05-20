<?php 
require_once('../db/dbhelper.php');
 $crdatabase = "create database if not exists bt2299";
 initDB($crdatabase);

 $usersql = "create table if not exists users (
				id int primary key AUTO_INCREMENT,
			    fullname varchar(50),
			    email varchar(100) unique,
			    password varchar(32),
			    birthday date,
			    address varchar(200)
			)";	
execute($usersql);

$noteuser= "create table if not exists note (
				id int primary key AUTO_INCREMENT,
			    user_id int REFERENCES users(id),
			    title varchar(100),
			    content text,
			    created_at datetime,
			    updated_at datetime
			)";

execute($noteuser);

header('location: login.php');
die();