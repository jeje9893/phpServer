<?php
// $conn = mysqli_connect('localhost', 'root', '1356');
// if (!$conn) die('Could not connect: ' . mysqli_error($conn));

// $sql = "create database week08";
// if (!mysqli_query($conn, $sql)) echo 'Error creating database: ' . mysqli_error($conn) . "\n";
// else echo 'Database week08 is created' . "\n";

// if (!mysqli_select_db($conn, 'week08')) die('Can\'t use foo : ' . mysqli_error($conn));

// $sql = "create table poll( ";
// $sql .= "sname varchart(256) not null, ";
// $sql .= "sid varchart(256) not null, ";
// $sql .= "q1 int not null, ";
// $sql .= "q2 int not null, ";
// $sql .= "q3 int not null, ";
// $sql .= "q4 varchar(256) not null, ";
// $sql .= "q4a varchar(256) not null, ";
// $sql .= " primary key (sid)) DEFAULT CHARSET=UTF8;";


// if (!mysqli_query($conn, $sql)) echo 'Error creating table: ' . mysqli_error($conn) . "\n";

// mysqli_close($conn);


// MySQL 서버 연결 정보
$conn = mysqli_connect('localhost', 'root', '1356');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

// 데이터베이스 존재 여부 확인
$db_check = mysqli_select_db($conn, 'week08');

if (!$db_check) {
    // 데이터베이스가 존재하지 않으면 생성
    $sql = "CREATE DATABASE week08";
    if (!mysqli_query($conn, $sql)) {
        die('Error creating database: ' . mysqli_error($conn) . "\n");
    } else {
        echo 'Database week08 created' . "\n";
    }

    // 데이터베이스 선택
    if (!mysqli_select_db($conn, 'week08')) {
        die('Can\'t select week08: ' . mysqli_error($conn));
    }
} else {
    // 데이터베이스가 이미 존재하면 접속
    echo 'Database week08 already exists. Connected.' . "\n";
}

// 테이블 생성 쿼리
$sql = "CREATE TABLE IF NOT EXISTS poll( ";
$sql .= "sname VARCHAR(256) NOT NULL, ";
$sql .= "sid VARCHAR(256) NOT NULL, ";
$sql .= "q1 INT NOT NULL, ";
$sql .= "q2 INT NOT NULL, ";
$sql .= "q3 INT NOT NULL, ";
$sql .= "q4 VARCHAR(256) NOT NULL, ";
$sql .= "q4a VARCHAR(256) NOT NULL, ";
$sql .= "PRIMARY KEY (sid)) DEFAULT CHARSET=UTF8;";

// 테이블 생성 시도
if (!mysqli_query($conn, $sql)) {
    echo 'Error creating table: ' . mysqli_error($conn) . "\n";
} else {
    echo 'Table poll created or already exists.' . "\n";
}

// 연결 종료
mysqli_close($conn);
