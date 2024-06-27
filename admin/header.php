<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <style>
      .sidebar-brand img{
        width: 50px;
        height:50px;
        border-radius:30px;
      }
      .sidebar-brand a{
        text-decoration:none ;
        color:white;
      }
    </style>
  </head>
  <body>
    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">
          <!-- <span class="material-icons-outlined">search</span> -->
        </div>
        <div class="header-right">
          <span class="material-icons-outlined">notifications</span>
          <span class="material-icons-outlined">email</span>
          <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <a href="../index.php">
              <span class="material-icons-outlined"><img src="../img/logo1.jpg" alt="" ></span> Poly Sneaker
            </a>
            
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>
<!-- header danh mục -->
        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="index.php" >
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listdm" >
              <span class="material-icons-outlined">inventory_2</span> Danh mục
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listsp" >
              <span class="material-icons-outlined">list</span> Sản phẩm
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listdon" >
              <span class="material-icons-outlined">shopping_cart</span> Đơn hàng
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listdongiao" >
              <span class="material-icons-outlined">shopping_cart</span> Đơn Giao
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listdonmua" >
              <span class="material-icons-outlined">shopping_cart</span> Đơn Đã mua
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listsize" >
              <span class="material-icons-outlined">fact_check</span> Size
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listbl" >
              <span class="material-icons-outlined">comment</span> Bình luận
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listuser" >
              <span class="material-icons-outlined">people</span> Tài khoản
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listtkbl" >
              <span class="material-icons-outlined">bar_chart</span> Biểu đồ
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="index.php?act=listnew" >
              <span class="material-icons-outlined">bar_chart</span> Tin tức
            </a>
          </li>
        </ul>
      </aside>
<!-- end -->