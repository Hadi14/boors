<?php

include_once 'dbcon.php';
if (isset($_POST['btn2']))
 {
    include_once 'simplexlsx.class.php';
    $xlsx = new SimpleXLSX($_FILES['file']['tmp_name']);
    list($cols,) = $xlsx->dimension();
    $i = 0;
    foreach( $xlsx->rows() as $items) {
        $j = 0;
        foreach($items as $item) {
            if($item == "") {
                continue;
            }
            $resArray[$i][$j] = $item;
            $j++;
        }
        $i++;
    }
    array_shift($resArray);
    echo "<pre>";
    print_r($resArray);
    echo "</pre>";

    mysqli_query($db, "INSERT INTO `boorsupl`(`nemadid`, `volume`, `value`, `endprice`, `endperc`, `priceend`, `endchange`, `min`, `max`, `inoutpric`, `dist3mon`, `powerbyue`) VALUES
    ('{$item[0]}','{$item[1]}','{$item[2]}','{$item[3]}','{$item[4]}','{$item[5]}','{$item[6]}','{$item[7]}','{$item[8]}','{$item[9]}','{$item[10]}','{$item[11]}')");
}
