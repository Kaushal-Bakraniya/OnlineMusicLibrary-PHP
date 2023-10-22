<?php 
	session_start();

	if ($_SESSION["Type"] == "Artist") 
	{
		echo "<script>window.location='index.php'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add Song - BeatsMusic</title>
    <link rel="icon" href="img/core-img/favicon.ico">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <?php

		include("Class/SongsClass.php");
	
		if (isset($_POST["ok"])) 
		{
			$fname1 = $_FILES["music"]["name"];
			$tname1 = $_FILES["music"]["tmp_name"];

			if (file_exists("UploadsData/MusicFiles/" . $fname1)) 
			{
				$filename1 = "UploadsData/MusicFiles/" . time() . "_" . $fname1;
			} 
			else 
			{
				$filename1 = "UploadsData/MusicFiles/" . $fname1;
			}
		}

		if (isset($_POST["ok"])) 
		{
			$fname2 = $_FILES["img"]["name"];
			$tname2 = $_FILES["img"]["tmp_name"];

			if (file_exists("UploadsData/CoverPhotos/" . $fname2)) 
			{
				$filename2 = "UploadsData/CoverPhotos/" . time() . "_" . $fname2;
			} 
			else 
			{
				$filename2 = "UploadsData/CoverPhotos/" . $fname2;
			}
		}

		if (isset($_POST["ok"])) 
		{
			$result = $songs->insert($_POST["nm"], $_POST["lang"], $_SESSION["UserName"], $_SESSION["ID"], $_REQUEST["ANM"], $_REQUEST["AID"], $filename1, $filename2);

			if ($result == true) 
			{
				move_uploaded_file($tname1, $filename1);
				move_uploaded_file($tname2, $filename2);

				echo "<script>alert('Song Uploaded Succesfully')</script>";
				echo "<script>window.location='ViewSongs.php'</script>";
			} 
			else 
			{
				echo "<script>alert('Something Went Wrong')</script>";
				echo "<script>window.location='ViewSongs.php'</script>";
			}
		}

	?>

    <style>
    #h1 option {
        width: 300px;
    }
    </style>
</head>

<body style="background-color:black">
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Header Start -->
        <?php $page = "UserDetails"; include("Includes/NavMenu.php"); ?>
        <!-- Header End -->

        <!-- Upload Song -->
        <div class="products-catagories-area clearfix" style="position:relative;margin-left:auto">
            <section>
                <div class="container py-3">
                    <div class="card mb-3 bdr">
                        <div class="card-body p-2">
                            <h4 class="m-1"><i class="bi bi-music-note mr-2"></i>Upload New Song</h4>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="card mb-3 bdr">
                                <div class="card-body p-3">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Song Name</label>
                                            <input type="text" class="form-control bdr bg-dark text-white" name="nm"
                                                placeholder="Enter Song Name" required>
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
                                            <label>Audio File</label>
                                            <input type="file" class="form-control bdr bg-dark text-white"
                                                accept="audio/*" name="music" placeholder="Enter Song Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Cover Photo</label>
                                            <input type="file" class="form-control bdr bg-dark text-white"
                                                accept="image/*" name="img" placeholder="Enter Song Name" required>
                                        </div>
                                        <input type="checkbox" class="mt-0 mb-4" required>
                                        <span>I agree to all <a href="TermsConditions.php"
                                                style="font-size:17px;color:skyblue">Terms & Conditions</a></span>
                                        <input type="submit" class="form-control bdr"
                                            style="background-color:royalblue;color:white" name="ok"
                                            value="Upload Song">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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