<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../../asset/css/table.css">
    <title>Tài Khoản</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="../admin/main.php" class="header__list-items"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php" class="header__list-items" id="main"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../kho/kho.php" class="header__list-items"><b>Kho</b></a>
                <a href="../thongke/thongke.php" class="header__list-items"><b>Thống Kê</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="" class="logout" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Quản lý tài khoản</h1>
            </div>
            <div class="tablesql"><?php 
            include("xuly.php");
            ?>
            </div>
            <div class="createacc"><a href="createacc.php">Thêm tài khoản <i class="ti-user"></i></a></div>
        </div> 