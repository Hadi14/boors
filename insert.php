<?php

include_once 'dbcon.php';
if(isset($_POST['btn'])) {
    if (empty($_FILES['file']['name']))
{
    echo "File is not Selected";
}
    else
    {
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
    
   

foreach($array as $item) {
 
            mysqli_query($db,"INSERT INTO `boorsupl` (`nemadid`, `volume`, `value`, `endprice`, `endperc`, `priceend`, `endchange`, `min`, `max`, `inoutpric`, `dist3mon`, `powerbyue`, `output`, `ndate`) 
            VALUES ('{$item[0]}', '{$item[1]}', '{$item[2]}', '{$item[3]}', '{$item[4]}', '{$item[5]}', '{$item[6]}', '{$item[7]}', '{$item[8]}', '{$item[9]}', '{$item[10]}', '{$item[11]}', '{$item[12]}', '{$item[13]}')");

}
}
}
?>