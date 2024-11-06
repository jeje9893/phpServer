<?php

$sid = $_GET['sid'];
echo '학번 : ' . $sid . "<br>";

if (isset($_POST['poll01'])) echo '자신감 : ' . $_POST['poll01'] . "<br>";
else echo "자신감을 선택하지 않았습니다." . "<br>";
if (isset($_POST['poll02'])) echo '이해 : ' . $_POST['poll02'] . "<br>";
else echo "이해를 선택하지 않았습니다." . "<br>";
if (isset($_POST['poll03'])) echo '경험 : ' . $_POST['poll03'] . "<br>";
else echo "경험을 선택하지 않았습니다." . "<br>";

$poll04 = array();
$poll04[] = isset($_POST['poll10A']) ? 1 : 0;
$poll04[] = isset($_POST['poll10B']) ? 1 : 0;
$poll04[] = isset($_POST['poll10C']) ? 1 : 0;
$poll04[] = isset($_POST['poll10D']) ? 1 : 0;
$poll04[] = isset($_POST['poll10E']) ? 1 : 0;
$poll04[] = isset($_POST['poll10F']) ? 1 : 0;
$poll04[] = isset($_POST['poll10G']) ? 1 : 0;

echo $_POST['poll10G'] . "<br>";
$jpoll04 = json_encode($poll04);
echo $jpoll04 . "<br>";

if (isset($_POST['poll10G'])) echo '기타의견 : ' . $_POST['poll10H'] . "<br>";
else echo "기타의견을 선택하지 않았습니다. " . "<br>";


$q1 = $_POST['poll01'];
$q2 = $_POST['poll02'];
$q3 = $_POST['poll03'];
$q4a = $_POST['poll10H'];

$sql = "update poll set";
$sql .= " q1 = " . $q1 . ",";
$sql .= " q2 = " . $q2 . ",";
$sql .= " q3 = " . $q3 . ",";
$sql .= " q4 = ' " . $jpoll04 . "',";
$sql .= " q4a = '" . $q4a . "' ";

$sql .= " where sid = '" . $sid . "'; ";


echo $sql;

// 데이터베이스 연결 설정
$conn = mysqli_connect('localhost', 'root', '1356');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

// 데이터베이스 선택
if (!mysqli_select_db($conn, 'week08')) {
    die('Can\'t use week08 : ' . mysqli_error($conn));
}

// 쿼리 실행 및 오류 처리
if (!mysqli_query($conn, $sql)) {
    echo 'Error inserting data for SID : ' . $sid . ' : ' . mysqli_error($conn) . "\n";
} else {
    echo 'Data is inserted for SID ' . $sid . "\n";
}
