<?php
    session_start();
?>
<html>
<head>
<title>Login - BeatsAdmin</title>
<link rel="icon" href="img/Beats.png">
<link rel="stylesheet" href="CSS/LoginPage.css">
<?php 

    include("Class/AdminClass.php");

    if(isset($_POST["LogIn"]))
    {
        $admin -> logIn($_POST["unm"],$_POST["password"]);
    }

?>
</head>
<body style="background:url('img/bg.png');background-size:cover;">
    <form method="post" class="login">
        <h3>Beats Admin</h3>
        <label for="username">Username</label>
        <input type="text" placeholder="Enter Username" name="unm" required>
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <input type="submit" value="Log In" class="button" name="LogIn">
    </form>
</body>
</html>
</body>
</html>
