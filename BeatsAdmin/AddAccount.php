<?php
session_start();

error_reporting(0);

include("class/AdminClass.php");
include("../BeatsMusic/Class/UserClass.php");

if (!$_SESSION["unm"]) {
    echo "<script>window.location='LoginPage.php'</script>";
}

if(isset($_POST["save"]))
{

}

if (isset($_POST["save"])) 
{
    
    if($_POST["Password"] == $_POST["confPassword"])
    {
        $fname = $_FILES["ProfilePicture"]["name"];
        $tname = $_FILES["ProfilePicture"]["tmp_name"];

        if(file_exists("../BeatsMusic/UploadsData/ProfilePictures/".$fname))
        {
            $filename = "UploadsData/ProfilePictures/".time()."_".$fname;
        }
        else
        {
            $filename = "UploadsData/ProfilePictures/".$fname;
        }
        
        $unm = $_POST["Username"];
        $gen = $_POST["gen"];
        $mail = $_POST["Email"];
        $bio = $_POST["bio"];
        $type = $_POST["type"];
        $pwd = $_POST["Password"];

        $query = "insert into users values(null,'$unm','$mail','$gen','$type','$filename',$bio,'$pwd')";

        $result = mysqli_query($GLOBALS["con"],$query);

        if($result)
        {
            move_uploaded_file($tname,"../BeatsMusic/".$filename);
            echo "<script>alert('Account Created Successfully')</script>";
            echo "<script>window.location='index.php'</script>";
        }
        else 
        {
            echo $query;
            echo mysqli_error($GLOBALS["con"]);
        }

    }
    else
    {
        echo "<script>alert('Passwords Doenst Match')</script>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Account - BeatsAdmin</title>
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
        <?php include("includes/sidebar.php"); ?>
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include("includes/navmenu.php"); ?>
            <!-- Navbar End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 d-flex justify-content-center mb-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h2 class="mb-4">Add Account</h2>
                            <form method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="Username" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="Email" class="form-control" name="Email" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Gender</label>
                                    <select class="mb-3 form-select" name="gen">
										<option value="Male" selected>Male</option>
										<option value="Female">Femake</option>
									</select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Account Type</label>
                                    <select class="mb-3 form-select" name="type">
										<option value="User" selected>User</option>
										<option value="Artist">Artist</option>
									</select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Profile Picture</label>
                                    <input class="form-control bg-dark" type="file" name="ProfilePicture" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">About User</label>
                                    <textarea class="form-control" name="bio" rows=3></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <input class="form-control bg-dark" type="password" name="Password" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Confirm Password</label>
                                    <input class="form-control bg-dark" type="password" name="confPassword" required>
                                </div>
                                <input type="submit" class="form-control bdr bg-primary text-white" name="save" value="Save Changes">
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