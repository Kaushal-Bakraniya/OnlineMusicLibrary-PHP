<?php
session_start();

include("class/Connect.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Songs - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
    .filterDiv {
        display: none;
    }

    .activediv {
        background-color: gold;
        ;
    }

    .show {
        display: inline;
    }
    </style>

</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Songs SideBar -->
        <?php $page = "Songs";
        include("Includes/NavMenu.php"); ?>
        <!-- End SongsSideBar -->

        <div class="products-catagories-area clearfix content">

            <!-- Discover Songs -->
            <h1 class="heading pl-2">Discover Songs</h1>

            <input type="search" class="form-control ml-2 mb-3 bg-dark text-white rounded" placeholder="Search "
                id="srch" onkeyup="search()" style="width:70%" />

            <div id="myBtnContainer" class="mt-2 mb-2">
                <button class="btn activediv m-2" onclick="filterSelection('all')">All Songs</button>
                <button class="btn m-2 " onclick="filterSelection('English')">English</button>
                <button class="btn m-2 " onclick="filterSelection('Hindi')">Hindi</button>
                <button class="btn m-2 " onclick="filterSelection('Gujrati')">Gujrati</button>
                <button class="btn m-2 " onclick="filterSelection('Punjabi')">Punjabi</button>
            </div>

            <div class="clearfix" id="parentDiv">
                <?php

                $query = "select * from songsinfo ORDER BY Downloads DESC, ID ASC";

                $result = mysqli_query($GLOBALS["con"], $query);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="single-products-catagory filterDiv <?php echo $row["Language"]; ?> clearfix p-2"
                    style="float:left" id="<?php echo $row["Language"]; ?>">
                    <a href="PlaySong.php?ID=<?php echo $row["ID"]; ?>" target="blank">
                        <img src=" <?php echo $row['CoverPath']; ?>" alt="" width="340px">
                        <div class="hover-content">
                            <h1 class="info"><?php echo $row["SongName"]; ?></h1>
                            <p class="info" style="color:white">By <?php echo $row["ArtistName"]; ?></p>
                        </div>
                    </a>
                </div>

                <?php
                    }
                } else {
                    echo '<p class="ml-2 h3 mt-4">Loading..</p>';
                }
                ?>
            </div>
            <!-- End Discover Hits -->

        </div>

        <script src="js/search.js"></script>
        <script src="js/filterdiv.js"></script>

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