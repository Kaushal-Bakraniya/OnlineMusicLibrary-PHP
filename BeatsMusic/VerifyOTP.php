<?php
    session_start();

    if($_SESSION["tempmail"] != null)
    {
?>
<html>

<head>
    <title>Verify OTP - BeatsMusic</title>
    <link rel="stylesheet" href="CSS/LoginPage.css">
    <?php 

    include("class/userclass.php");

    if(isset($_POST["submit"]))
    {
        $user -> verifyOTP($_POST["otp"],$_SESSION["tempmail"]);
        
        unset($_SESSION["tempmail"]);
    }

?>
</head>

<body style="background:url('img/bg-img/uploadimg.png');background-size:cover;">
    <form method="post" class="login">
        <h3><b>Verify OTP</b></h3>
        <label>Enter Your 5 Digit OTP</label>
        <input type="number" placeholder="Enter 5 Digit OTP" name="otp" required>
        <input type="submit" value="Submit" class="button" name="submit">
    </form>
</body>

</html>
</body>

</html>
<?php 
    }
    else
    {
        echo "<script>window.location='index.php'</script>";
    }
?>