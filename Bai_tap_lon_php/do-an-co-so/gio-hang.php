<?php

session_start();
require_once "./xuLyPHP/connection.php";
$arrayProductsGioHang = array();
$tienTamTinh= 0;
$tienGiamGia = 0;
$tongTien = 0;
$tienDatCoc = 0;
$tienSPGiamGia = 0;

if(isset($_SESSION['login'])){
    $userName = $_SESSION['login']['userName'];
    $sql = "SELECT * FROM giohang WHERE userID=".$_SESSION['login']['userID'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $arrayProductsGioHang[] = $row;
      }
    } else {
      echo "0 results";
}
}
$checkstatus = false;
$arrayConfirm = array();

foreach($arrayProductsGioHang as $key => $value){

    // if($value['productsStatus']==1)

    // $arrayinf = array();
    $sql = "SELECT * FROM products WHERE productID=".$value['productID'];
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $row['soluong'] = $value['soLuong'];
        $row['idSPThem'] = $value['idSPThem'];
        $row['checkStatus'] = $value['productsStatus'];

        $arrayConfirm['productsConfirmID'] = $value['idSPThem'];
        if($value['productsConfirm'] == 1){
            $arrayConfirm["productsConfirmCheck"] = $value['productsConfirm'];
        }
    } else {
      echo "0 results";
    }
    $_SESSION['productsConfirm'] = $arrayConfirm ;
    $_SESSION['products']['productsID'.$row['productID']] = $row;
}
// die;

// echo "<pre>";
// print_r($_SESSION);
// die;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assect/icon/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./assect/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assect/css/css-gio-hang.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <div id="main">
        <div id="header">

            <!-- tạo nav -->

            <div id="main-nav" class="nav-chinh">
                <div class="container nav-can-len">
                    <div class="hien-thi khoang-cach-cac-phan">
                        <ul class="hien-thi-menu">
                            <li class="hien-thi-li">
                                <i class="ti-menu item-menu" onclick="openNav()"></i>

                            </li>
                            <li class="hien-thi-li repon-mobile">
                                <p class="logo-text">
                                    <img class="logo" src="./assect/img/logo-removebg-preview (1).png" alt="">
                                    thegioiso.com
                                </p>
                            </li>
                        </ul>
                    </div>
        
                    <div class="thanh-search khoang-cach-cac-phan">
                        <input class="input-search" type="text" placeholder="Tìm kiến">
                        <!-- <button class="btn-tim">
                            <i class="ti-search"></i>
                        </button> -->
                    </div>
        
                    <div class="item-icon khoang-cach-cac-phan">
                        <ul class="item-icon-ul">
                            <li class="item-icon-li">
                                <i class="ti-shopping-cart" onclick="<?php 
                                echo isset($_SESSION['login']) ? "window.location.href='./gio-hang.php'" : "alert('Bạn chưa đăng nhập');"         
                                ?>"></i>
                            </li>
                            <li class="item-icon-li item-account">
                                <i class="ti-user"></i>

                                <div id="iteam__nav" class="nav_mobile">
                                    <div class="item">
                                        <a href="<?php echo isset($userName) ?  "#" : "./dang-ki-bwd-tieng-viet.html";?>"><?php echo isset($userName) ?  $userName : "Đăng Kí"  ;?></a>
                                    </div>
        
                                    <div class="item">
                                        <a href="<?php echo isset($userName) ?  "./xuLyPHP/dangxuat.php?dangXuat=''" : "./dang-nhap-tieng-viet.php";?>"><?php echo isset($userName) ?  "Đăng xuất" : "Đăng Nhập"  ;?></a>
                                    </div>
        
                                    <!-- <div class="item">
                                        <a href="#">Cộng Đồng</a>
                                    </div> -->
        
                                </div>
                            </li>
                        </ul>
                    </div>
        
                </div>
            </div>
        
            <!-- tạo nav -->
        
        
            <!-- tao phan hiển thị -->
        
            <div id="mySidepanel" class="sidepanel" >
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <a href="./index.html">Trang Chủ</a>
                <a href="./mua-hang.html">Cửa hàng</a>
                <a href="./Ban-hang.html">Mua bán</a>
                <a href="./blog.html">Blog</a>
                <hr style="background-color: #01DF01;">
                <a href="./dang-nhap-tieng-viet.html">Đăng Nhập</a>
                <a href="./dang-ki-bwd-tieng-viet.html">Đăng Ký</a>
            </div>
            <!-- kết thúc hiển thị -->

        </div>
        
        <!-- bắt dầu phần content -->
        <div id="content" class="main-content">
            <div class="container box-chua-text">
                <div class="row">
                    <div class="col-sm-7 phan-chia-cot">
                        <div class="box-chua-tung-phan">

                            <div class="box-chua-cot-dia-diem row">
                                <div class="col col-tieu-de col-flex-2">
                                    Xác nhận
                                </div>
                                <div class="col col-tieu-de col-flex-2">
                                    Tên sản phẩm
                                </div>
                                <div class="col col-tieu-de col-flex-1">
                                    Thời gian
                                </div>
                                <div class="col col-tieu-de col-flex-1">
                                    Giá
                                </div>
                                <div class="col col-tieu-de col-flex-1">
                                    Số lượng
                                </div>
                                <div class="col col-tieu-de col-flex-1">
                                    
                                </div>
                            </div>
