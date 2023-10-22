<?php

    include("Connect.php");

    class Album
    {
        function insAlbum($AlbumName, $AlbumCover, $ArtistID, $ArtistName)
        {
            $query = "insert into albumsinfo(AlbumName,AlbumCover,ArtistID,ArtistName) values('$AlbumName','$AlbumCover','$ArtistID','$ArtistName')";

            $result = mysqli_query($GLOBALS["con"], $query);

            if($result)
            {
                return true;
            }   
        }

        function editAlbum($AlbumName, $AlbumCover, $AlbumID)
        {
            $query = "update albumsinfo set AlbumName='$AlbumName',AlbumCover='$AlbumCover' where AlbumID='$AlbumID'";

            $result = mysqli_query($GLOBALS["con"], $query);

            $query2 = "update songsinfo set AlbumName='$AlbumName' where AlbumID='$AlbumID'";

            $result2 = mysqli_query($GLOBALS["con"], $query2);

            if ($result && $result2) 
            {
                return true;
            }
        }
    }   

    $album = new Album();

?>