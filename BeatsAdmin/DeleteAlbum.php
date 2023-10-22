<?php

    include("Class/AdminClass.php");
    
    $result = mysqli_query($GLOBALS["con"],"select AlbumCover from albumsinfo where AlbumID='".$_REQUEST["ID"]."'");

    while ($row = mysqli_fetch_array($result)) 
    {
        $CoverPath = $row["AlbumCover"];
    }

    unlink("../BeatsMusic/".$CoverPath);

    $result3 = mysqli_query($GLOBALS["con"],"select FilePath,CoverPath,AlbumID from songsInfo where AlbumID='".$_REQUEST["ID"]."'");

    while ($row = mysqli_fetch_array($result3)) 
    {
        unlink("../BeatsMusic/".$row["FilePath"]);
        unlink("../BeatsMusic/".$row["CoverPath"]);
    }

    $result1 = mysqli_query($GLOBALS["con"], "delete from songsinfo where AlbumID='".$_REQUEST["ID"]."'");

    $result2 = mysqli_query($GLOBALS["con"],"delete from albumsinfo where AlbumID='".$_REQUEST["ID"]."'");

    if ($result1 && $result2) 
    {
        echo "<script>alert('Album Deleted Successfully')</script>";
        echo "<script>if(history.length>0){history.go(-1)}else{window.location='AlbumsDetails.php'}</script>";   
    }

?>