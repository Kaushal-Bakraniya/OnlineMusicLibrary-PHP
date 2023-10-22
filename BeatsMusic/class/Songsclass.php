<?php

    include("Connect.php");

    class songsInfo
    {
        function insert($SongName,$Language,$ArtistName,$ArtistID,$AlbumName,$AlbumID,$FilePath,$CoverPath)
        {
            $query = "insert into songsInfo(SongName,Language,ArtistName,ArtistID,AlbumName,AlbumID,FilePath,CoverPath) values('$SongName','$Language','$ArtistName','$ArtistID','$AlbumName','$AlbumID','$FilePath','$CoverPath')";

            $result = mysqli_query($GLOBALS["con"],$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function editSong($SongName,$Language,$CoverPath,$ID)
        {
            $query = "update songsinfo set SongName='$SongName',Language='$Language',CoverPath='$CoverPath' where ID='$ID'";
        
            $result = mysqli_query($GLOBALS["con"],$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    $songs = new songsInfo();

?>