<?php 

    include("class/AdminClass.php");

    $result1 = mysqli_query($GLOBALS["con"],"select FilePath,CoverPath from songsinfo where ID='".$_REQUEST["ID"]."'");

    while($row = mysqli_fetch_array($result1))
    {
        $FilePath = $row["FilePath"];
        $CoverPath = $row["CoverPath"];
    }

    unlink("../BeatsMusic/".$FilePath);

    unlink("../BeatsMusic/".$CoverPath);

    $result2 = mysqli_query($GLOBALS["con"],"delete from songsinfo where ID='".$_REQUEST["ID"]."'");

    if($result2)
    {
        echo "<script>alert('Song Deleted Successfully')</script>";
        echo "<script>if(history.length>0){history.go(-1)}else{window.location='SongsDetails.php'}</script>";   
    }

?>