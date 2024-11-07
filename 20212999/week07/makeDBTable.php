<?php
$conn = mysqli_connect('localhost', 'root', 'admin#2024');
mysqli_select_db($conn, 'DB20212999');

$sql = "create table data (uid varchar(20) not null, kor int not null, eng int not null, math int not null, sci int not null, hist int not null, primary key (uid)) DEFAULT CHARSET=utf8;";
mysqli_query($conn, $sql);
mysqli_close($conn);
