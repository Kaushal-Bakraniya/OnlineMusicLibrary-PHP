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

    <title>Artists - BeatsMusic</title>

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
        <?php $page = "artists";
        include("Includes/NavMenu.php"); ?>
        <!-- Header End -->

        <div class="products-catagories-area clearfix content">

            <!-- Amazing Artists -->
            <h1 class="heading ml-2">Amazing Artists</h1>

            <input type="search" class="form-control ml-2 mb-3 bg-dark text-white rounded" placeholder="Search "
                id="srch" onkeyup="search()" style="width:70%" />

            <div class="clearfix" id="parentDiv">
                <?php
                $result = mysqli_query($GLOBALS["con"], "select * from users where Type='Artist' and ID!=1 ORDER BY ID DESC");

                if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                ?>

                <div class="single-products-catagory clearfix p-2" style="display:inline;float:left">
                    <a href="ArtistInfo.php?ID=<?php echo $row["ID"]; ?>" target="blank">
                        <img src=" <?php echo $row['ProfilePicture']; ?>" alt="">
                        <div class="hover-content">
                            <h1 class="info"><?php echo $row["UserName"]; ?></h1>
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
            <!-- End Amazing Artists -->

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