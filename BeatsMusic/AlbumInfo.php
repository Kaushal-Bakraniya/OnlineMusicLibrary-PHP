<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AlbumInfo - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <?php 
        include("Class/Beats.php");

        $result = $beats -> select("Select * From Songsinfo where AlbumID='".$_REQUEST["AID"]."'");
    
        while($row = mysqli_fetch_array($result))
        {
            $AlbumName = $row["AlbumName"];
            $ArtistName = $row["ArtistName"];
        }

        $result = $beats -> select("Select * From Songsinfo where AlbumID='".$_REQUEST["AID"]."'");
    
        while($row = mysqli_fetch_array($result))
        {
            $AlbumName = $row["AlbumName"];
            $ArtistName = $row["ArtistName"];
        }
    ?>

</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Songs SideBar -->
        <?php $page = "Albums"; include("Includes/NavMenu.php"); ?>
        <!-- End SongsSideBar -->

        <div class="products-catagories-area clearfix content">

            <div class="container py-3">

                <div class="card mb-3 bg-dark">

                    <div class="card-body p-2">
                        <h3 class="m-1 text-light">
                            <i class="bi bi-music-note-list mr-3 ml-1"></i>Album Name : <?php echo $AlbumName; ?>
                        </h3>
                    </div>

                    <div class="card-body p-2">
                        <h3 class="m-1 text-light">
                            <i class="bi bi-mic-fill mr-3 ml-1"></i>Artist Name : <?php echo $ArtistName; ?>
                        </h3>
                    </div>

                </div>

                <h2 class="ml-2 text-warning mb-3 mt-4">Songs from <?php echo $AlbumName; ?></h2>

                <input type="search" class="form-control ml-2 mb-3 bg-dark text-white rounded" placeholder="Search "
                    id="srch" onkeyup="search()" style="width:70%" />

                <div class="clearfix" id="parentDiv">

                    <?php     
                $result = $beats -> select("Select * From songsinfo Where AlbumID='".$_REQUEST["AID"]."'");
                
                while($row = mysqli_fetch_array($result))
                {
            ?>

                    <div class="single-products-catagory clearfix p-2" style="display:inline;float:left">
                        <a href="PlaySong.php?ID=<?php echo $row["ID"]; ?>" target="blank">
                            <img src="<?php echo $row['CoverPath']; ?>" alt="" style="height:340px;">
                            <div class="hover-content">
                                <h1 class="info"><?php echo $row["SongName"]; ?></h1>
                                <p class="info" style="color:white">By <?php echo $row["ArtistName"]; ?></p>
                            </div>
                        </a>
                    </div>

                    <?php 
                }
            ?>

                </div>
                <!-- End Album Songs -->
            </div>
        </div>
        <script src="js/search.js"></script>
        <!-- jQuery (Necessary for All JavaScript Plugins) -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <!-- Popper js -->
        <script src="js/popper.min.js"></script>
        <!-- Bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Plugins js -->
        <script src="js/plugins.js"></script>
        <!-- Active js -->
        <script src="js/active.js"></script>
</body>

</html>