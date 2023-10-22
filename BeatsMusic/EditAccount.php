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

    <title>Edit Profile - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <?php 

        include("Class/Beats.php");
        include("Class/UserClass.php");

        $result = $beats -> select("select * From users where ID='".$_SESSION["ID"]."'");
        
        while($row = mysqli_fetch_array($result))
        {
            $UserName = $row["UserName"];
            $ProfilePicture = $row["ProfilePicture"];
            $Email = $row["Email"];
            $Bio = $row["Bio"];
            $pwd = $row["Password"];
        }

        if(isset($_POST["save"]))
        {
            $fname = $_FILES["ProfilePicture"]["name"];

            if($fname == substr($ProfilePicture,28))
            {
                $filename = $ProfilePicture;    
            }
            else
            {
                $tname = $_FILES["ProfilePicture"]["tmp_name"];

                if(file_exists("UploadsData/ProfilePictures/".$fname))
                {
                    $filename = "UploadsData/ProfilePictures/".time()."_".$fname;
                }
                else
                {
                    $filename = "UploadsData/ProfilePictures/".$fname;
                }

                move_uploaded_file($tname,$filename);

                unlink($ProfilePicture);

            }

            $result = $user -> editUser($_POST["UserName"],$_POST["Email"],$filename,$_POST["AboutUser"],$_POST["Password"],$_SESSION["ID"]);
            
            if($result == true)
            {
                echo "<script>alert('User Details Updated Successfully Please Login Again')</script>";
                echo "<script>window.location='Logout.php'</script>";
            }
            else
            {
                echo "<script>alert('Something Went Wrong')</script>";
                echo "<script>window.location='EditAccount.php'</script>";
            }
        }

    ?>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

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
                            <h4 class="m-1"><i class="bi bi-person-circle mr-3"></i>Edit Profile</h4>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 ">
                            <div class="card mb-3 bdr">
                                <div class="card-body p-3">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" class="form-control bdr"
                                                style="background-color:black;color:white" name="UserName"
                                                value="<?php echo $UserName; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control bdr"
                                                style="background-color:black;color:white" name="Email"
                                                value="<?php echo $Email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>ProfilePicture</label>
                                            <input type="file" accept="image/*" class="form-control bdr"
                                                style="background-color:black;color:white" name="ProfilePicture">
                                        </div>
                                        <div class="form-group">
                                            <label>About User</label>
                                            <textarea class="form-control rounded-0 bdr"
                                                style="background-color:black;color:white" name="AboutUser"
                                                rows="2"><?php echo $Bio; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control bdr"
                                                style="background-color:black;color:white" name="Password"
                                                value="<?php echo $pwd;  ?>">
                                        </div>
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

        const myFile = new File(['File'], '<?php echo $ProfilePicture; ?>');

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
<?php
    }
    else
    {
        echo "<script>window.location='index.php'</script>";
    }
?>