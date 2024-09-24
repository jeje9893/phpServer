<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="poll_reply.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>응답 확인</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .frame {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .response-table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: rgba(46, 50, 114, 0.815);
        }
    </style>
</head>

<body>
    <div class="frame">
        <h2>응답 확인</h2>

        <table class="response-table">
            <tr>
                <th>질문</th>
                <th>응답</th>
            </tr>
            <tr>
                <td>이름</td>
                <td><?php echo htmlspecialchars($_POST['sname']); ?></td>
            </tr>
            <tr>
                <td>학번</td>
                <td><?php echo htmlspecialchars($_POST['snum']); ?></td>
            </tr>
            <tr>
                <td>학과이름(전공)</td>
                <td><?php echo htmlspecialchars($_POST['sdept']); ?></td>
            </tr>
            <tr>
                <td>1. 나는 프로그래밍에 대해 자신이 있다.</td>
                <td><?php echo htmlspecialchars($_POST['poll01']); ?></td>
            </tr>
            <tr>
                <td>2. 게임이 만들어지는 과정에 대해 이해가 있다.</td>
                <td><?php echo htmlspecialchars($_POST['poll02']); ?></td>
            </tr>
            <tr>
                <td>3. 게임을 만들어 본 경험이 있다.</td>
                <td><?php echo htmlspecialchars($_POST['poll03']); ?></td>
            </tr>
            <tr>
                <td>프로그래밍 동아리 가입 시 가장 중요하게 생각하는 부분</td>
                <td>
                    <?php 
                        $selectedOptions = [];
                        if (isset($_POST['poll10A'])) $selectedOptions[] = "자료제공(콘텐츠)";
                        if (isset($_POST['poll10B'])) $selectedOptions[] = "스터디 모임(자격증)";
                        if (isset($_POST['poll10C'])) $selectedOptions[] = "커뮤니티";
                        if (isset($_POST['poll10D'])) $selectedOptions[] = "이벤트";
                        if (isset($_POST['poll10E'])) $selectedOptions[] = "게임 만들기";
                        if (isset($_POST['poll10F'])) $selectedOptions[] = "공모전 참여";
                        if (isset($_POST['poll10G'])) $selectedOptions[] = "기타: " . htmlspecialchars($_POST['poll10H']);
                        echo implode(", ", $selectedOptions);
                    ?>
                </td>
            </tr>
            <tr>
                <td>자신이 다룰 수 있는 프로그래밍 언어</td>
                <td>
                    <?php 
                        $programmingLanguages = [];
                        if (isset($_POST['poll20A'])) $programmingLanguages[] = "C언어(C,C++,C#)";
                        if (isset($_POST['poll20B'])) $programmingLanguages[] = "파이썬";
                        if (isset($_POST['poll20C'])) $programmingLanguages[] = "자바";
                        if (isset($_POST['poll20D'])) $programmingLanguages[] = "기타: " . htmlspecialchars($_POST['poll20H']);
                        echo implode(", ", $programmingLanguages);
                    ?>
                </td>
            </tr>
            <tr>
                <td>만들고 싶은 게임/선호하는 게임의 종류</td>
                <td>
                    <?php 
                        $gameTypes = [];
                        if (isset($_POST['poll30A'])) $gameTypes[] = "RPG게임";
                        if (isset($_POST['poll30B'])) $gameTypes[] = "AOS게임";
                        if (isset($_POST['poll30C'])) $gameTypes[] = "FPS게임";
                        if (isset($_POST['poll30D'])) $gameTypes[] = "기타: " . htmlspecialchars($_POST['poll30H']);
                        echo implode(", ", $gameTypes);
                    ?>
                </td>
            </tr>
            <tr>
                <td>이해하고 있는/다룰 수 있는 게임 엔진</td>
                <td>
                    <?php 
                        $gameEngines = [];
                        if (isset($_POST['poll40A'])) $gameEngines[] = "유니티";
                        if (isset($_POST['poll40B'])) $gameEngines[] = "언리얼";
                        if (isset($_POST['poll40C'])) $gameEngines[] = "소스엔진";
                        if (isset($_POST['poll40D'])) $gameEngines[] = "주피터";
                        if (isset($_POST['poll40E'])) $gameEngines[] = "기타: " . htmlspecialchars($_POST['poll40E']);
                        echo implode(", ", $gameEngines);
                    ?>
                </td>
            </tr>
            <tr>
                <td>같은 팀 희망 멤버</td>
                <td><?php echo htmlspecialchars($_POST['poll50']); ?></td>
            </tr>
            <tr>
                <td>희망하는 멘토</td>
                <td><?php echo htmlspecialchars($_POST['poll60']); ?></td>
            </tr>
        </table>

        <div class="footer">
            <h3>설문에 응해 주셔서 감사합니다.</h3>
            <p>(웹 프로그래머가 되고싶은) 20212999 허재경</p>
        </div>
    </div>
</body>

</html>
