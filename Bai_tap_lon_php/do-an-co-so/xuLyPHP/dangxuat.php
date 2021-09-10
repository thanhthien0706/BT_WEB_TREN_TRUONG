<?php

session_start();
session_destroy();

if(isset($_GET['dangXuat'])){
    header("Location: ../xem_tat_ca-Dien-thoai.php");
    die();
}
echo '../../do-an-co-so/dang-nhap-tieng-viet.php';


?>