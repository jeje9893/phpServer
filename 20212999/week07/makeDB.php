<?php
$conn = mysqli_connect('localhost', 'root', 'admin#2024');

$sql = "create database DB20212999";
mysqli_query($conn, $sql);
mysqli_close($conn);
