<?php
    session_start();

    include("class/AdminClass.php");

    if(!$_SESSION["unm"])
    {
        echo "<script>window.location='LoginPage.php'</script>";
    }

    $res = $admin -> select("select * from feedback where ID='".$_REQUEST["ID"]."'");

    while($row = mysqli_fetch_array($res))
    {
        $email = $row["Email"];
        $uid = $row["UID"];
    }

    if(isset($_POST["sendmail"]))
    {
        $result = mysqli_query($GLOBALS["con"],"update feedback set Status='Viewed'");

        $admin -> sendReply($_POST["to"],$_POST["reply"]);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reply to feedback - BeatsAdmin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link rel="icon" href="img/Beats.png">
    
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <?php $Page = "UserFeedbacks"; include("includes/sidebar.php"); ?>
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
                <?php include("includes/navmenu.php"); ?>
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 d-flex justify-content-center">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4 mb-3">
                            <h1 class="mb-4">Reply to feedback</h1>
                            <form method="post">
                                <div class="mb-3">
                                    <label class="form-label">From : </label>
                                    <input type="text" class="form-control bg-dark" 
                                    value="support@beatsmusic.com" readonly
                                    name="from">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">To : </label>
                                    <input type="text" class="form-control bg-dark" 
                                    value="<?php echo $email; ?>" readonly
                                    name="to">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Write Your Reply Here</label>
                                    <textarea class="form-control bg-dark" name="reply" rows=7></textarea>
                                </div>
                                <input type="submit" class="form-control bdr mb-3 bg-primary text-white" name="sendmail" value="Send Mail">
                                <a href="ViewFeedback.php?ID=<?php echo $_REQUEST["ID"] ?>">Back to view feedback</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

       </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>