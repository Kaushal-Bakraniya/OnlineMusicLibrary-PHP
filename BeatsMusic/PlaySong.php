<?php

session_start();

error_reporting(0);

include("class/Connect.php");

$max = max(mysqli_fetch_array(mysqli_query($GLOBALS["con"],"SELECT MAX(ID) FROM songsinfo")));
$min = min(mysqli_fetch_array(mysqli_query($GLOBALS["con"],"SELECT MIN(ID) FROM songsinfo")));

$result = mysqli_query($GLOBALS["con"], "select * from songsinfo where ID='" . $_REQUEST["ID"] . "'");

while ($row = mysqli_fetch_array($result)) 
{
    $songname = $row["SongName"];
    $audio = $row["FilePath"];
    $cover = $row["CoverPath"];
    $artist = $row["ArtistName"];
}

if(!$songname)
{
    if($_REQUEST["ID"] > $max || $_REQUEST["ID"] < $min)
    {
        echo "<script>window.location='PlaySong.php?ID=1'</script>";    
    }
    else
    {
        if($_REQUEST["req"] == "down")
        {
            $id = $_REQUEST["ID"] - 1;
            echo "<script>window.location='PlaySong.php?ID=". $id ."&req=down'</script>";
        }

        if($_REQUEST["req"] == "up")
        {
            $id = $_REQUEST["ID"] + 1;
            echo "<script>window.location='PlaySong.php?ID=". $id ."&req=up'</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlaySong - BeatsMusic</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/playsong.css">
    <link rel="icon" href="img/Beats.png">
</head>

<body style="background:url('<?php echo $cover; ?>');background-size:cover">
    <div class="login logbg">
        <audio src="<?php echo $audio; ?>" id="audio" autoplay loop></audio>
        <center>
            <img src="<?php echo $cover; ?>">
            <h1 style="display:block"><?php echo $songname; ?></h1>
            <h3>By <?php echo $artist; ?></h3>

            <div class="slider_container">
                <div class="current-time" id="current">00:00</div>
                <input id="seekslider" type="range" min="0" max="100" value="0" class="seek_slider" onchange="seekTo()">
                <div class="total-duration" id="total">00:00</div>
            </div>

            <span><a href="PlaySong.php?ID=<?php echo $_REQUEST["ID"]-1;?>&req=down"><i
                        class="bi bi-arrow-left-circle-fill"></i></a></span>
            <span onclick="playPause()" id="btn"><i class="bi bi-play-circle-fill"></i></span>
            <span><a href="PlaySong.php?ID=<?php echo $_REQUEST["ID"]+1;?>&req=up"><i
                        class="bi bi-arrow-right-circle-fill"></i></span>
            <a href="Songs.php" style="display:block;margin-top:5%">Back To Home</a><br><br>

            <?php 
        if($_SESSION["ID"])
        {
    ?>
            <a href="Download.php?ID=<?php echo $_REQUEST["ID"]; ?>" style="display:block;margin-top:-6%">Download This
                Song</a><br><br>
            <?php
        }
    ?>

        </center>
    </div>
    <script src="js/playsong.js"></script>
</body>

</html>