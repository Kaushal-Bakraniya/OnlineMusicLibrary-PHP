<?php 

    session_start();

    if($_SESSION["ID"] && $_REQUEST["ID"])
    {
        include("class/connect.php");

        $result1 = mysqli_query($GLOBALS["con"],"select FilePath,CoverPath,ArtistID from songsinfo where ID='".$_REQUEST["ID"]."'");

        while($row = mysqli_fetch_array($result1))
        {
            $FilePath = $row["FilePath"];
            $CoverPath = $row["CoverPath"];
            $ArtistID = $row["ArtistID"];
        }

        if($ArtistID == $_SESSION["ID"])
        {
            unlink($FilePath);

            unlink($CoverPath);

            $result2 = mysqli_query($GLOBALS["con"],"delete from songsinfo where ID='".$_REQUEST["ID"]."'");

            if($result2)
            {
                echo "<script>alert('Song Deleted Successfully')</script>";
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