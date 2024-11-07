<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css" />

<?php
// 데이터베이스 연결 설정
$conn = mysqli_connect('localhost', 'root', 'admin#2024');

// 데이터베이스 선택
mysqli_select_db($conn, 'DB20212999');

// 모든 학생의 성적 데이터를 가져옵니다.
$sql = "SELECT * FROM data";
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
            data.addColumn('string', 'UID');
            data.addColumn('number', '국어');
            data.addColumn('number', '영어');
            data.addColumn('number', '수학');
            data.addColumn('number', '과학');
            data.addColumn('number', '역사');

            // PHP 배열에서 데이터를 추가하는 부분
            <?php foreach ($students_data as $student): ?>
                data.addRows([
                    ['<?= $student['uid'] ?>',
                        {
                            v: <?= $student['kor'] ?>,
                            f: '<?= $student['kor'] ?>'
                        },
                        {
                            v: <?= $student['eng'] ?>,
                            f: '<?= $student['eng'] ?>'
                        },
                        {
                            v: <?= $student['math'] ?>,
                            f: '<?= $student['math'] ?>'
                        },
                        {
                            v: <?= $student['sci'] ?>,
                            f: '<?= $student['sci'] ?>'
                        },
                        {
                            v: <?= $student['hist'] ?>,
                            f: '<?= $student['hist'] ?>'
                        }
                    ]
                ]);
            <?php endforeach; ?>

            var table = new google.visualization.Table(document.getElementById('table_div'));

            // 테이블을 그리는 부분
            table.draw(data, {
                showRowNumber: true,
                width: '600px',
                height: '400px'
            });
        }
    </script>
</head>

<body>
    <div id="table_div"></div>
</body>

</html>