<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css" />

<?php
$dom = new DOMDocument();
$dom->load('scores.xml');

$rows = $dom->getElementsByTagName("Row");
$i = 0;

while ($rows->item($i)) {
    $row = $rows->item($i);
    $cells = $row->getElementsByTagName("Cell");

    // 첫 번째 줄(과목명)을 처리할 때는 링크 없이 출력
    if ($i == 0) {
        for ($j = 0; $j < $cells->length; $j++) {
            echo $cells->item($j)->nodeValue . " ";
        }
    } else {
        // 학번 출력 - 링크로 변경
        $studentId = $cells->item(0)->nodeValue;
        echo "<a href='./makeExcelGraph.php?sn=" . $studentId . "' target=_blank>" . $studentId . "</a> ";

        // 나머지 과목 점수 출력
        for ($j = 1; $j < $cells->length; $j++) {
            echo $cells->item($j)->nodeValue . " ";
        }
    }
    echo "<br>";
    $i++;
}
?>