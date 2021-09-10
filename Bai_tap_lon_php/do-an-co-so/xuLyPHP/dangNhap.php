<?php

session_start();

require_once './connection.php';

if(isset($_POST['email']) && $_POST['pass']){
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);

    $arrayPermission = array();
    $error = array();

    if(isset($_POST['option'])){
        setcookie( 'username', $email ,time() + (86400 * 30), "/");
        setcookie( 'pass', $_POST['pass'],time() + (86400 * 30), "/");
    }

    $sql = "SELECT * FROM user WHERE Email = '$email' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
    
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login'] = $row;  
        $check = 1;
        if($_SESSION['login']['permission'] == 1){
            $arrayPermission['addmin'] = '../Admin-dacs/DoAnCoSo1/admin.php';
        }elseif($_SESSION['login']['permission'] == 0){
            $arrayPermission['notAddmin'] = './xem_tat_ca-Dien-thoai.php';
        } 
    }else{
        $error['khongTonTai'] = 'Tài khoản hoặc mật khẩu không tồn tại';
        echo json_encode($error);
        die;
    }

    
    
    $jsonCode = json_encode($arrayPermission);
    echo $jsonCode;

    // print_r($_POST);

}



?>