<?php 
    session_start(); 

    if($_SESSION["Type"] == "Artist")
    {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>View Songs - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


    <?php 
        include("Class/Beats.php");
    ?>

    <style>
    table {
        width: 100%;
    }
    </style>

</head>

<body>
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Songs SideBar -->
        <?php $page = "UserDetails"; include("Includes/NavMenu.php"); ?>
        <!-- End SongsSideBar -->

        <div class="products-catagories-area clearfix content">

            <section class="bdr mb-3 mt-3 p-2">
                <div>
                    <h4 class="mb-1 ml-1"><i class="bi bi-music-note mr-3"></i>View Your Songs
                    </h4>
                </div>
            </section>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Song Name</th>
                    <th>Album Name</th>
                    <th>Play</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php 
                $result = $beats -> select("select * from songsinfo where ArtistID='".$_SESSION["ID"]."' ORDER BY ID DESC");
            
                while($row = mysqli_fetch_array($result))
                {
            ?>
                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["SongName"]; ?></td>
                    <td><?php echo $row["AlbumName"]; ?></td>
                    <td><a href="PlaySong.php?ID=<?php echo $row["ID"]; ?>" target="blank"><img
                                src="<?php echo $row["CoverPath"]; ?>" style="width:50px;50px;"></a></td>
                    <td><a href="EditSong.php?ID=<?php echo $row["ID"]; ?>">Edit</a></td>
                    <td><a href="DeleteSong.php?ID=<?php echo $row["ID"]; ?>">Delete</a></button></td>
                </tr>
                <?php
                }
            ?>
            </table>
        </div>
        <!-- End Discover Hits -->

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