<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css"/>
<?php
    //테이블 한 칸은 160px로 한다
    $type = "A";
    $ST=9;
    $ET=17;

    $width=6*160;
    if($type == "B") $width +=160;

    echo "<table width=" . $width . ">";
    echo "<colgroup>";
    for($i=0; $i<6; $i++)echo "<col width=160>";
    if($type == "B")echo "<col width = 160>";
    echo "</colgroup>";

    echo"<tr>";
    echo"<th>시간</th><th>월</th><th>화</th><th>수</th><th>목</th><th>금</th>";
    if($type == "B")echo"<th>토</th>";
    echo"</tr>";
    for($j=$ST; $j<$ET; $j++){
        echo"<tr>";
        echo"<td align=center>" .$j.":00 ~ " . ($j+1) . ":00</td>";
        //sptintf를 이용하면 줄맞춤 가능
        for($i=0; $i<6; $i++)echo "<td></td>";
        if($type=="B") echo "<td></td>";
        echo"</tr>";
    }
    echo"</table>";
?>
