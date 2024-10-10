<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css" />

<?php
$subject = array("국어", "영어", "수학", "과학", "역사");
$data = array();
for ($i = 20240001; $i < 20240010; $i++) {
    $data[$i] = array();
    foreach ($subject as $s) {
        $data[$i][$s] = rand(51, 100);
    }
}

$jsonData = json_encode($data);
echo $jsonData;
$myfile = fopen("data.txt", "w") or die("Unable to open file!");
fwrite($myfile, $jsonData);
fclose($myfile);
?>