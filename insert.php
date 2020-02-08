<?php
include_once 'dbcon.php';
if(isset($_POST['btn'])) {
    include_once 'simplexlsx.class.php';
    $xlsx = new SimpleXLSX($_FILES['file']['tmp_name']);
    list($cols,) = $xlsx->dimension();
    foreach( $xlsx->rows() as $k => $r) {
        if ($k == 0) continue; // skip first row
        for( $i = 1; $i <= $cols; $i++) {
            if ($r[1] != "" && $i<=4) {
                $array[$k] = $r;
            }
        }
    }
}
foreach($array as $item) {
    mysqli_query($db,"INSERT INTO `nemadid` (`Nid`,`Nname`)
            VALUES('{$item[0]}','{$item[1]}')");
}
?>