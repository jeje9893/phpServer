<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css" />

<?php
$myfile = fopen("data.txt", "r") or die("Unable to open file!");;
$jsonData = fread($myfile, filesize("data.txt"));
fclose($myfile);
$data = json_decode($jsonData, true);
?>

<?php
$subject = array("국어", "영어", "수학", "과학", "역사");


echo "학번 ";
foreach ($subject as $s) echo $s . " ";
echo "<br>";
foreach ($data as $k => $v) { //$k는 학번, $v는 해당 학번의 과목=>점수 형태의 배열
    echo "<a href='./makeGraph.php?sn=" . $k . "' target=_blank>" . $k . "</a> ";
    foreach ($v as $vd) { //$v는 과목=>점수의 배열, 즉 국어=>83, 영어=>64, 수학=>55...의 형태 여기서 $vd는 key값(국어,영어 등)이 들어가게됨
        echo $vd . " "; //$vd는 key=>value형태여서 value값을 반환, 즉 과목마다 반복하고 점수만 출력 
        //echo $vdk . " "; $v as $vd => $vdk로 했을 때 value출력 방법
    }
    echo "<br>";
}
?>