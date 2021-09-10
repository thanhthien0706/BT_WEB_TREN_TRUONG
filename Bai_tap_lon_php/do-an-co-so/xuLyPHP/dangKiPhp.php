<?php

require_once "./connection.php";

$error = array();
$information = array();

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
// $recatpcha = $_POST['recatpcha'];

function checkEmailTonTai($conn , $email){
    
    $sql = "SELECT COUNT(Email) as emailTonTai FROM user WHERE Email= '". addslashes($email)."';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      if($row = mysqli_fetch_assoc($result)) {
         return $row['emailTonTai'];
      }
    }
}

function addUser($conn, $name , $email, $pass){
    
    $check = false;
    $passMaHoa = md5($pass);

    $sql = "INSERT INTO user (userName, Email, password)
    VALUES ('$name' , '$email' , '$passMaHoa');";

    if (mysqli_multi_query($conn, $sql)) {
      $check = true;
    } //else {
    // //   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    // }

    return $check;
}


if(isset($_POST['name'])){

    if(isset($_POST['recatpcha'])){
        $secret = '6LfiNCkcAAAAAHEwoWtIYDfkxjuwZJYNehlbfHBf';

        $verifyResponse = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['recatpcha'] );
        $responseData   = json_decode( $verifyResponse );
        if($responseData->success){

            if(checkEmailTonTai($conn , $email) >0 ){
                $error['EmailTonTai'] = $email.' đã tồn tại';
            }else{
                if(!addUser($conn,$name, $email, $pass)){
                    $error['addKhongThanhCong'] = 'Đăng kí thất bại';
                }else{
                    $error['addThanhCong'] = 'thành công';
                }
            }

        }else{
            $error['recaptchaChuaNhap'] = 'Hãy xác nhận reCaptcha';
        }
    }

}

$errorJson = json_encode( $error );
echo $errorJson;

?>