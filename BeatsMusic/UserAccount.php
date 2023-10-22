<?php 
    session_start(); 

    if($_SESSION["ID"] && $_SESSION["UserName"])
    {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>UserDetails - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <?php 

        include("Class/Beats.php");

        $result = $beats -> select("select * From users where ID='".$_SESSION["ID"]."'");
        
        while($row = mysqli_fetch_array($result))
        {
            $UserName = $row["UserName"];
            $ProfilePicture = $row["ProfilePicture"];
            $Email = $row["Email"];
            $Gender = $row["Gender"];
            $Type = $row["Type"];
            $Bio = $row["Bio"];
        }

    ?>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <style>
    .lnk {
        font-family: verdana;
        color: gold;
    }

    hr {
        background-color: white;
    }
    </style>

</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Start -->
        <?php $page="UserDetails"; include("Includes/NavMenu.php"); ?>
        <!-- Header End -->

        <div class=" products-catagories-area clearfix content">
            <section>
                <div class="container py-3">

                    <div class="card mb-3 bdr">
                        <div class="card-body p-2">
                            <h4 class="m-1"><i class="bi bi-person-circle mr-3"></i>User Details</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4 bdr">
                                <div class="card-body text-center">
                                    <img src="<?php  echo $ProfilePicture; ?>" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3 gold"><?php echo $UserName; ?></h5>
                                    <p class="mb-1"><?php echo $Type; ?></p>
                                    <p class="mb-4"><?php echo $Email; ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="EditAccount.php?ID=<?php echo $_SESSION["ID"]; ?>"><button
                                                type="button" class="btn btn-primary">Edit Profile</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4 bdr">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="gold mb-0">User Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="mb-0"><?php echo $UserName; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="gold mb-0">Email Address</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="mb-0"><?php echo $Email; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="gold mb-0">Account Type</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="mb-0"><?php echo $Type; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="gold mb-0">Gender</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="mb-0"><?php echo $Gender; ?></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="gold mb-0">Bio</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="mb-0"><?php echo $Bio; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container">


                            <?php

                if($_SESSION["Type"] == "Artist")
                {
            ?>

                            <div class="card mb-3 bdr">
                                <div class="card-body p-3">
                                    <h4 class="m-1"><i class="bi bi-person-check mr-3"></i>Artist Options</h4>
                                    <div class="row p-2 pt-3">
                                        <div class="col"><i class="bi bi-plus-circle mr-3"></i><a
                                                href="AddSong.php?ANM=None&AID=0" class="lnk">Add Song</a></div>
                                        <div class="col"><i class="bi bi-folder-plus mr-3"></i><a href="AddAlbum.php"
                                                class="lnk">Add Album</a></div>
                                        <div class="col"><i class="bi bi-music-note mr-3"></i><a href="ViewSongs.php"
                                                class="lnk">View Songs</a></div>
                                        <div class="col"><i class="bi bi-music-note-list mr-3"></i><a
                                                href="ViewAlbums.php" class="lnk">View Albums</a></div>
                                    </div>
                                </div>
                            </div>

                            <?php
                }
            ?>

                            <div class="card mb-3 bdr">
                                <div class="card-body p-1">
                                    <a href="Feedback.php">
                                        <h5 class="m-2"><i class="bi bi-chat-left-dots mr-3"></i>Give Us Feedback</h5>
                                    </a>
                                </div>
                            </div>

                            <div class="card bdr">
                                <div class="card-header bg-dark" style="border-bottom:1px solid #666">BeatsMusic.org
                                </div>
                                <div class="card-body">
                                    Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                    </script> All rights reserved | BeatsMusic.org
                                </div>
                            </div>
                        </div>

                    </div>

            </section>
        </div>
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
<?php
    }
    else
    {
        echo "<script>window.location='index.php'</script>";
    }
?>