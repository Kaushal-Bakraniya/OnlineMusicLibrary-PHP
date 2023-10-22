<?php
session_start();
include("class/AdminClass.php");
error_reporting(0);
if (!$_SESSION["unm"]) {
    echo "<script>window.location='LoginPage.php'</script>";
}

$res = $admin -> select("select * from songsinfo");
$songcount = mysqli_num_rows($res);

$res = $admin -> select("select * from users where Type!='Artist'");
$usercount = mysqli_num_rows($res);

$res = $admin -> select("select * from albumsinfo");
$albumcount = mysqli_num_rows($res);

$res = $admin -> select("select * from users where Type='Artist'");
$artistcount = mysqli_num_rows($res);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home - BeatsAdmin</title>
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

        <?php $Page = "index";
        include("includes/sidebar.php"); ?>

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include("includes/navmenu.php"); ?>
                
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Songs</p>
                                <h6 class="mb-0"><?php echo $songcount; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>    
                            <div class="ms-3">
                                <p class="mb-2">Total Albums</p>
                                <h6 class="mb-0"><?php echo $albumcount; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>    
                            <div class="ms-3">
                                <p class="mb-2">Total Users</p>
                                <h6 class="mb-0"><?php echo $usercount; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>    
                            <div class="ms-3">
                                <p class="mb-2">Total Users</p>
                                <h6 class="mb-0"><?php echo $usercount; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-14 col-md-8 col-xl-12 mb-3" style="width:100%">
                        <div class="h-100 bg-secondary rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h3 class="mb-0 text-warning">User Feedbacks</h3>
                                <a href="UserFeedbacks.php" style="color:gold">Show All<div></div></a>
                            </div>
                            <?php

                                $result = $admin->select("select * from feedback");
                                
                                $i = 0;

                                while (($row = mysqli_fetch_array($result)) && $i<5) 
                                {
                            ?>
                                <div class="d-flex align-items-center border-bottom py-3">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0"><?php echo $row["Email"]; ?></h6>
                                            <big><a href="#?ID=<?php echo $row["ID"]; ?>">Review</a></big>
                                        </div>
                                        <span><?php echo $row["Feedback"]; ?></span>
                                    </div>
                                </div>
                            <?php
                                    $i = $i + 1;

                                    if($i > 3)
                                    {
                                        break;
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h3 class="mb-0 text-warning">Songs Details</h3>
                                <a href="SongsDetails.php" style="color:gold">Show All<div></div></a>
                            </div>
                            <div class="table-responsive">
                            <table class="table" style="color:white">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Song Name</th>
                                            <th scope="col">Artist Name</th>
                                            <th scope="col">Album Name</th>
                                            <th scope="col">Play Song</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTbl">
                                        <?php

                                        $result = $admin->select("select * from songsinfo");

                                        $i = 1;

                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["ID"]; ?></th>
                                                <td><?php echo $row["SongName"]; ?></td>
                                                <td><?php echo $row["ArtistName"]; ?></td>
                                                <td><?php echo $row["AlbumName"]; ?></td>
                                                <td><a href="../BeatsMusic/PlaySong.php?ID=<?php echo $row["ID"]; ?>" target="blank"><img src="<?php echo "../BeatsMusic/" . $row["CoverPath"]; ?>" style="width:5rem;height:5rem"></a></td>
                                            </tr>
                                        <?php
                                            $i = $i + 1;

                                            if($i > 3)
                                            {
                                                break;
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
            
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h3 class="mb-0 text-warning">Albums Details</h3>
                                <a href="SongsDetails.php" style="color:gold">Show All<div></div></a>
                            </div>
                            <div class="table-responsive">
                            <table class="table" style="color:white">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Album Name</th>
                                            <th scope="col">Cover Photo</th>
                                            <th scope="col">Artist ID</th>
                                            <th scope="col">Artist Name</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTbl">
                                        <?php

                                        $result = $admin->select("select * from albumsinfo");

                                        $i = 1;

                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["AlbumID"]; ?></th>
                                                <td><a href="SongsByAlbum.php?ID=<?php echo $row["AlbumID"]; ?>" class="text-warning"><?php echo $row["AlbumName"]; ?></a></td>
                                                <td><img src="<?php echo "../BeatsMusic/" . $row["AlbumCover"]; ?>" style="width:5rem;height:5rem"></td>
                                                <td><?php echo $row["ArtistID"]; ?></td>
                                                <td><?php echo $row["ArtistName"]; ?></td>
                                            </tr>
                                        <?php

                                            $i = $i + 1;

                                            if($i > 3)
                                            {
                                                break;
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
            
            <br>
            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        
    <script src="js/search.js"></script>
</body>

</html>