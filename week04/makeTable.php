<meta charset="utf-8">
<link rel="StyleSheet" href="./table.css" type="text/css" />
<?php include("./data.php"); ?>

<?php
  function makeTimeTableStudent($data, $grade) { // L은 여기서만 사용되는 로컬을 의미함. G는 생략
    $time = array('', '(09:00 ~ 09:50)', '(10:00 ~ 10:50)', '(11:00 ~ 11:50)',
      '(12:00 ~ 12:50)', '(13:00 ~ 13:50)', '(14:00 ~ 14:50)', '(15:00 ~ 15:50)',
      '(16:00 ~ 16:50)', '(17:00 ~ 17:50)', );
    $day = array("월", "화", "수", "목", "금", );
    $str = "";
    $str .= "<table width=" . (180*6) . "px>";

    // 코드 추가!!
     $str.= "<colgroup>";
    for($i=0; $i<6; $i++)$str.= "<col width=160>";
    $str.= "</colgroup>";

    $str.="<tr>";
    $str.="<th>교시</th>";
    // $str.="<th>월</th><th>화</th><th>수</th><th>목</th><th>금</th>";
    for($j=0; $j<5; $j++){
      $str.= "<th>".$day[$j]."</th>";     
    }
    $str.="</tr>";
    $spanCount[] = array(0,0,0,0,0,0);
    for($t=1;$t<10;$t++){ //$t는 시간
      $str.="<tr align=center>";
      $str.="<td>{$t}교시<br>".$time[$t]."</td>";
      for($d=1; $d<6; $d++){ //$t시간의 $d 요일
        if($spanCount[$d]>0){
          $spanCount[$d]--;
          continue;
        }
        if($data[$d][$t]==""){
          $str .= "<td>배열이 비었음{$d}요일{$t}시간</td>";
          continue;
        }
        $exist = false;
        foreach($data[$d][$t] as $inner){
          if($inner[0]!=$grade) continue;
          $exist = true;
          $str .= "<td rowspan =" .$inner[3]. ">";
          $str .= "<td>배열" .$inner[1]. "<br>" .$inner[2].$inner[4]."</td>";
          $spanCount[$d] = $inner[3]-1;
        }
        if(!$exist) $str .= "<td>이미 {$d}요일{$t}시간</td>";
      }
      $str.="</tr>";
    }
    
    $str .= "</table>";
    return $str;
  }
?>
<?php
  echo makeTimeTableStudent($class, $_GET['grade']);
?>
