<?php
// MySQL 서버 연결
$conn = mysqli_connect('localhost', 'root', '1356');
if (!$conn) {
    die('연결할 수 없습니다: ' . mysqli_connect_error());
}

// 데이터베이스 존재 여부 확인 및 생성
$db_check = mysqli_select_db($conn, 'week08');

if (!$db_check) {
    $sql = "CREATE DATABASE week08";
    if (!mysqli_query($conn, $sql)) {
        die('데이터베이스 생성 오류: ' . mysqli_error($conn) . "\n");
    } else {
        echo '데이터베이스 week08 생성 완료' . "\n";
    }
    mysqli_select_db($conn, 'week08');
} else {
    echo '데이터베이스 week08이 이미 존재합니다. 연결되었습니다.' . "\n";
}

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

if (!mysqli_query($conn, $sql)) {
    echo '테이블 생성 오류: ' . mysqli_error($conn) . "\n";
} else {
    echo '테이블 poll이 생성되었거나 이미 존재합니다.' . "\n";
}

// 연결 종료
mysqli_close($conn);
