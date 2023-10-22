<?php

    session_start();

    if(session_destroy())
    {
        echo "<script>alert('Logout')</script>";
        echo "<script>window.location='LoginPage.php'</script>";
    }

?>