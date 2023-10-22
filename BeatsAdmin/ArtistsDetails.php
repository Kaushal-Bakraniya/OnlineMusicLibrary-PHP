<?php
session_start();
error_reporting(0);
include("class/AdminClass.php");

if(!$_SESSION["unm"])
{
    echo "<script>window.location='LoginPage.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Artists Details - BeatsAdmin</title>
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
        <?php $Page="ArtistsDetails"; include("includes/sidebar.php"); ?>
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include("includes/navmenu.php"); ?>
            <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h2 class="mb-4 text-warning">Artists Details</h2>
                            <div class="table-responsive">
                                <table class="table" style="color:white">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Profile Picture</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTbl">
                                        <?php

                                        $result = $admin->select("select * from users where Type='Artist'");
                                    
                                        while ($row = mysqli_fetch_array($result)) {
                                                
                                            if($row["ID"] == 1)
                                            {

                                            }
                                            else
                                            {        
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["ID"]; ?></th>
                                                <td><a href="SongsByArtist.php?ID=<?php echo $row["ID"]; ?>" class="text-warning"><?php echo $row["UserName"]; ?></a></td>
                                                <td><?php echo $row["Email"]; ?></td>
                                                <td><?php echo $row["Gender"]; ?></td>
                                                <td><img src="<?php echo "../BeatsMusic/" . $row["ProfilePicture"]; ?>" style="width:5rem;height:5rem"></td>
                                                <td><a href="EditAccount.php?ID=<?php echo $row["ID"]; ?>">Edit</a></td>
                                                <td><a href="DeleteAccount.php?ID=<?php echo $row["ID"]; ?>">Delete</a></td>
                                            </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->

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
    <script src="js/search.js"></script>
</body>

</html>