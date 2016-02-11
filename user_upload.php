<?php
/*
created: Srikanth.Chadalawada
date: 11/02/2015
*/
//task 1

$h = "localhost";
$u = "srikanth";
$p = "123456";

//..../*
//create connection
$connect = mysql_connect($h, $u, $p);
//checking connection
if (!connect){
	die("Connection failed: " . mysql_connect_error());	
}else{
	echo "Connection Sucessful";	
}

//create database
$sql = "CREATE DATABASE mydb";
if(mysql_query($connect, $sql)){
	echo "database created sucessfully";	
}else{
	echo "Error creating database:" . mysql_error($connect);	
}

$dataselect = mysql_select_db("mydb", $connect);

if(!$dataselect){
	die("database not selected".mysql_error());
}

$create_table = mysql_query("CREATE TABLE users(name varchar(12), surname varchar(12), email varchar(255),UNIQUE KEY(email))",$connect);

if(!$create_table){
	die("Table not created".mysql_error());	
}
else{
	echo "Table created";	
}

if(($file = fopen("users.csv","r")) !== false){
	//loops through csv file and insert into database
	do {
		$name = ucfirst(strtolower($name));
		$surname = ucfirst(strtolower($surname));
		$email = 'srikanth.chad@gmail.com';
		if(filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo "this is valid email address";
		}else{
			echo "this is not valid email address";	
		}
		
		if($data[0]){
			mysql_query("INSERT INTO users (name, surname, email) VALUES
				(
					'".implode(" ",$data[0])."',
					'".implode(" ",$data[1])."',
					'".implode(" ",$data[2])."',
				)
			");
		}
	}while ($data = fgetscsv($file, 9000, ",", "'"));
		//fgetscsv function is used here instead LOAD DATA, because LOAD DATA
		//is often disabled on shared hosting due to possible security threat	
}
fclose($file) or die("can't close file");
?>