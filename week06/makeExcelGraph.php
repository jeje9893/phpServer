<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css" />

<?php
$dom = new DOMDocument();
$dom->load('scores.xml');

$rows = $dom->getElementsByTagName("Row");
$subject = array('국어', '영어', '수학', '과학', '역사');
$data = array();

// XML 데이터를 PHP 배열로 변환
$i = 1; // 첫 줄(과목명)을 제외하기 위해 1부터 시작
while ($rows->item($i)) {
    $row = $rows->item($i);
    $cells = $row->getElementsByTagName("Cell");
    $studentId = $cells->item(0)->nodeValue;
    $studentData = array();
    for ($j = 1; $j <= count($subject); $j++) {
        $cell = $cells->item($j);
        $studentData[$subject[$j - 1]] = (int)$cell->nodeValue;
    }
    $data[$studentId] = $studentData;
    $i++;
}

$sn = $_GET['sn'];
$avg = array();
$min = array();
$max = array();
$n = count($data);

// 평균, 최소, 최대값 계산
foreach ($subject as $s) {
    $avg[$s] = 0;
    $min[$s] = PHP_INT_MAX;
    $max[$s] = PHP_INT_MIN;
}

foreach ($data as $d) {
    foreach ($d as $k => $v) {
        $avg[$k] += $v;
        if ($v < $min[$k]) $min[$k] = $v;
        if ($v > $max[$k]) $max[$k] = $v;
    }
}

foreach ($subject as $s) {
    $avg[$s] = (int)($avg[$s] / $n);
}
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['과목', '최소점수', '평균', '최대점수', '학생 점수'],
                <?php
                foreach ($data[$sn] as $k => $v) {
                    echo "['" . $k . "', ";
                    echo $min[$k] . ", ";
                    echo $avg[$k] . ", ";
                    echo $max[$k] . ", ";
                    echo $v . "],\n";
                }
                ?>
            ]);

            var options = {
                chart: {
                    title: '성적평가',
                    subtitle: '학생 <?= $sn ?>의 성적',
                },
                bars: 'vertical'
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
</head>

<body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
</body>

</html>