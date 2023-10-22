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

    <title>UserDetails - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <?php 

        include("Class/Beats.php");

        $result = $beats -> select("select * From songsinfo where ID='".$_REQUEST["ID"]."'");
        
        while($row = mysqli_fetch_array($result))
        {
            $SongName = $row["SongName"];
            $ArtistName = $row["ArtistName"];
            $ArtistID = $row["ArtistID"];
            $Album = $row["AlbumName"];
            $CoverPhoto = $row["CoverPath"];
        }

        if($ArtistID != $_SESSION["ID"])
        {
            echo "<script>alert('Access Denied')</script>";
            echo "<script>window.location='UserAccount.php'</script>";   
        }

        include("Class/SongsClass.php");

        if(isset($_POST["save"]))
        {
            $fname = $_FILES["CoverPhoto"]["name"];

            if($fname == substr($CoverPhoto,24))
            {
                $filename = $CoverPhoto;
            }
            else
            {
                $tname = $_FILES["CoverPhoto"]["tmp_name"];

                if(file_exists("UploadsData/CoverPhotos/".$fname))
                {
                    $filename = "UploadsData/CoverPhotos/".time()."_".$fname;
                }
                else
                {
                    $filename = "UploadsData/CoverPhotos/".$fname;
                }

                unlink($CoverPhoto);
                
                move_uploaded_file($tname,$filename);

            }

            $res = $songs -> editSong($_POST["SongName"],$_POST["lang"],$filename,$_REQUEST["ID"]);

            if($res)
            {
                echo "<script>alert('Song Details Updated Successfully')</script>";
                echo "<script>window.location='ViewSongs.php'</script>";
            }
            else
            {
                echo "<script>alert('Something Went Wrong')</script>";
                echo "<script>window.location='ViewSongs.php'</script>";
            }
        }
    ?>

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Start -->
        <?php include("Includes/NavMenu.php"); ?>
        <!-- Header End -->

        <div class="products-catagories-area clearfix content">
            <section>
                <div class="container py-3">
                    <div class="card mb-3 bdr">
                        <div class="card-body p-2">
                            <h4 class="m-1"><i class="bi bi-music-note mr-2"></i>Edit Song</h4>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="card mb-3 bdr">
                                <div class="card-body p-3">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Song Name</label>
                                            <input type="text" class="form-control bdr"
                                                style="background-color:black;color:white" name="SongName"
                                                value="<?php echo $SongName; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Langauge</label>
                                            <select class="mb-3" name="lang">
                                                <option value="English">English</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Gujrati">Gujrati</option>
                                                <option value="Punjabi">Punjabi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Cover Photo</label>
                                            <input type="file" class="form-control bdr"
                                                style="background-color:black;color:white" accept="image/*"
                                                name="CoverPhoto">
                                        </div>
                                        <input type="checkbox" class="mt-0 mb-4" required>
                                        <span>I agree to all <a href="TermsConditions.php"
                                                style="font-size:17px;color:skyblue">Terms & Conditions</a></span>
                                        <input type="submit" class="form-control bdr"
                                            style="background-color:royalblue;color:white" name="save"
                                            value="Save Changes">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <script>
        const fileInput = document.querySelector('input[type="file"]');

        const myFile = new File(['File'], '<?php echo $CoverPhoto; ?>');

        const dataTransfer = new DataTransfer();

        dataTransfer.items.add(myFile);

        fileInput.files = dataTransfer.files;
        </script>
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