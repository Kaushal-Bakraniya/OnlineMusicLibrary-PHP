<?php
    session_start();
?>
<html>

<head>
    <title>Login - BeatsMusic</title>
    <link rel="icon" href="img/Beats.png">
    <link rel="stylesheet" href="CSS/LoginPage.css">
    <?php 

    include("Class/UserClass.php");

    if(isset($_POST["LogIn"]))
    {
        $user -> logIn($_POST["email"],$_POST["password"]);
        
        if(!empty($_POST["chk"]))
		{
			setcookie("user",$_POST["email"],time()+(10*365*24*60*60));
			setcookie("pwd",$_POST["password"],time()+(10*365*24*60*60));
		}
		else
		{
			if(isset($_COOKIE["user"]) || isset($_COOKIE["pwd"]))
			{
				setcookie("user","");
                unset($_COOKIE["user"]);

                setcookie("pwd","");
                unset($_COOKIE["pwd"]);
			}
		}
    }

?>
    <style>
    body {
        background: url("img/bg-img/uploadimg.png");
        background-size: cover;
    }

    table {
        width: 100%;
    }

    table * {
        margin: 0;
        padding: 0;
    }
    </style>
</head>

<body>
    <form method="post" class="login">
        <h3><b>BeatsMusic - Login</b></h3>
        <label for="username">Email</label>
        <input type="email" placeholder="Enter Email Address" name="email" value="<?php
			if(isset($_COOKIE["user"]))
			{
				echo $_COOKIE["user"];
			}
        ?>" required>
        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password" value="<?php 
		    if(isset($_COOKIE["pwd"]))
		    {
			    echo $_COOKIE["pwd"];
		    }
		?>" required>
        <table>
            <tr>
                <td>
                    <input type="checkbox" name="chk" style="width:50%" <?php if(isset($_COOKIE["user"])){ ?> checked
                        <?php } ?>>
                </td>
                <td>
                    <span style="color:white">Remember Me</span>
                </td>
            </tr>
        </table>
        <input type="submit" value="Log In" style="margin-top:0" class="button" name="LogIn">
        <p>Dont have an account ? <a href="CreateAccount.php">SignUp</a></p>
        <p style="margin-top:1rem">Forgot your password ? <a href="ForgotPassword.php">Click Here</a></p>
    </form>
</body>

</html>
</body>

</html>