<!-- in sản phẩm -->
                            <?php
                            if(isset($_SESSION['products'])){
                                foreach($_SESSION['products'] as $key => $value){ 
                                    if($value['checkStatus']==1){
                                            $tienTamTinh += $value['productsPrice']*$value['soluong'];
                                        if($value['safePrice'] == ''){
                                            $tienSPGiamGia += 0;
                                        }else{
                                            $tienSPGiamGia += $value['safePrice']*$value['soluong'];
                                        }
                                    }
                            ?>
                            <div class="box-chua-dia-diem box-chua-dia-diem-chi-tiet row">
                                <div class="col col-dia-diem col-flex-1">
                                    <input type="checkbox" value="<?php echo $value['idSPThem']?>" class="checkboxXacNhan" <?php echo ($value['checkStatus'] == 1 ) ?  "checked" : "" ?> name="option">
                                </div>
                                <div class="col col-dia-diem col-flex-2">
                                    <?php echo $value['productsName']?>
                                </div>
                                <div class="col col-dia-diem col-flex-1">
                                    5 phút trước
                                </div>
                                <div class="col col-dia-diem col-flex-1">
                                    <?php
                                    if($value['safePrice'] == ''){
                                        echo $value['productsPrice'];
                                    }else{
                                       echo $value['safePrice'];
                                    }
                                    ?>
                                </div>
                                <div class="col col-dia-diem col-flex-1">
                                    <input type="text" IDGiaTri = "<?php echo $value['idSPThem'] ?>" value="<?php echo $value['soluong']?>" class="inputSoLuongSP">
                                </div>
                                <div class="col col-dia-diem col-flex-1">
                                    <a href="./xuLyPHP/deleteSPGioHang.php?idSPThem=<?php echo $value['idSPThem']?>&IDsession=<?php echo $key ?>" class="btn btn-danger">
                                        Xóa
                                    </a>
                                </div>
                            </div>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="box-chua-tung-phan box-chua-o-thanh-toan">
                            <div class="box-trong-chua-thanh-tien">
                                <p class="ten-tien tien-tam-tinh">
                                    <span class="ten-thanh-tien">Số tiền tạm tính: </span>
                                    <span class="gia-tien"><?php echo $tienTamTinh ?>đ</span>
                                </p>
                                <p class="ten-tien Giam-gia">
                                    <span class="ten-thanh-tien">Giảm giá:</span>
                                    <span class="so-tienGiam gia-tien">-<?php  $tienGiamGia = ($tienTamTinh - $tienSPGiamGia); echo $tienGiamGia; ?>đ</span> 
                                </p>
                                <p class="ten-tien">
                                    <span class="ten-thanh-tien">Tổng tiền: </span>
                                    <span class="gia-tien tien-phai-tra"><?php $tongTien = ($tienTamTinh - $tienGiamGia); echo $tongTien;  ?>đ</span>
                                </p>
                                <!-- <p class="ten-tien">
                                    <span class="ten-thanh-tien">Tổng số sản phẩm đặt hàng: </span>
                                    <span id="tongSoSanPhan" class="gia-tien tien-phai-tra"></span>
                                </p> -->
                                <p class="chua-btn-thanh-toan">
                                    
                                    <?php 
                                    if(isset($_SESSION['products']) && $_SESSION['products'] !== [] ){
                                        if(isset($_SESSION['productsConfirm'])){
                                            if(isset($_SESSION['productsConfirm']['productsConfirmCheck']) && $_SESSION['productsConfirm']['productsConfirmCheck'] == 1){
                                    ?>
                                        <button class="huyDonHang" value=<?php echo $_SESSION['login']['userID'] ?> >Hủy</button>
                                        <button class="btn-thanh-toan" value=<?php echo $_SESSION['login']['userID'] ?>> cập nhật </button> 
                                    <?php }else{ ?>
                                        <button class="btn-thanh-toan" value=<?php echo $_SESSION['login']['userID'] ?> > Đặt hàng </button> 
                                    <?php } }}?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- kết thúc phần content -->

        <!-- bắt dầu phần footer -->
        <div id="footer" class="footer khoang-cach-cac-phan">
            <div class="container">
                <div class="row thanh-cot-repon">

                    <div class="col-sm-3  repon-footer">
                        <h5 class="tieu-de-footer">Lời Cảm ơn</h5>
                        <p>
                            Cảm ơn các bạn đã tin tưởng và dùng web của chúng tôi. 
                            Chúng tôi sẽ cỗ gắng hết sức để web được hoàn thiện hơn.
                        </p>
                    </div>

                    <div class="col-sm-3  repon-footer">
                        <h5 class="tieu-de-footer">Liên Hệ</h5>
                        <p>
                            470-Nam Kỳ Khởi Nghĩa, Hòa Quý, 
                            Ngũ Hành Sơn, Đà Nẵng
                        </p>

                        <p>
                            +8481-813-3841
                        </p>

                        <p>
                            thegioiso@gmail.com
                        </p>

                    </div>
                    <div class="col-sm-3  repon-footer">
                        <h5 class="tieu-de-footer">Theo Dõi</h5>
                        <p class="chua-item">
                            <i class="ti-facebook item-mang-xh"></i>
                            <i class="ti-instagram item-mang-xh"></i>
                            <i class="ti-pinterest item-mang-xh"></i>
                            <i class="ti-twitter item-mang-xh"></i>
                        </p>
                    </div>
                    
                    <div class="col-sm-3  repon-footer">
                        <h5 class="tieu-de-footer">Tham Gia Cộng Đồng</h5>
                        <p>
                            <button class="btn-footer">Đăng ký</button>
                            <button class="btn-footer">Đăng nhập</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- kết thúc phần footer -->

    </div>

    <script src="./assect/Thu_Vien_Jquery/jquery-3.6.0.min.js" ></script>
    <script src="./assect/javascript/js-home-page.js"></script>
    <script src="./assect/javascript/js-ajax-giohang.js"></script>

</body>
</html>