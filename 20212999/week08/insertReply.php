<?php
echo '이름 : ' . $_POST['sname'] . "<br>";
echo '학번 : ' . $_POST['snum'] . "<br>";
echo '학과 : ' . $_POST['sdept'] . "<br>";
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

$sname = $_POST['sname'];
$sid = $_POST['snum'];
$sdept = $_POST['sdept'];
$q1 = $_POST['poll01'];
$q2 = $_POST['poll02'];
$q3 = $_POST['poll03'];
$q4a = $_POST['poll10H'];

$sql = "insert into poll (";
$sql .= "sname, sid, sdept, q1, q2, q3, q4, q4a) values (";
$sql .= "'" . $sname . "', ";
$sql .= "'" . $sid . "', ";
$sql .= "'" . $sdept . "', ";
$sql .= $q1 . ", ";
$sql .= $q2 . ", ";
$sql .= $q3 . ", ";
$sql .= "'" . $jpoll04 . "',";
$sql .= "'" . $q4a . "'";
$sql .= ");";

echo $sql;

// 데이터베이스 연결 설정
$conn = mysqli_connect('localhost', 'root', 'admin#2024');

// 데이터베이스 선택
mysqli_select_db($conn, 'DB20212999');

// 쿼리 실행 및 오류 처리
mysqli_query($conn, $sql);
