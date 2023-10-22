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

    <title>Feedback - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <?php 

        include("Class/Beats.php");

        $result = $beats -> select("select Email from users where ID='".$_SESSION["ID"]."'");

        while($row = mysqli_fetch_array($result))
        {
            $Email = $row["Email"];
        }

        include("Class/FeedbackClass.php");
        include("Class/MailClass.php");

        if(isset($_POST["send"]))
        {
            $feedback -> addFeedback($Email,$_SESSION["ID"],$_POST["feedback"]);
            
            $mail -> fdbReply($Email,$_SESSION["UserName"]);
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
                        <div class="card-body p-1">
                            <a href="HelpCenter.php">
                                <h5 class="m-2"><i class="bi bi-chat-left-dots mr-3"></i>Give Us Feedback</h5>
                            </a>
                        </div>
                    </div>

                    <p class="mb-3">Let us know how we can improve your experience.</p>

                    <div class="row d-flex justify-content-left">
                        <div class="col-lg-6">
                            <div class="card mb-3 bdr">
                                <div class="card-body p-3">
                                    <form method="post" class="m-0 p-0" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Your Email Address</label>
                                            <input type="email" class="form-control bdr"
                                                style="background-color:black;color:white" name="email"
                                                value="<?php echo $Email; ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <label>Your Feedback</label>
                                            <textarea class="form-control rounded-0 bdr"
                                                style="background-color:black;color:white"
                                                placeholder="Please include a detailed description of your idea or suggestion."
                                                name="feedback" rows="7" required></textarea>
                                        </div>

                                        <input type="submit" class="form-control bdr"
                                            style="background-color:royalblue;color:white" name="send"
                                            value="Send Feedback">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="m-0">Thanks for taking the time to give us feedback.</p>
                    <p>We review ideas and suggestions that people send to us and use them to improve the experience for
                        everyone. </p>

                </div>
        </div>

        </section>

    </div>
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