<?php

require_once "./connection.php";
$errUpdate = array();

if (isset($_POST['valueSoLuong'])){
    changeInf($conn,'soLuong', $_POST['valueSoLuong'], 'idSPThem' , $_POST['IDGiaTri']);
}

if(isset($_POST['checkStatus'])){
    if($_POST['checkStatus']==1){
        changeInf($conn, 'productsStatus', 1 , 'idSPThem' , $_POST['checkID']);
    }else if($_POST['checkStatus']==0){
        changeInf($conn, 'productsStatus', 0, 'idSPThem' , $_POST['checkID']);
    }
}

if(isset($_POST['arrayListProduct'])){
    // print_r($_POST['IDuser']);
    // die;
    changeInf($conn, 'productsConfirm' ,0 , 'userID' , $_POST['IDuser']);
    foreach( json_decode($_POST['arrayListProduct']) as $key => $value){
        changeInf($conn, 'productsConfirm' ,1,'idSPThem',$value);
    }

    $errUpdate['capNhat'] = "Cập nhật thành công";
}

if(isset($_POST['IDuserHuy'])){
    // print_r($_POST['IDuserHuy']);
    // die;
    changeInf($conn, 'productsConfirm' ,0 , 'userID' , $_POST['IDuserHuy']);
    changeInf($conn, 'productsStatus' ,0 , 'userID' , $_POST['IDuserHuy']);
    $errUpdate['huyThanhCong'] = "Hủy thành công";
}

function changeInf($conn, $colChange ,$soLuong, $colDieuKien , $idSPThem){
    $sql = "UPDATE giohang SET $colChange = $soLuong WHERE $colDieuKien=$idSPThem";

    if (!mysqli_query($conn, $sql)) {
        $errUpdate['errUpdate'] = "Lỗi update";
    }
}

die(json_encode($errUpdate));

?>