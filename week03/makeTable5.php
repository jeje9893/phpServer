<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css"/>
<?php
function makeTable($type, $ST, $ET){
    $str = "";
    $width = 6*160;
    if($type == "B")$width += 160;

    $str.= "<table width=" . $width . ">";
    $str.= "<colgroup>";
    if($type == "C")$str.= "<col width = 160>";
    for($i=0; $i<6; $i++)$str.= "<col width=160>";
    if($type == "B" || $type == "C")$str.= "<col width = 160>";
    $str.= "</colgroup>";

    $str.="<tr>";
    $str.="<th>시간</th>";
    if($type == "C")$str.="<th>일</th>";
    $str.="<th>월</th><th>화</th><th>수</th><th>목</th><th>금</th>";
    if($type == "B" || $type == "C")$str.="<th>토</th>";
    $str.="</tr>";
    for($j=$ST; $j<$ET; $j++){
        $str.="<tr>";
        $str.="<td align=center>" .$j.":00 ~ " . ($j+1) . ":00</td>";
        //sptintf를 이용하면 줄맞춤 가능
        if($type == "C") $str.= "<td></td>";
        for($i=0; $i<6; $i++)$str.= "<td></td>";
        if($type=="B" || $type == "C") $str.= "<td></td>";
        $str.="</tr>";
    }
    $str.="</table>";
    return $str;
}
?>

<?php
    $type = $_GET['type'];;
    $ST = $_GET['start'];;
    $ET = $_GET['end'];;

    echo makeTable($type,$ST,$ET);
?>
