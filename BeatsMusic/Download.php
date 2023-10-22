<?php
include("Class/connect.php");

$res1 = mysqli_query($GLOBALS["con"],"select * from songsinfo where ID='" . $_REQUEST["ID"] . "'");

while ($row = mysqli_fetch_array($res1)) {
    $filepath = $row["FilePath"];
    $downloads = $row["Downloads"];
}

$d = $downloads + 1;

$res2 = mysqli_query($GLOBALS["con"],"update songsinfo set Downloads = '".$d."' where ID='" . $_REQUEST["ID"] . "'");


$file = $filepath;

header("Content-type: application/x-file-to-save");
header("Content-Disposition: attachment; filename=" . basename($file));
header("Content-Length: " . filesize($file));

readfile($file);
?>