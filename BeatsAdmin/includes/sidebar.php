<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark h-100" style="overflow:hidden">
        <a href="index.php" class="navbar-brand mx-2 mb-4">
            <h3 class="text-white"><img src="img/Beats.png" style="width:2.5rem;margin-right:3%"/>Beats Admin</h3>
        </a>
        <div class="navbar-nav w-100 h-100">
            <a href="index.php" class="nav-item <?php echo ($Page== "index"?"active":""); ?> nav-link mb-4"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="ArtistsDetails.php" class="nav-item <?php echo ($Page== "ArtistsDetails"?"active":""); ?> nav-link mb-4"><i class="fa fa-table me-2"></i>Artists</a>
            <a href="UsersDetails.php" class="nav-item <?php echo ($Page== "UsersDetails"?"active":""); ?> nav-link mb-4"><i class="fa fa-table me-2"></i>Users</a>
            <a href="SongsDetails.php" class="nav-item <?php echo ($Page== "SongsDetails"?"active":""); ?> nav-link mb-4"><i class="fa fa-table me-2"></i>Songs</a>
            <a href="AlbumsDetails.php" class="nav-item <?php echo ($Page== "AlbumsDetails"?"active":""); ?> nav-link mb-4"><i class="fa fa-table me-2"></i>Albums</a>
            <a href="UserFeedbacks.php" class="nav-item <?php echo ($Page== "UserFeedbacks"?"active":""); ?> nav-link mb-4"><i class="fa fa-table me-2"></i>Feedbacks</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->