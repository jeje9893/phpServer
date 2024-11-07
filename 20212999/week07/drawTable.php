<?php
$conn = mysqli_connect('localhost', 'root', 'admin#2024');
mysqli_select_db($conn, 'DB20212999');

$sql = "select * from data";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo $row['uid'] . " ";
    echo $row['kor'] . " ";
    echo $row['eng'] . " ";
    echo $row['math'] . " ";
    echo $row['sci'] . " ";
    echo $row['hist'] . "<br>";
}

mysqli_close($conn);
