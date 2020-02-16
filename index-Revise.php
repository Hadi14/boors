<?php
if(isset($_POST['btn'])) {
    include_once 'simplexlsx.class.php';
    $xlsx = new SimpleXLSX($_FILES['file']['tmp_name']);
    list($cols,) = $xlsx->dimension();
    $i = 0;
    foreach( $xlsx->rows() as $items) {
        $j = 0;
        foreach($items as $item) {
            $item = (string)$item;
            if($item == null) { continue; }
            $resArray[$i][$j] = $item;
            $j++;
        }
        $i++;
    }
    array_shift($resArray);
    echo "<pre>";
    print_r($resArray);
    echo "</pre>";
}
/*foreach($resArray as $insert) {
    mysqli_query($DB,"INSERT INTO `place` (`col1`,`col2`)
            VALUES('{$insert[0]}','{$insert[1]}')"); ....
}*/
?>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="send" name="btn">
</form>
