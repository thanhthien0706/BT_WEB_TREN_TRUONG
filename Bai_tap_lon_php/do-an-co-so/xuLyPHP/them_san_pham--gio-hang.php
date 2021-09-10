<?php

session_start();
require_once "./connection.php";
$error = array();

if(isset($_GET["IDproduct"])){
    $sql = "SELECT *  FROM giohang WHERE userID=".$_GET["UserID"]." AND productID=".$_GET["IDproduct"];
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        $sql = "UPDATE giohang SET soLuong= ".($row['soLuong']+1)." WHERE userID=".$_GET["UserID"]." AND productID=".$_GET["IDproduct"];

        if (mysqli_query($conn, $sql)) {
            $error['noError'] = "Đã vào giỏ hàng";
        } else {
            $error['error'] = "Thêm thất bại";
        }
    } else {
        $sql = "INSERT INTO giohang (userID, productID, soLuong)
        VALUES ('".$_GET["UserID"]."', '".$_GET["IDproduct"]."', 1)";

        if (mysqli_query($conn, $sql)) {
            $error['noError'] = "Đã vào giỏ hàng";
        } else {
            $error['error'] = "Thêm thất bại";
        }
    }
    
}

die($json = json_encode($error));
?>