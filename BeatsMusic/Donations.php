<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Donations - BeatsMusic</title>

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

            <h2 class="text-warning mt-3 mb-3"><i class="bi bi-envelope-paper-heart mr-3"></i>Donate to BeatsMedia.org
            </h2>

            <p>Thank you for your interest in donating to the Beatsmedia Foundation, the nonprofit that hosts
                BeatsMusic.</p>

            <p>BeatsMedia is a non-profit organization. BeatsMedia's purpose is to provide
                a platform for voluntary individual artists to publish their content and give listeners
                access to quality music for free.</p>

            <h4 class="text-warning mb-4 mt-4"><i class="bi bi-bank mr-3"></i>Bank transfer Details</h4>

            <h5 class="text-warning mb-3">For domestic and international transfers our deposit-only account is</h5>

            <ul class="text-white" style="font-family:calibari;font-size:18px">
                <li>Account Name: BeatsMedia Foundation</li>
                <li>Account Number: 12345678910</li>
                <li>Bank Name: ABC Bank of India</li>
                <li>Account Type: Saving Account</li>
                <li>Bank Address: G-3, ABC Street, New Delhi- 123456, India</li>
                <li>IFSC Code: ABCN0001234</li>
                <li>MICR No.: 123456789</li>
            </ul>

            <br>

            <p>Please note that we cannot automatically confirm the receipt of bank transfer donations,
                so please retain a confirmation of the transfer from your bank.</p>

            <p class="h5 text-white">
                <span class="text-warning">For Donation Receipts : </span>
                Mail to <a href="mailto:kbakraniya603@rku.ac.in"
                    style="color:royalblue;font-size:23px;font-family:Calibri">donate@beatsmedia.org</a>
            </p>

            <p><span class="text-warning">Note : </span> For donation receipts, please write your full details and
                include a bank transaction receipt in the mail.</p>

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