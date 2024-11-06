<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css" />

<?php
// 데이터베이스 연결 설정
$conn = mysqli_connect('localhost', 'root', '1356');
if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
}

// 데이터베이스 선택
if (!mysqli_select_db($conn, 'week08')) {
    die('Can\'t use week08 : ' . mysqli_error($conn));
}

// 모든 학생의 성적 데이터를 가져옵니다.
$sql = "SELECT * FROM poll";
$result = mysqli_query($conn, $sql);

$students_data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $students_data[] = $row;
}

// 데이터베이스 연결 닫기
mysqli_close($conn);
?>

<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['table']
        });
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', '이름');
            data.addColumn('string', '학번');
            data.addColumn('string', '학과명(전공)');
            data.addColumn('number', '자신감');
            data.addColumn('number', '이해도');
            data.addColumn('number', '경험');
            data.addColumn('string', '활동(선택)');
            data.addColumn('string', '활동(기타)');
            data.addColumn('string', '[수정]');

            // PHP 배열에서 데이터를 추가하는 부분
            <?php foreach ($students_data as $student): ?>
                data.addRows([
                    ['<?= htmlspecialchars($student['sname'], ENT_QUOTES) ?>', '<?= htmlspecialchars($student['sid'], ENT_QUOTES) ?>', '<?= htmlspecialchars($student['sdept'], ENT_QUOTES) ?>',
                        {
                            v: <?= $student['q1'] ?>,
                            f: '<?= $student['q1'] ?>'
                        },
                        {
                            v: <?= $student['q2'] ?>,
                            f: '<?= $student['q2'] ?>'
                        },
                        {
                            v: <?= $student['q3'] ?>,
                            f: '<?= $student['q3'] ?>'
                        },
                        ' ',
                        ' ',
                        // '<?= htmlspecialchars($student['q4'], ENT_QUOTES) ?>', 선택항목 배열 [0,0,1,1,0,1,0] 형태
                        // '<?= htmlspecialchars($student['q4a'], ENT_QUOTES) ?>', 선택항목 기타 내용
                        {
                            v: null,
                            f: '<a href="update.php?sid=<?= rawurlencode($student['sid']) ?>&sname=<?= rawurlencode($student['sname']) ?>&sdept=<?= rawurlencode($student['sdept']) ?>">[수정]</a>'
                        }
                    ]
                ]);
            <?php endforeach; ?>

            var table = new google.visualization.Table(document.getElementById('table_div'));

            // 테이블을 그리는 부분
            table.draw(data, {
                allowHtml: true,
                showRowNumber: true,
                width: '900px',
                height: '200px'
            });
        }
    </script>
</head>

<body>
    <div id="table_div"></div>
</body>

</html>