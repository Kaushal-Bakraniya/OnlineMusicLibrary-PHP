<?php 

    include("Class/Connect.php");

    class Beats
    {
        function select($query)
        {
            $result = mysqli_query($GLOBALS["con"],$query);

            return $result; 
        }
    }

    $beats = new beats();

?>
