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
//...*/

//$connect = mysql_connect($h, $u, $p);
//mysql_select_db("mydb", $connect);

$dataselect = mysql_select_db("mydb", $connect);
/*
if(!$dataselect){
	die("database not selected".mysql_error());
}
*/
$create_table = mysql_query("CREATE TABLE users(name varchar(12), surname varchar(12), email varchar(320),UNIQUE(email))",$connect);

if(!$create_table){
	die("Table not created".mysql_error());	
}
else{
	echo "Table created";	
}

if(($file = fopen("users.csv","r")) !== false){
	//loops through csv file and insert into database
	do {
		if($data[0]){
			mysql_query("INSERT INTO users (name, surname, email) VALUES
				(
					'"$data[0]."', '"$data[1]."', '"$data[2]."'
				)
			");
		}
	}while ($data = fgetscsv($file, 9000, ",", "'"));
		//fgetscsv function is used instead LOAD DATA, because LOAD DATA
		//is often disabled on shared hosting due to possible security threat
		
		//for($i = 0, $j = count($data); $i < $j; $i++){
				
		//}
	
}
?>