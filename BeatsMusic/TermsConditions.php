<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>About Us - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Start -->
        <?php $page = "aboutus";
        include("Includes/NavMenu.php"); ?>
        <!-- Header End -->

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix p-2 content">

            <h1 class="text-warning mt-3 mb-3"><i class="bi bi-info-circle mr-3"></i>Terms & Conditions</h1>

            <p>
                When you check I agree to Terms & Conditions you are accepting our privacy policy and content policy.
            </p>


            <h4 class="text-warning mb-4 mt-4"><i class="bi bi-info-square mr-3"></i> Privacy Policy</h4>

            <p>
                <span class="text-warning"><i class="bi bi-headset mr-2 h5"></i>For Listeners, </span> All of the data
                you share with us (including your personal info, feedback, etc.) is
                protected and used only for making the user experience better we do not share any user data with any
                third party organization.
            </p>

            <p>
                <span class="text-warning"><i class="bi bi-mic mr-2 h5"></i>For artists,</span> Your public profile
                information like
                username, bio, email, and profile picture will be available publicly on the website, When anyone views
                your public profile, they will be able to see this information, Your personal information is protected
                under our privacy policy. 
            </p>

            <h4 class="text-warning mb-4 mt-5"><i class="bi bi-info-square mr-3"></i>Content Policy</h4>

            <p>Content on this website is available to users for download and listening purposes.</p>

            <p>
                Songs or albums available on this website are created and managed by individual
                artists BeatsMusic doesn't take any legal responsibility for the content available on the platform.
            </p>

            <p>
                When an artist uploads a song or creates an album, he/she is assuring that they are the owners/creators
                of the content, in any
                case of copyright claim or other legal issue, the responsibility will be of the content owners/artists. 
            </p>

            <p class="text-warning mb-4 mt-3">For any issue related to content on the website you can mail us on <a
                    href="mailto:kbakraniya603@rku.ac.in" style="color:skyblue;font-size:18px">help@beatsmusic.com</a>
            </p>

            <br>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
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