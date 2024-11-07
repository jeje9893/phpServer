<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>설문조사 결과</h1>

    <?php
    // 폼이 제출된 경우에만 처리
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // username 출력
        $name = $_POST['username'] ?? '없음';
        echo 'Username: ' . ($name) . "<br/>";

        // 선택한 자동차 출력
        $car = $_POST['cars'] ?? '없음';
        echo 'Car: ' . htmlspecialchars($car) . "<br/>";

        // 소유한 차량 출력 (체크박스)
        echo 'Vehicle 1: ' . ($_POST['vehicle1'] ?? '없음') . "<br/>";
        echo 'Vehicle 2: ' . ($_POST['vehicle2'] ?? '없음') . "<br/>";
        echo 'Vehicle 3: ' . ($_POST['vehicle3'] ?? '없음') . "<br/>";

        // 좋아하는 프로그래밍 언어 출력 (라디오 버튼)
        $fav_language = $_POST['fav_language'] ?? '없음';
        echo 'Favorite Language: ' . htmlspecialchars($fav_language) . "<br/>";
    } else {
        echo '<p>No form data submitted yet.</p>';
    }
    ?>

    <p>작성자: 허재경, 학번: 20212999</p>
</div>

</body>
</html>
