<?php

    session_start();
    
    if($_SESSION["ID"] && $_REQUEST["ID"])
    {
        include("Class/Connect.php");
    
        $result = mysqli_query($GLOBALS["con"],"select AlbumCover,ArtistID from albumsinfo where AlbumID='".$_REQUEST["ID"]."'");
    
        while ($row = mysqli_fetch_array($result)) 
        {
            $CoverPath = $row["AlbumCover"];
            $ArtistID = $row["ArtistID"];
        }
    
        if($_SESSION["ID"] == $ArtistID)
        {
            unlink($CoverPath);
    
            $result3 = mysqli_query($GLOBALS["con"],"select FilePath,CoverPath,AlbumID from songsInfo where AlbumID='".$_REQUEST["ID"]."'");
        
            while ($row = mysqli_fetch_array($result3)) 
            {
                unlink($row["FilePath"]);
                unlink($row["CoverPath"]);
            }
        
            $result1 = mysqli_query($GLOBALS["con"], "delete from songsinfo where AlbumID='".$_REQUEST["ID"]."'");
        
            $result2 = mysqli_query($GLOBALS["con"],"delete from albumsinfo where AlbumID='".$_REQUEST["ID"]."'");
        
            if ($result1 && $result2) 
            {
                echo "<script>alert('Album Deleted Successfully')</script>";
                echo "<script>window.location='UserAccount.php'</script>";
            }
        }
        else
        {
            echo "<script>alert('Access Denied')</script>";
            echo "<script>window.location='UserAccount.php'</script>";   
        }
    }
    else
    {
        echo "<script>alert('Access Denied')</script>";
        echo "<script>window.location='UserAccount.php'</script>";   
    }

?>