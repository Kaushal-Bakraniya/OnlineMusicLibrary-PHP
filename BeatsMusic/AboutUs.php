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

    <title>About Us - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Start -->
        <?php $page = "aboutus";
        include("Includes/NavMenu.php"); ?>
        <!-- Header End -->

        <div class="products-catagories-area clearfix p-2 content">

            <h1 class="text-warning mt-3 mb-3"><i class="bi bi-info-circle mr-3"></i>About Us</h1>

            <p>BeatsMusic is a free online music sharing platform powered by a global community of individual artists
                and
                listeners on the pulse of what's new, now and next in music culture. We empower independent artists by
                providing them platform and help them to build and grow their career, our purpose is to provide a
                platform for voluntary individual artists
                to publish their content and give listeners access to quality music for free.</p>

            <h4 class="text-warning mb-4 mt-5"><i class="bi bi-question-circle mr-3"></i>How can you use BeatsMusic ?
            </h4>

            <p>
                <span class="text-warning"><i class="bi bi-mic mr-2 h5"></i>Be an artist, </span>Upload tracks or albums
                and share them with your social networks
                Create an account and share songs or albums with millions of listeners from around the world for free 

            </p>

            <p class="mb-4">
                <span class="text-warning"><i class="bi bi-headset mr-2 h5"></i>Be a listener,</span> Find new music and
                share your favourite discoveries with your social networks,
                Create an account and download or listen to millions of amazing songs by thousands of artists from
                around the world.
            </p>

            <a href="TermsConditions.php" style="font-size:16px;color:skyblue">Click here to read more about Terms &
                Conditions.</a>

            <p style="font-size:16px" class="mt-3">For any issue you can contact us on <a
                    href="mailto:kbakraniya603@rku.ac.in" style="color:skyblue;font-size:16px">help@beatsmusic.com</a>
            </p>


            <h4 class="text-warning mb-4 mt-5"><i class="bi bi-boombox mr-3"></i>Support BeatsMedia.org</h4>

            <p>
                BeatsMedia is a non-profit organization, BeatsMedia's purpose is to provide a platform for voluntary
                individual artists
                to publish their content and give listeners access to quality music for free.
            </p>

            <a href="Donations.php" class="text-primary" style="font-size:23px;font-family:calibari">
                <i class="bi bi-link-45deg mr-2"></i>Support us by donate to BeatsMedia.org</a>

            <h4 class="text-warning mb-4 mt-5"><i class="bi bi-envelope-check mr-3"></i>Contact Us</h4>

            <p style="font-size:20px;">Email : <a href="mailto:kbakraniya603@rku.ac.in"
                    style="font-size:20px;color:skyblue">help@beatsmusic.com</a></p>

            <br>

        </div>
    </div>

    <!-- Scripts -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>

</body>

</html>