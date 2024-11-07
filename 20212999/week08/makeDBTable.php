<?php
// MySQL 서버 연결
$conn = mysqli_connect('localhost', 'root', 'admin#2024');

// 데이터베이스 존재 여부 확인 및 생성
$sql = "CREATE DATABASE DB20212999";
mysqli_query($conn, $sql);
mysqli_select_db($conn, 'DB20212999');


// 테이블 생성 (존재하지 않을 경우에만 생성)
$sql = "CREATE TABLE IF NOT EXISTS poll( 
            sname VARCHAR(256) NOT NULL, 
            sid VARCHAR(256) NOT NULL, 
            sdept VARCHAR(256) NOT NULL, 
            q1 INT NOT NULL, 
            q2 INT NOT NULL, 
            q3 INT NOT NULL, 
            q4 VARCHAR(256) NOT NULL, 
            q4a VARCHAR(256) NOT NULL, 
            PRIMARY KEY (sid)) DEFAULT CHARSET=UTF8;";

mysqli_query($conn, $sql);

// 연결 종료
mysqli_close($conn);
