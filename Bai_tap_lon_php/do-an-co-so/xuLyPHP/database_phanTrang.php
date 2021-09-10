<?php

require_once "./connection.php";

// if(isset($_GET["phanTrang"])){

//     get_all_products($conn, $_GET["phanTrang"]);

// }

if(isset($_POST["categories_phanTrang"])){
  get_all_products($conn, $_POST["categories_phanTrang"]);
}

if(isset($_GET["ID_page"])){
  get_all_products_pargi($conn, $_GET["categories_ID"],$_GET["ID_page"] );
}

if(isset($_POST["CategoryID"])){
  get_all_products($conn, $_POST["CategoryID"]);
}


function get_all_products($conn, $category_id){
    
    $error = array();
    $arrayData = array();
    $size_page = 0;
    $limit = 5;

    $sql = "select * from products  where	categoriesID = '$category_id';";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $error[] = $row;
      }

    } else {
        $error['Err'] = "Lỗi rồi";
    }
    die( json_encode($error) );
}



function get_all_products_pargi($conn, $category_id , $ID_page){
    
  $error = array();
  $arrayData = array();

  $sql = "select * from products  where	categoriesID = '$category_id';";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $arrayData[] = $row;
    }
    $error['Data'] = $arrayData;
    $error['ID_page'] = $ID_page;
    
  } else {
      $error['Err'] = "Lỗi rồi";
  }
  die( json_encode($error) );
}


?>