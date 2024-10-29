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
    for ($j = 0; $j < 6; $j++) {
        $cell = $cells->item($j);
        echo $cell->nodeValue . " ";
    }
    echo "<br>";
    $i++;
}
?>