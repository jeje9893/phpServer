<?php
$conn = mysqli_connect('localhost', 'root', '1356');
if (!$conn) die('Could not connect: ' . mysqli_error($conn));
if (!mysqli_select_db($conn, 'week07')) die('Can\'t use foo : ' . mysqli_error($conn));

$sql = "create table data (uid varchar(20) not null, kor int not null, eng int not null, math int not null, sci int not null, hist int not null, primary key (uid)) DEFAULT CHARSET=utf8;";
if (!mysqli_query($conn, $sql)) echo 'Error creating table: ' . mysqli_error($conn) . "\n";

mysqli_close($conn);
