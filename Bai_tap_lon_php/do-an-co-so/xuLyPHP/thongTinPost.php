<?php

require_once "./connection.php";

if(isset($_POST['categories'])){

    $error = array();
    $arrayPruducts = array();

    $sql = "SELECT * FROM `products` WHERE `categoriesID` =".$_POST['categories'] ;
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	  while($row = mysqli_fetch_assoc($result)) {
		  $arrayPruducts[] = $row;
	  }
	} else {
        $error['notValue'] = 'Không tìm thấy';
        echo json_encode($error);
	}

    echo json_encode($arrayPruducts);

}

if(isset($_POST['product_id']) && isset($_POST['category_id'])  ) {

    $error = array();

    $sql = "DELETE FROM products WHERE productID=". $_POST['product_id'];

    if (mysqli_query($conn, $sql)) {
        $error['notErr'] = $_POST['product_id'] ;
    }else{
        $error['Err'] = "Error deleting record: " . mysqli_error($conn);
    }

    $jsonErr = json_encode($error);

    echo $jsonErr;

}

if(isset($_POST['category_ID'])){
    $error = array();

    $sql = "DELETE FROM categories WHERE categoriesID=". $_POST['category_ID'];

    if (mysqli_query($conn, $sql)) {
        $error['notErr'] = $_POST['category_ID'] ;
    }else{
        $error['Err'] = "Error deleting record: " . mysqli_error($conn);
    }

    $jsonErr = json_encode($error);

    echo $jsonErr;
}

if(isset($_POST['name'])){
    $error = array();

    $sql = "INSERT INTO categories (categoriesName)
    VALUES ('". $_POST['name'] ."')";

    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT categoriesID FROM categories WHERE categoriesName = '".$_POST['name']."'" ;
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $error['notErr']= $row;
            $error['categoriesName']= $_POST['name'];
        }

    }else{
        $error['Err'] = "Error deleting record: " . mysqli_error($conn);
    }

    $jsonErr = json_encode($error);

    echo $jsonErr;
}

?>