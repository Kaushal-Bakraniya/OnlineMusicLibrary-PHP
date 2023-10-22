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

    <title>Albums - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">

    <?php
    include("Class/Beats.php");
    ?>

</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Songs SideBar -->
        <?php $page = "Albums";
        include("Includes/NavMenu.php"); ?>
        <!-- End SongsSideBar -->

        <div class="products-catagories-area clearfix content">

            <!-- Discover Songs -->
            <h1 class="heading pl-2">Albums</h1>

            <input type="search" class="form-control ml-2 mb-3 bg-dark text-white rounded" placeholder="Search "
                id="search_text" style="width:70%" />

            <div class="amado-pro-catagory clearfix" id="result">
                <?php

                $result = mysqli_query($GLOBALS["con"], "select * from albumsinfo ORDER BY AlbumID DESC");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {

                ?>
                <div class="single-products-catagory clearfix p-2">
                    <a href="AlbumInfo.php?AID=<?php echo $row["AlbumID"]; ?>">
                        <img src="<?php echo $row['AlbumCover']; ?>" alt="" style="width:340px">
                        <div class="hover-content">
                            <h1 class="info"><?php echo $row["AlbumName"]; ?></h1>
                            <p class="info" style="color:white">By <?php echo $row["ArtistName"]; ?></p>
                        </div>
                    </a>
                </div>
                <?php
                    }
                } else {
                    echo '<p class="ml-2 h3 mt-2">Loading..</p>';
                }
                ?>

            </div>

        </div>
        <!-- End Discover Hits -->

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
    <script src="FetchAlbum.js"></script>
</body>

</html>