<?php 
include("../../../config/config.php");

$timkiem = "";
if (isset($_POST['txtTimkiem'])) {
    $timkiem = $_POST['txtTimkiem'];
}

$sql = "SELECT * FROM khach_hang";
if ($timkiem != "") {
    $sql .= " WHERE ten LIKE '%$timkiem%' OR email LIKE '%$timkiem%' OR so_dien_thoai LIKE '%$timkiem%' OR dia_chi LIKE '%$timkiem%'";
}

$result = mysqli_query($conn, $sql);
$num = 1;
if (mysqli_num_rows($result) > 0) {
    echo '<table id="tblMain">
        <thead>
            <th>ID</th>
            <th>Tên KH</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Ngày tạo</th>
            <th>Cập Nhật</th>
        </thead>
    
    <tbody>';
    while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
        <td>' . $row["id"] . '</td>
        <td>' . $row["ten"] . '</td>
        <td>' . $row["email"] . '</td>
        <td>' . $row["so_dien_thoai"] . '</td>
        <td>' . $row["dia_chi"] . '</td>
        <td>' . $row["ngay_tao"] . '</td>
        <td><a href="editkh.php?id=' . $row["id"] . '">Sửa</a> | <a href="delete_customer.php?id=' . $row["id"] . '">Xóa</a></td>
        </tr>';
    }
    echo '</tbody> 
    </table>';
} else {
    echo "Không có dữ liệu khách hàng";
}
?>
