<?php 
    session_start(); 

    if(!$_SESSION["Type"] == "Artist")
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

    <title>Add Album - BeatsMusic</title>
    <link rel="icon" href="img/core-img/favicon.ico">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <?php 

	    include("Class/albumclass.php");

	    if(isset($_POST["ok"]))
	    {
		    $f1name = $_FILES["AlbumCover"]["name"];
			
		    $f1tname = $_FILES["AlbumCover"]["tmp_name"];
			
		    if(file_exists("UploadsData/AlbumCover/".$f1name))
		    {
			    $folder1 = "UploadsData/AlbumCover/".time()."_".$f1name;
				
			    move_uploaded_file($f1tname,$folder1);
		    }
		    else
		    {
			    $folder1 = "UploadsData/AlbumCover/".$f1name;
				
			    move_uploaded_file($f1tname,$folder1);
		    }

		    $result = $album -> insAlbum($_POST["AlbumName"],$folder1,$_SESSION["ID"],$_SESSION["UserName"]);

		    if($result == true)
		    {
			    echo "<script>alert('Album Created Succesfully')</script>";
			    echo "<script>window.location='ViewAlbums.php'</script>";
		    }
	    }

    ?>
</head>

<body>
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
                            <h4 class="m-1"><i class="bi bi-music-note-list mr-3"></i>Create New Album</h4>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 ">
                            <div class="card mb-3 bdr">
                                <div class="card-body p-3">
                                    <form method="post" id="h1" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Album Name</label>
                                            <input type="text" class="form-control bdr"
                                                style="background-color:black;color:white" name="AlbumName"
                                                placeholder="Enter Album Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Album Cover Photo</label>
                                            <input type="file" class="form-control bdr"
                                                style="background-color:black;color:white" accept="image/*"
                                                name="AlbumCover" placeholder="Enter Song Name" required>
                                        </div>
                                        <input type="checkbox" class="mt-0 mb-4" required>
                                        <span>I agree to all <a href="TermsConditions.php"
                                                style="font-size:17px;color:skyblue">Terms & Conditions</a></span>
                                        <input type="submit" class="form-control bdr"
                                            style="background-color:royalblue;color:white" name="ok"
                                            value="Create New Album">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
    </div>

    </div>

    <!-- Scripts -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/active.js"></script>

</body>

</html>