<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css" />

<?php
$sn = $_GET['sn'];
$myfile = fopen("data.txt", "r") or die('Unable to open file!');
$jsonData = fread($myfile, filesize('data.txt'));
fclose($myfile);
$data = json_decode($jsonData, true);
$subject = array('국어', '영어', '수학', '과학', '역사');
?>
<?php
$avg = array();
$n = count($data);
foreach ($subject as $s) $avg[$s] = 0;
foreach ($data as $d) {
    foreach ($d as $k => $v) $avg[$k] += $v;
}
foreach ($subject as $s) $avg[$s] = (int) ($avg[$s] / $n);
?>


<div id="columnchart_material" style="width: 800px; height: 500px;">
</div>

<html>

<head>
    <!-- https://developers.google.com/chart/interactive/docs/gallery/columnchart?hl=ko 참고 -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['과목', '평균', '범수']
                <?php
                foreach ($data[$sn] as $k => $v) {
                    echo ",['" . $k . "', ";
                    echo $avg[$k] . ", ";
                    echo $v . "]" . "\n";
                }
                ?>
            ]);
            var options = {
                chart: {
                    title: '성적평가',
                    subtitle: '학생 <?= $sn ?>의 성적',
                }
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