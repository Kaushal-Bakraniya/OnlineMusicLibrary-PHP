<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Your Album Info - BeatsMusic</title>

    <link rel="icon" href="img/Beats.png">

    <link rel="stylesheet" href="css/core-styles.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <?php 

        include("Class/beats.php");
        
        $result = $beats -> select("Select ArtistName,AlbumName From albumsinfo where AlbumID='".$_REQUEST["AID"]."'");
    
        while($row = mysqli_fetch_array($result))
        {
            $ArtistName = $row["ArtistName"];
            $AlbumName = $row["AlbumName"];
        }
        
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
        <?php include("Includes/NavMenu.php"); ?>
        <!-- End SongsSideBar -->

        <div class="products-catagories-area clearfix content" style="padding-left:2rem">

            <section class="bdr mb-3 mt-3 p-2">
                <div>
                    <h4 class="mb-0"><i class="bi bi-music-note-list mr-3 ml-2"></i><?php echo $AlbumName; ?> - Album
                        Details</h4>
                </div>
            </section>

            <table class="mb-3">
                <tr>
                    <th><a href="AddSong.php?AID=<?php echo $_REQUEST["AID"]; ?>&ANM=<?php echo $AlbumName; ?>">Add New
                            Song</a></th>
                    <th><a href="EditAlbum.php?AID=<?php echo $_REQUEST["AID"]; ?>">Edit Album</a></th>
                </tr>
            </table>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Song Name</th>
                    <th>Play</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>

                <?php     

                $result = $beats -> select("Select * From songsinfo Where AlbumID='".$_REQUEST["AID"]."'");
                
                while($row = mysqli_fetch_array($result))
                {
            ?>

                <tr>
                    <td><?php echo $row["ID"]; ?></td>
                    <td><?php echo $row["SongName"]; ?></td>
                    <td><a href="<?php echo $row["FilePath"]; ?>"><img src="<?php echo $row["CoverPath"]; ?>"
                                style="width:50px;"></a></td>
                    <td><a
                            href="EditSong.php?ID=<?php echo $row["ID"]; ?>&ANM=<?php echo $row["AlbumName"]; ?>">Edit</a>
                    </td>
                    <td><a href="DeleteSong.php?ID=<?php echo $row["ID"]; ?>">Delete</a></td>
                </tr>

                <?php 
                }
            ?>
            </table>
        </div>
        <!-- End Album Songs -->

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