  <?php
session_start();
if (empty($_SESSION['username_admin'])) {
    header('Location: loginAdmin.php');
    exit();
}

  if (isset($_GET['x']) && $_GET['x'] == 'Home') {
    $page = "home.php";
    require "main.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'tampilanMenu') {
    $page = "tampilanMenu.php";
    require "main.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'Gallery') {
    $page = "Gallery.php";
    require "main.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'About') {
    $page = "about.php";
    require "main.php";
  } elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    require "loginAdmin.php";
 } elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    require "proses/proses_logout.php";
  } else {
    $page = "home.php";
    require "main.php";
  }
  ?>

  <!--
  if (isset($_GET['x']) && $_GET['x'] == 'Home') {
    $page = "home.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'Menu') {
    $page = "menu.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'Gallery') {
    $page = "Gallery.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'About') {
    $page = "about.php";
} elseif (isset($_GET['x']) && $_GET['x'] == 'login') {
    require "loginAdmin.php";
    exit;
} elseif (isset($_GET['x']) && $_GET['x'] == 'logout') {
    require "proses/proses_logout.php";
    exit;
} else {
    $page = "home.php";
}

require "main.php";-->


