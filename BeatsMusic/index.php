<?php
session_start();
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">

    <?php
    include("Class/Beats.php");
    ?>
</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Start -->
        <?php $page = "index";
        include("Includes/NavMenu.php"); ?>
        <!-- Header End -->

        <div class="products-catagories-area clearfix content">

            <!-- Latest Songs -->
            <h1 class="heading pl-2">Latest Songs</h1>
            <div class="clearfix">

                <?php

                $result = $beats->select("select * from songsinfo ORDER BY ID DESC");

                $i = 1;

                while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="single-products-catagory clearfix p-2" style="display:inline;float:left">
                    <a href="PlaySong.php?ID=<?php echo $row["ID"]; ?>" target="blank">
                        <img src="<?php echo $row['CoverPath']; ?>" alt="" style="width:340px">
                        <div class="hover-content">
                            <h1 class="info"><?php echo $row["SongName"]; ?></h1>
                            <p class="info" style="color:white">By <?php echo $row["ArtistName"]; ?></p>
                        </div>
                    </a>
                </div>

                <?php

                    $i++;

                    if ($i > 3) {
                        break;
                    }
                }
                ?>
            </div>
            <a href="songs.php" class="more">See More</a>
            <br>
            <!-- End Latest Songs -->

            <!-- Trending Artists -->
            <h1 class="heading pl-2">Trending Artists</h1>
            <div class="clearfix">

                <?php

                $result = $beats->select("Select * From users where Type='Artist' ORDER BY ID DESC");

                $i = 1;

                while ($row = mysqli_fetch_array($result)) {
                    if ($row["ID"] != 1) {
                ?>

                <div class="single-products-catagory clearfix p-2" style="display:inline;float:left">
                    <a href="ArtistInfo.php?ID=<?php echo $row["ID"]; ?>">
                        <img src="<?php echo $row['ProfilePicture']; ?>" alt=""style="width:340px">
                        <div class="hover-content">
                            <h1 class="info"><?php echo $row["UserName"]; ?></h1>
                        </div>
                    </a>
                </div>

                <?php
                    }
                    $i++;

                    if ($i > 3) {
                        break;
                    }
                }
                ?>

            </div>
            <a href="Artists.php" class="more">See More</a>
            <br>
            <!-- End Trending Artists -->

            <h1 class="heading pl-2">Latest Albums</h1>
            <div class="amado-pro-catagory clearfix" id="result">
                <?php

                $result = mysqli_query($GLOBALS["con"], "select * from albumsinfo ORDER BY AlbumID DESC");

                $i = 1;

                    while ($row = mysqli_fetch_array($result)) 
                    {
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
                        $i++;

                        if ($i > 3) 
                        {
                            break;
                        } 
                    }
                ?>

            </div>

            <a href="albums.php" class="more">See More</a>
            <br>
            <!-- Evergreen Songs -->

            <h1 class="heading pl-2">Evergreen Songs</h1>
            <div class="clearfix">

                <?php

                $result = $beats->select("Select * From songsinfo ORDER BY ID ASC");

                $i = 1;

                while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="single-products-catagory clearfix p-2" style="display:inline;float:left">
                    <a href="PlaySong.php?ID=<?php echo $row["ID"]; ?>" target="blank">
                        <img src="<?php echo $row['CoverPath']; ?>" alt="" style="width:340px">
                        <div class="hover-content">
                            <h1 class="info"><?php echo $row["SongName"]; ?></h1>
                            <p class="info" style="color:white">By <?php echo $row["ArtistName"]; ?></p>
                        </div>
                    </a>
                </div>

                <?php

                    $i++;

                    if ($i > 3) {
                        break;
                    }
                }
                ?>

            </div>
            <a href="songs.php" class="more">See More</a>
            <br>
            <!-- End Evergreen Songs -->

        </div>
        <br><br>
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