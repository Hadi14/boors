<form method="post" action="insert.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="send" name="btn">
</form>
<br>
<br>

<select><option value="0">AA</option></select>

<form method="post" action="insert-copy.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="send" name="btn2">
</form>
<br>
<form method="post" action="index.php" enctype="multipart/form-data">
    NemadId:<input type="text" name="nid">
    NamadName:<input type="text" name="nname">
    <input type="submit" value="Insert" name="btn3">
</form>

<?php

include_once 'dbcon.php';
if (isset($_POST['nid']) && isset($_POST['nname']))
 {
    $nid =  $_POST['nid']; 
    $nname =  $_POST['nname'];
    echo   $nid."  ".  $nname;

    mysqli_query($db,"INSERT INTO `nemad`(`nemadid`, `namadname`) VALUES ('$nid','$nname')");
 }
?>
