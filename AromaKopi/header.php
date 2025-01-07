<nav class="navbar navbar-expand-lg shadow p-3 mb-5 bg-body-tertiary rounded sticky-top">
    <div class="container-lg">
        <!-- Navbar Brand -->
        <a class="navbar-brand" href=".">
            AromaKopi
        </a>

        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <!-- Navigasi dropdown AdminUser -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link me-2 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'Home') || !isset($_GET['x'])) ? 'active link-info' : 'link-dark'; ?>"
                        aria-current="page" href="index.php?x=Home"><i class="bi bi-house-door"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'tampilanMenu') ? 'active link-info' : 'link-dark'; ?>"
                        href="index.php?x=tampilanMenu"><i class="bi bi-archive"></i> Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'Gallery') ? 'active link-info' : 'link-dark'; ?>"
                        href="index.php?x=Gallery"><i class="bi bi-journal-album"></i> Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2 <?php echo (isset($_GET['x']) && $_GET['x'] == 'About') ? 'active link-info' : 'link-dark'; ?>"
                        href="index.php?x=About"><i class="bi bi-info-circle"></i></i> About Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>