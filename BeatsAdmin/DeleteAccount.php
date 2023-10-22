<?php

    include("class/AdminClass.php");

    $id = $_REQUEST["ID"];

    $res = mysqli_query($GLOBALS["con"],"select Type from users where ID='$id'");

    while($row = mysqli_fetch_array($res))
    {
        $type = $row["Type"];
    }

    if($type == "Artist")
    {

        $res1 = mysqli_query($GLOBALS["con"],"select AlbumCover from albumsinfo where ArtistID='$id'");

        while($row = mysqli_fetch_array($res1))
        {
            unlink("../BeatsMusic/".$row["AlbumCover"]);
        }
        
        $res2 = mysqli_query($GLOBALS["con"],"select FilePath,CoverPath from songsinfo where ArtistID='$id'");

        while($row = mysqli_fetch_array($res2))
        {
            unlink("../BeatsMusic/".$row["FilePath"]);
            unlink("../BeatsMusic/".$row["CoverPath"]);
        }

        $res3 = mysqli_query($GLOBALS["con"],"select ProfilePicture from users where ID='$id'");

        while($row = mysqli_fetch_array($res3))
        {
            unlink("../BeatsMusic/".$row["ProfilePicture"]);
        }

        $delAlbum = mysqli_query($GLOBALS["con"],"delete from albumsinfo where ArtistID='$id'");

        $delSong = mysqli_query($GLOBALS["con"],"delete from songsinfo where ArtistID='$id'");

        $delUser = mysqli_query($GLOBALS["con"],"delete from users where ID='$id'");

        if($delAlbum && $delSong && $delUser)
        {
            echo "<script>alert('Artist Account Deleted Successfully')</script>";
            echo "<script>if(history.length>0){history.go(-1)}else{window.location='index.php'}</script>";   
        }
    }
    else
    {
        $res = mysqli_query($GLOBALS["con"],"select ProfilePicture from users where ID='$id'");

        while($row = mysqli_fetch_array($res))
        {
            unlink("../BeatsMusic/".$row["ProfilePicture"]);
        }

        $res1 = mysqli_query($GLOBALS["con"],"delete from users where ID='$id'");

        if($res1)
        {
            echo "<script>alert('User Account Deleted Successfully')</script>";
            echo "<script>if(history.length>0){history.go(-1)}else{window.location='index.php'}</script>";   
        }
    }

?>