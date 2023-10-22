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

    <title>ArtistInfo - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">

    <?php

    include("Class/Beats.php");

    $result = $beats->select("Select * From users where ID='" . $_REQUEST['ID'] . "'");

    while ($row = mysqli_fetch_array($result)) {
        $UserName = $row["UserName"];

        $ProfilePicture = $row["ProfilePicture"];

        $Bio = $row["Bio"];
    }
    ?>

</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Start -->
        <?php $page = "artists";
        include("Includes/NavMenu.php"); ?>
        <!-- Header End -->

        <div class="products-catagories-area clearfix content">

            <div class="container">

                <h1 class="ml-2 text-warning mb-3 mt-4" style="color:gold"><?php echo $UserName; ?></h1>

                <div>
                    <div>
                        <img src="<?php echo $ProfilePicture; ?>" alt="avatar" class="ml-2" style="width:35vh">
                        <p class="ml-2 mt-3 text-white"><?php echo $Bio; ?></p>
                    </div>
                </div>


                <!-- Songs By Artist -->
                <h2 class="ml-2 text-warning mb-3 mt-4">Songs By <?php echo $UserName; ?></h2>

                <input type="search" class="form-control ml-2 mb-3 bg-dark text-white rounded" placeholder="Search "
                    id="srch" onkeyup="search()" style="width:70%" />

                <div class="clearfix" id="parentDiv">
                    <?php
                    $result = mysqli_query($GLOBALS["con"], "select * from songsinfo where ArtistID='" . $_REQUEST["ID"] . "' ORDER BY ID DESC");

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_array($result)) {
                    ?>

                    <div class="single-products-catagory clearfix p-2" style="display:inline;float:left">
                        <a href="PlaySong.php?ID=<?php echo $row["ID"]; ?>" target="blank">
                            <img src=" <?php echo $row['CoverPath']; ?>" alt="">
                            <div class="hover-content">
                                <h1 class="info"><?php echo $row["SongName"]; ?></h1>
                                <p class="info" style="color:white">By <?php echo $row["ArtistName"]; ?></p>
                            </div>
                        </a>
                    </div>

                    <?php
                        }
                    } else {
                        echo '<p class="ml-2 h3 mt-4">No Data Found</p>';
                    }
                    ?>
                </div>
                <!-- End Discover Hits -->


            </div>
            <!-- End Songs By Artist -->

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
    <script src="FetchArtistSong.js"></script>
</body>

</html>