<?php
echo '이름 : ' . $_POST['sname'] . "<br>";
echo '학번 : ' . $_POST['snum'] . "<br>";
echo '학과 : ' . $_POST['sdept'] . "<br>";
if (isset($_POST['poll01'])) echo '자신감 : ' . $_POST['poll01'] . "<br>";
else echo "자신감을 선택하지 않았습니다." . "<br>";
if (isset($_POST['poll01'])) echo '이해 : ' . $_POST['poll01'] . "<br>";
else echo "이해를 선택하지 않았습니다." . "<br>";

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
$snum = $_POST['snum'];
$sdept = $_POST['sdept'];
