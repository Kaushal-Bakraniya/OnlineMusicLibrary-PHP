<?php 
    include("Class/Connect.php");
    error_reporting(0);
?>

<!-- Search Wrapper Area Start -->
<div class="search-wrapper section-padding-100">
    <div class="search-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-content">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type your keyword...">
                        <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Wrapper Area End -->

<!-- Mobile Nav (max width 767px)-->
<div class="mobile-nav" style="background-color:black">
    <!-- Navbar Brand -->
    <div class="amado-navbar-brand">
        <a href="index.php"><img src="img/core-img/logo.png" alt="BeatsMusic"></a>
    </div>
    <!-- Navbar Toggler -->
    <div class="amado-navbar-toggler">
        <span></span><span></span><span></span>
    </div>
</div>
<!-- End Mobile Nav (max width 767px)-->

<style>
.link {
    width: 23px;
    height: 23px;
    margin-right: 10%;
}

.profile {
    width: 24px;
    height: 24px;
    margin-right: 10%;
    border-radius: 100%;
}
</style>
<!-- Header Area Start -->
<header class="header-area clearfix" style="background-color:black;position:fixed;height:100%">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" style="margin-top:35%" aria-hidden="true"></i>
    </div>

    <!-- Logo -->
    <div class="logo" style="margin-bottom:35%;">
        <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
    </div>

    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="<?php echo ($page== "index"?"active":""); ?>"><a href="./index.php" style="color:white;"><img
                        src="img\core-img\Homeicon.png" class="link">Home</a></li>
            <li class="<?php echo ($page== "Songs"?"active":""); ?>"><a href="./Songs.php"
                    style="color:white;"><img src="img\core-img\musicicon.png" class="link">Songs</a></li>
            <li class="<?php echo ($page== "Albums"?"active":""); ?>"><a href="./Albums.php" style="color:white;"><img
                        src="img\core-img\album.png" class="link">Albums</a></li>
            <li class="<?php echo ($page== "artists"?"active":""); ?>"><a href="./Artists.php" style="color:white;"><img
                        src="img\core-img\SingerIcon.png" class="link">Artists</a></li>
            <li class="<?php echo ($page== "aboutus"?"active":""); ?>"><a href="./AboutUs.php" style="color:white;"><img
                        src="img\core-img\Abouticon.png" class="link">About Us</a></li>
            <?php 
                if($_SESSION["ID"] && $_SESSION["UserName"])
                {
            ?>
            <li class="<?php echo ($page== "UserDetails"?"active":""); ?>"><a href="./UserAccount.php"
                    style="color:white;"><img src="<?php echo $_SESSION["ProfilePicture"]; ?>" class="profile"
                        alt=""><?php echo $_SESSION["UserName"]; ?></a></li>
            <li><a href="Logout.php" style="color:white;"><img src="img\core-img\logouticon.png" class="link">Logout</a>
            </li>
            <?php
                }
                else
                {
            ?>
            <li class="<?php echo ($page== "UserDetails"?"active":""); ?>"><a href="./LoginPage.php"
                    style="color:white;"><img src="img/core-img/LoginIcon.png" class="link" alt="">Log In</a></li>
            <?php 
                }
            ?>

        </ul>
    </nav>
</header>