<?php

require_once "./connection.php";

$error = array();

if(isset($_POST['Code'])){
    if(isset($_FILES['file']['name'])){

        if($_FILES['file']['type'] == "image/jpeg" || 
        $_FILES['file']['type'] == "image/png" || 
        $_FILES['file']['type'] == "image/gif"){
            
            // up load ảnh
            $path = "../assect/img/file_img_server/";
            $tmpImg = $_FILES['file']['tmp_name'];
            $nameFile = $_FILES['file']['name'];

            // upLoad ảnh vào thư mục
            move_uploaded_file($tmpImg, $path.$nameFile);

            $img_url = $nameFile;

            // các biến còn lại
            $category_id = $_POST['Category'];
            $product_Code = $_POST['Code'];
            $product_Name = $_POST['name'];
            $list_Price = $_POST['Price'];

            $sql = "INSERT INTO `products` (`productID`, `categoriesID`, `productsCode`, `productsName`, `productsPrice`, `image`) VALUES (NULL, '$category_id', '$product_Code', '$product_Name', '$list_Price', '$img_url');";
            // mysqli_query($conn, $sql);
            if(mysqli_query($conn, $sql)){
                $sql = "SELECT productID FROM products WHERE productsCode = '".$product_Code."'" ;
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $error['notErr']= $row;
                    $error['nameImg']= $img_url;
                    $error['categoriesName']= $_POST['name'];
                }

            }else{
                $error['Err'] = "Error deleting record: " . mysqli_error($conn);
            }
        }
    }

    $jsonErr = json_encode($error);

    echo $jsonErr;
}

?>