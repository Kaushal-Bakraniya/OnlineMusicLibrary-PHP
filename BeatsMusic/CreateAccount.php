<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - BeatsMusic</title>
    <link rel="icon" href="img/Beats.png">
    <link rel="stylesheet" href="CSS/LoginPage.css">
    <style>
    option {
        color: black;
    }

    table {
        width: 100%;
    }

    table * {
        margin: 0;
        padding: 0;
    }
    </style>
    <?php 

    include("Class/UserClass.php");

    if(isset($_POST["CreateAccount"]))
    {
        if($_POST["password"] == $_POST["confPassword"])
        {
            $fname = $_FILES["profilepicture"]["name"];
            $tname = $_FILES["profilepicture"]["tmp_name"];

            if(file_exists("UploadsData/ProfilePictures/".$fname))
            {
                $filename = "UploadsData/ProfilePictures/".time()."_".$fname;
            }
            else
            {
                $filename = "UploadsData/ProfilePictures/".$fname;
            }
            
            move_uploaded_file($tname,$filename);

            $user -> insert($_POST["UserName"],$_POST["Email"],$_POST["gen"],$_POST["Type"],$filename,$_POST["bio"],$_POST["password"]);
        }
        else
        {
            echo "<script>alert('Passwords Doenst Match')</script>";
        }
        
    }

?>
</head>

<body style="background:url('img/bg-img/uploadimg.png');background-size:cover;">
    <br>
    <form method="post" class="signup" enctype="multipart/form-data">
        <h3><b>Create Account</b></h3>
        <label>Name</label>
        <input type="text" placeholder="Enter Your Name" name="UserName" required>
        <label>Email</label>
        <input type="email" placeholder="Enter Email Address" name="Email" required>
        <label>Gender</label>
        <select name="gen" class="select">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <label>Account Type</label>
        <select name="Type" name="Type" class="select">
            <option value="Basic User">User Account</option>
            <option value="Artist">Artist Account</option>
        </select>
        <label>Profile Picture</label>
        <input type="file" style="padding-top:4%;" name="profilepicture" required>
        <label>Bio</label>
        <textarea placeholder="Write Something About You (Optional)" class="select" name="bio"
            style="width:100%;height:8vi;padding:1vi"></textarea>
        <label>Password</label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <label>Confirm Password</label>
        <input type="password" placeholder="Confirm Password" name="confPassword" required>
        <table>
            <tr>
                <td>
                    <input type="checkbox" name="chk" style="width:80%" required>
                </td>
                <td>
                    I agree to all <a href="TermsConditions.php" style="font-size:17px;color:skyblue">Terms &
                        Conditions</a>
                </td>
            </tr>
        </table>
        <input type="submit" value="Create Account" class="button" style="margin-top:1%" name="CreateAccount">
        <p>Already a memeber ? <a href="Login.php">LogIn</a></p>
    </form>
    <br>
</body>

</html>
</body>

</html>