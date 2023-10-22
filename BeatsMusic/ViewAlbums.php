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

    <title>View Albums - BeatsMusic</title>

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
                    <h4 class="mb-1 ml-2"><i class="bi bi-music-note-list mr-3"></i>View Your Albums</h4>
                </div>
            </section>


            <table id="myTbl">
                <tr>
                    <th>ID</th>
                    <th>Album Name</th>
                    <th>Album Cover</th>
                    <th>View Album</th>
                    <th>Delete</th>
                </tr>
                <?php 
                $result = $beats -> select("select * from albumsinfo where ArtistID='".$_SESSION["ID"]."' ORDER BY AlbumID DESC");
            
                while($row = mysqli_fetch_array($result))
                {
            ?>
                <tr>
                    <td><?php echo $row["AlbumID"]; ?></td>
                    <td><?php echo $row["AlbumName"]; ?></td>
                    <td><a href="<?php echo $row["AlbumCover"]; ?>"><img src="<?php echo $row["AlbumCover"]; ?>"
                                style="width:60px;"></a></td>
                    <td><a
                            href="AlbumDetails.php?AID=<?php echo $row["AlbumID"]; ?>&ANM=<?php echo $row["AlbumName"]; ?>">View
                            Album</a></td>
                    <td><a href="DeleteAlbum.php?ID=<?php echo $row["AlbumID"]; ?>">Delete</a></td>
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
    <script src="js/searchTable.js"></script>
</body>

</html>
<?php 
	}
	else
	{
		echo "<script>window.location='index.php'</script>";
	}
?>