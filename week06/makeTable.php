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
foreach ($data as $k => $v) {
    echo "<a href='./makeGraph.php?sn=" . $k . "' target=_blank>" . $k . "</a> ";
    foreach ($v as $vd) {
        echo $vd . " ";
    }
    echo "<br>";
}
?>