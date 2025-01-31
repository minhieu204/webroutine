<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../asset/css/admin.css" />
    <link rel="stylesheet" href="../../../asset/css/themify-icons-font/themify-icons/themify-icons.css">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header__list">
                <a href="#" class="header__list-items" id="main"><b>Tổng quan</b></a>
                <a href="../khachhang/khachhang.php" class="header__list-items"><b>Khách hàng</b></a>
                <a href="../taikhoan/taikhoan.php" class="header__list-items"><b>Tài khoản</b></a>
                <a href="../sanpham/sanpham.php" class="header__list-items"><b>Sản phẩm</b></a>
                <a href="../kho/kho.php" class="header__list-items"><b>Kho</b></a>
                <a href="../thongke/thongke.php" class="header__list-items"><b>Thống Kê</b></a>
            </div>
            <div class="header__list2">
                <a href="" class="logout" class="logout">Đăng xuất</a>
            </div>
        </div>
        <div class="body">
            <div class="body-header">
                <h1>Tạo tài khoản</h1>
            </div>
            <form method="POST">
                <table class="tlb-info">
                    <div class="user-info">
                        <tbody>
                            <tr>
                                <td class="info-name"><label for="Name">Tên</label></td>
                                <td>
                                    <input type="text" class="info-name-property" id="Name" name="txtName" required/>
                                </td>
                            </tr>
                            <tr>
                                <td class="info-name"><label for="Email">Email</label></td>
                                <td>
                                    <input type="email" class="info-name-property" id="Email" name="txtEmail"
                                         required />
                                </td>
                            </tr>
                            <tr>
                                <td class="info-name">
                                    <label for="Password">Mật khẩu</label>
                                </td>
                                <td>
                                    <input type="password" class="info-name-property" id="Password" name="Password"
                                    required  />
                                </td>
                            </tr>
                            <tr>
                                <td class="info-name">
                                    <label for="Password2">Nhập lại mật khẩu</label>
                                </td>
                                <td>
                                    <input type="password" class="info-name-property" id="Password2" name="Password2"
                                    required  />
                                </td>
                            </tr>
                            <tr>
                                <td class="info-name">
                                    <label for="Permission">Quyền hạn</label>
                                </td>
                                <td>
                                    <select name="Permission" id="Permission" class="info-name-property">
                                     <option value="Customer">Khách Hàng</option>
                                    <option value="Admin">Admin</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                </table>
        </div>
        <div class="tlb-add"><input type="submit" value="Thêm tài khoản" class="btn-add" colspan="2" name="txtSua" /></div>
        </form>
    </div>
    </div>
    <?php
include("../../../config/config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
$Fullname =$_POST['txtName'];
$Email =$_POST['txtEmail'];
$Password =md5($_POST['Password']);
$Password2=md5($_POST['Password2']);
$Permission=$_POST['Permission'];
if ($Password == $Password2) {
$query="INSERT INTO user VALUES('','".$Fullname."','".$Password."','".$Email."','".$Permission."','')";
$result = mysqli_query($conn, $query);
if ($result>0) {
    echo"<script>
            alert('Cập nhật dữ liệu thành công');
            window.location.href='taikhoan.php';
        </script>";
    }
        else {
            echo"<script>
            alert('Lỗi Cập nhật dữ liệu ');
            window.location.href='taikhoan.php';
        </script>";
        }

}
else {
    echo "<script>
            alert('Nhập lại mật khẩu chưa chính xác!!');
        </script>";
}
}
?>
</body>

</html>