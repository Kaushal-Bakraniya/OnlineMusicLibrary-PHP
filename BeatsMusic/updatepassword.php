<?php
    session_start();
    
    if($_SESSION["tmail"]!=null)
    {
?>
<html>

<head>
    <title>Forgot Password - BeatsMusic</title>
    <link rel="stylesheet" href="CSS/LoginPage.css">
    <?php 

    include("class/userclass.php");

    if(isset($_POST["submit"]))
    {
        if($_POST["pwd"] != $_POST["confpwd"])
        {
            echo "<script>alert('Password & Confirm Password Doesnt Match')</script>";
        }
        else
        {
            $user -> updatePassword($_POST["pwd"],$_SESSION["tmail"]);
        }
    }

?>
</head>

<body style="background:url('img/bg-img/uploadimg.png');background-size:cover;">
    <form method="post" class="login">
        <h3><b>Set New Password</b></h3>
        <label>Enter new passowrd</label>
        <input type="password" placeholder="Enter new password" name="pwd" required>
        <label>Confirm passowrd</label>
        <input type="password" placeholder="Enter password again" name="confpwd" required>
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