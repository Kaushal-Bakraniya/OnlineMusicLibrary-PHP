<?php
    session_start();
?>
<html>

<head>
    <title>Forgot Password - BeatsMusic</title>
    <link rel="icon" href="img/Beats.png">
    <link rel="stylesheet" href="CSS/LoginPage.css">
    <?php 

    include("class/userclass.php");

    if(isset($_POST["submit"]))
    {
        $user -> forgotPassword($_POST["email"]);
    }

?>
</head>

<body style="background:url('img/bg-img/uploadimg.png');background-size:cover;">
    <form method="post" class="login">
        <h3>Reset Password</h3>
        <label for="username">Enter Your Registered Email</label>
        <input type="email" placeholder="Enter Email Address" name="email" required>
        <input type="submit" value="Submit" class="button" name="submit">
    </form>
</body>

</html>
</body>

</html>