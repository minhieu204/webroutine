<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <title>Cập Nhật Khách Hàng</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="../admin/main.php" class="header__list-items"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php" class="header__list-items" id="main"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../kho/kho.php" class="header__list-items"><b>Kho</b></a>
                <a href="../thongke/thongke.php" class="header__list-items"><b>Thống Kê</b></a>
            </div>
            <div class="header__list2">
                <form method="POST">
                    <input type="text" name="txtTimkiem" placeholder="Tìm kiếm...." class="search">
                </form>
                <a href="" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Cập Nhật Thông Tin Khách Hàng</h1>
            </div>
            <?php 
            include("../../../config/config.php");
            $id = $_GET['id'];
            $ten = "";
            $email = "";
            $so_dien_thoai = "";
            $dia_chi = "";
            $ngay_tao = "";
            if (!$conn){
                echo 'Kết nối không thành công: ' . mysqli_connect_error();
            }
            else{
                $sql = "SELECT * FROM khach_hang WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $ten = $row["ten"];
                        $email = $row["email"];
                        $so_dien_thoai = $row["so_dien_thoai"];
                        $dia_chi = $row["dia_chi"];
                        $ngay_tao = $row["ngay_tao"];
                    }
                }
            }
            ?>

            <form method="POST">
                <table class="tlb-info">
                    <div class="user-info">
                        <tbody>
                            <tr>
                                <td class="info-name"><label for="id">ID</label></td>
                                <td><input type="text" class="info-name-property" id="id" name="id" value="<?php echo $id; ?>" readonly /></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="ten">Tên</label></td>
                                <td><input type="text" class="info-name-property" id="ten" name="ten" value="<?php echo $ten; ?>" required /></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="email">Email</label></td>
                                <td><input type="email" class="info-name-property" id="email" name="email" value="<?php echo $email; ?>" required /></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="so_dien_thoai">Số điện thoại</label></td>
                                <td><input type="text" class="info-name-property" id="so_dien_thoai" name="so_dien_thoai" value="<?php echo $so_dien_thoai; ?>" /></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="dia_chi">Địa chỉ</label></td>
                                <td><textarea class="info-name-property" id="dia_chi" name="dia_chi"><?php echo $dia_chi; ?></textarea></td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="ngay_tao">Ngày tạo</label></td>
                                <td><input type="date" class="info-name-property" id="ngay_tao" name="ngay_tao" value="<?php echo $ngay_tao; ?>" required /></td>
                            </tr>
                        </tbody>
                    </div>
                </table>
                <div class="tlb-add"><input type="submit" value="Cập nhật khách hàng" class="btn-add" name="txtCapNhat" /></div>
            </form>
        </div>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ten = $_POST['ten'];
        $email = $_POST['email'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];
        $ngay_tao = $_POST['ngay_tao'];

        if (!$conn) {
            echo 'Kết nối không thành công: ' . mysqli_connect_error();
        } else {
            $sql = "UPDATE khach_hang SET ten='$ten', email='$email', so_dien_thoai='$so_dien_thoai', dia_chi='$dia_chi', ngay_tao='$ngay_tao' WHERE id='$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script>
                        alert('Cập nhật khách hàng thành công');
                        window.location.href='khachhang.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Lỗi cập nhật khách hàng');
                        window.location.href='khachhang.php';
                      </script>";
            }
        }
    }
    ?>
</body>

</html>
