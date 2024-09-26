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

    
    $str .= "</table>";
    return $str;
  }
?>
<?php
  echo makeTimeTableStudent($class, $_GET['grade']);
?>
