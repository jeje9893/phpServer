<?php
// 데이터베이스 연결 설정
$conn = mysqli_connect('localhost', 'root', 'admin#2024');
// 데이터베이스 선택
mysqli_select_db($conn, 'DB20212999');

$subject = array('kor', 'eng', 'math', 'sci', 'hist'); // 과목 배열

for ($i = 20240001; $i <= 20240010; $i++) {
    // 랜덤 점수 생성
    $kor = rand(51, 100);
    $eng = rand(51, 100);
    $math = rand(51, 100);
    $sci = rand(51, 100);
    $hist = rand(51, 100);

    // 각 $i 값을 uid로 사용하여 SQL 쿼리 생성
    $sql = "insert into data (uid, kor, eng, math, sci, hist) 
            values ('$i', $kor, $eng, $math, $sci, $hist);";

    // 쿼리 실행
    mysqli_query($conn, $sql);

    // 각 uid에 대한 데이터를 배열에 저장
    $data[$i] = array(
        'kor' => $kor,
        'eng' => $eng,
        'math' => $math,
        'sci' => $sci,
        'hist' => $hist
    );

    // SQL 쿼리 출력 (디버그용)
    echo $sql . "\n";
}

// 데이터베이스 연결 닫기
mysqli_close($conn);
