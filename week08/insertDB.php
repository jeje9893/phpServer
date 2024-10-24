<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="poll.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>설문지</title>
</head>

<body>
    <div class="frame">
        <h2 style="text-align: center;">설문지</h2>
        <h2 style="text-align: center;">(자가 진단 테스트)</h2>

        <div class=" top">아 래 질문은 실력테스트용이 아닌 객관적 판단을 위한 설문지이오니, 사실 그대로 적어주시면 됩니다.
        </div>
        <br>

        <form method="POST" action="./insertReply.php" method="POST"> <!--action="/action_page.php" -->
            <label for="sname">1.이름 :</label> <input type="text" name="sname">
            <label for="snum">2.학번 :</label> <input type="text" name="snum">
            <label for="sdept">3.학과이름(전공) :</label> <input type="text" name="sdept">
            <br><br>

            <table>
                <colgroup>
                    <col width="400">
                    <col width="100">
                    <col width="100">
                    <col width="100">
                    <col width="100">
                    <col width="100">
                </colgroup>
                <tr>
                    <th>항목</td>
                    <th>매우그렇다</td>
                    <th>그렇다</td>
                    <th>보통이다</td>
                    <th>아니다</td>
                    <th>매우아니다</td>
                </tr>
                <tr>
                    <td>1. 나는 프로그래밍에 대해 자신이 있다.</td>
                    <td align="center"><input type="radio" name="poll01" value="5"></td>
                    <td align="center"><input type="radio" name="poll01" value="4"></td>
                    <td align="center"><input type="radio" name="poll01" value="3"></td>
                    <td align="center"><input type="radio" name="poll01" value="2"></td>
                    <td align="center"><input type="radio" name="poll01" value="1"></td>
                </tr>
                <tr>
                    <td>2. 게임이 만들어지는 과정에 대해 이해가 있다.</td>
                    <td align="center"><input type="radio" name="poll02" value="5"></td>
                    <td align="center"><input type="radio" name="poll02" value="4"></td>
                    <td align="center"><input type="radio" name="poll02" value="3"></td>
                    <td align="center"><input type="radio" name="poll02" value="2"></td>
                    <td align="center"><input type="radio" name="poll02" value="1"></td>
                </tr>
                <tr>
                    <td>3. 게임을 만들어 본 경험이 있다.</td>
                    <td align="center"><input type="radio" name="poll03" value="5"></td>
                    <td align="center"><input type="radio" name="poll03" value="4"></td>
                    <td align="center"><input type="radio" name="poll03" value="3"></td>
                    <td align="center"><input type="radio" name="poll03" value="2"></td>
                    <td align="center"><input type="radio" name="poll03" value="1"></td>
                </tr>
            </table>

            <br><br>

            <label>1. 프로그래밍 동아리 가입 시 사장 중요하게 생각하는 부분은 (중복선택 가능)</label>
            <table class="pollTable">
                <colgroup>
                    <col width=200>
                    <col width=200>
                    <col width=200>
                    <col width=200>
                </colgroup>

                <tr>
                    <td><input type="checkbox" name="poll10A" value="A"> <label for="poll10A">자료제공(콘텐츠)</label></td>
                    <td><input type="checkbox" name="poll10B" value="B"> <label for="poll10A">스터디모임(자격증)</label></td>
                    <td><input type="checkbox" name="poll10C" value="C"> <label for="poll10A">커뮤니티</label></td>
                    <td><input type="checkbox" name="poll10D" value="D"> <label for="poll10A">이벤트</label>
                    </td>

                </tr>
                <tr>
                    <td><input type="checkbox" name="poll10E" value="E"> <label for="poll10A">게임 만들기</label></td>
                    <td><input type="checkbox" name="poll10F" value="F"> <label for="poll10A">공모전 참여</label></td>
                    <td colspan="2"><input type="checkbox" name="poll10G" value="G"> <label for="poll10G">기타의견</label>&nbsp;&nbsp;&nbsp;(<input type="text" name="poll10H">)</td>
                </tr>
            </table>
            <br><br><input style="margin:auto; display:block;" type="submit" value="확인">
        </form>

        <h3 style="text-align: center;">설문에 응해 주셔서 감사합니다.</h3>

        <div class="footer"><br><span style="color: rgba(46, 50, 114, 0.815);">(웹 프로그래머가 되고싶은)</span><br> 20212999 허재경
            <br><br><br>
        </div>

    </div>
</body>

</html>