<?php

session_start();

// echo " <pre>";
// print_r($_SESSION);
// die;

if (isset($_SESSION['login'])) {
    $userName = $_SESSION['login']['userName'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điện thoại</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assect/icon/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./assect/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assect/css/css_xtc.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="./assect/flickity-docs/flickity.min.css">

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

            <div id="content" class="content-class">
                <div class="container ">
                    <div class="tieu-de-phan">
                        <h3 class="ten-trang">Điện thoại</h3>
                    </div>
                    
                    <div class="san-pham khoang-cach-cac-phan-trong-conten">
                        <div class="row row-danh-cho-sap-xep tao-flex-thanh-col">
                            <div  class="col-sm-3">
                            </div>
                            <div class="col-sm-7 cho-rong-full-man-hinh" style="margin-bottom: 10px;">
                                <div class="sap-xep">
                                    <ul class="sap-xep-the0-ul">
                                        <li class="sap-xep-theo-li khoang-cach-sap-xep">
                                            <p class="tieu-de-sap-xep">Sắp xếp theo:</p>
                                        </li>
                                        <li class="sap-xep-theo-li khoang-cach-sap-xep">
                                            <p class="sap-xep-tang-dan sap-xep-theo-chinh-sua">Giá tăng dần</p>
                                        </li>
                                        <li class="sap-xep-theo-li khoang-cach-sap-xep">
                                            <p class="sap-xep-giam-dan sap-xep-theo-chinh-sua">Giá giảm dần</p>
                                        </li>
                                    </ul>
                                    <div class="thanh_loc-khi-repon" onclick="openThanhLoc()">
                                        <p class="nut-loc">Lọc</p>
                                    </div>
                                    
                                </div>

                                

                            </div>
                        </div>

                        <div class="row row-san-pham tao-flex-thanh-col">
                            <div id="thanhLoc"  class="col-sm-3 phan-cho-thanh-loc an-di-khi-repon">

                                <div class="box-thuvao">
                                    <div class="thanh-chi-xuat-hien-khi-repon">
                                        <p class="nut-ap-dung">Áp dụng</p>
                                        <p class="tieude-thanh">Lọc</p>
                                        <p class="nut-bam-tro-lai" onclick="closeThanhLoc()"> > </p>
                                    </div>
    
                                    <!-- thương hiệu -->
                                    <div class="box-chua-ten-chung ">
                                        <div class="loc-theo-ten " onclick="anhiensanpham('theo-hang-san-xuat')">
                                            <p class=" chinh-sua-chung-phanloc-ten ten-loc">Hãng Sản Xuất</p>
                                            <p class=" chinh-sua-chung-phanloc-ten dau_ben-loc dau-cong">+</p>
                                        </div>
                                        <div id="theo-hang-san-xuat" class="an-hien lua-chon">
                                            <form action="#" class="form-lua-chon">
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Lenovo">Samsung</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Xiaomi</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Asus">Realme</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="HP">Nokia</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Apple">Masstel</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="MSI">Apple (iPhone)</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Acer">OPPO</p>
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Acer">Vivo</p>
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Acer">Vsmart</p>
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Acer">Huawei</p>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <!-- khoảng giá -->
                                    <div class="box-chua-ten-chung ">
                                        <div class="loc-theo-ten " onclick="anhiensanpham('theo-khong-gia')">
                                            <p class=" chinh-sua-chung-phanloc-ten ten-loc">Khoảng giá</p>
                                            <p class=" chinh-sua-chung-phanloc-ten dau_ben-loc dau-cong">+</p>
                                        </div>
                                        <div id="theo-khong-gia" class="an-hien lua-chon">
                                            <form action="#" class="form-lua-chon">
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Lenovo">Trên 13 triệu</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Từ 7 - 13 triệu</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Asus">Từ 4 - 7 triệu</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="HP">Từ 2 - 4 triệu</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Apple">Dưới 2 triệu</p>
                                            </form>
                                        </div>
                                    </div>
    
                                    <!-- tình trang-->
                                    <div class="box-chua-ten-chung ">
                                        <div class="loc-theo-ten " onclick="anhiensanpham('theo-tinh-trang')">
                                            <p class=" chinh-sua-chung-phanloc-ten ten-loc">Tình Trạng</p>
                                            <p class=" chinh-sua-chung-phanloc-ten dau_ben-loc dau-cong">+</p>
                                        </div>
                                        <div id="theo-tinh-trang" class="an-hien lua-chon">
                                            <form action="#" class="form-lua-chon">
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Lenovo">New Sealed</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">New, Fullbox</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Asus">New, Outlet</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="HP">Used</p>
                                            </form>
                                        </div>
                                    </div>
    
                                    <!-- Loại hàng -->
                                    <div class="box-chua-ten-chung ">
                                        <div class="loc-theo-ten " onclick="anhiensanpham('theo-loai-hang')">
                                            <p class=" chinh-sua-chung-phanloc-ten ten-loc">Loại hàng</p>
                                            <p class=" chinh-sua-chung-phanloc-ten dau_ben-loc dau-cong">+</p>
                                        </div>
                                        <div id="theo-loai-hang" class="an-hien lua-chon">
                                            <form action="#" class="form-lua-chon">
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Lenovo">Chính hãng</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Nhập khẩu</p>
                                            </form>
                                        </div>
                                    </div>
    
                                    <!-- Tính năng đặc biệt -->
                                    <div class="box-chua-ten-chung ">
                                        <div class="loc-theo-ten " onclick="anhiensanpham('theo-tinh-nang-dac-biet')">
                                            <p class=" chinh-sua-chung-phanloc-ten ten-loc">Tính năng đặc biệt</p>
                                            <p class=" chinh-sua-chung-phanloc-ten dau_ben-loc dau-cong">+</p>
                                        </div>
                                        <div id="theo-tinh-nang-dac-biet" class="an-hien lua-chon">
                                            <form action="#" class="form-lua-chon">
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Lenovo">Bảo mật vân tay</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Nhận diện khuôn mặt</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Asus">Chống nước & bụi</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="HP">Sạc nhanh</p>
                                            </form>
                                        </div>
                                    </div>
    
                                    <!-- Dung lươnng -->
                                    <div class="box-chua-ten-chung ">
                                        <div class="loc-theo-ten " onclick="anhiensanpham('theo-dung-luong-pin')">
                                            <p class=" chinh-sua-chung-phanloc-ten ten-loc">Dung lượng PIN</p>
                                            <p class=" chinh-sua-chung-phanloc-ten dau_ben-loc dau-cong">+</p>
                                        </div>
                                        <div id="theo-dung-luong-pin" class="an-hien lua-chon">
                                            <form action="#" class="form-lua-chon">
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Lenovo">Dưới 3000 mah</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Từ 3000 - 4000 mah</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Asus">Siêu trâu: trên 4000 mah</p>
                                            </form>
                                        </div>
                                    </div>
    
                                    <!-- camera -->
                                    <div class="box-chua-ten-chung ">
                                        <div class="loc-theo-ten " onclick="anhiensanpham('theo-camera')">
                                            <p class=" chinh-sua-chung-phanloc-ten ten-loc">Camera</p>
                                            <p class=" chinh-sua-chung-phanloc-ten dau_ben-loc dau-cong">+</p>
                                        </div>
                                        <div id="theo-camera" class="an-hien lua-chon">
                                            <form action="#" class="form-lua-chon">
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Lenovo">Quay phim slow motion</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Ai camera</p>
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Chụp 3d</p>
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Hiệu ứng làm đẹp</p>
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Zoom quang học/p>
                                            </form>
                                        </div>
                                    </div>
    
                                    <!-- Kích thước màn hình -->
                                    <div class="box-chua-ten-chung ">
                                        <div class="loc-theo-ten " onclick="anhiensanpham('theo-kich-thuoc-man-hinh')">
                                            <p class=" chinh-sua-chung-phanloc-ten ten-loc">Kích thước màn hình</p>
                                            <p class=" chinh-sua-chung-phanloc-ten dau_ben-loc dau-cong">+</p>
                                        </div>
                                        <div id="theo-kich-thuoc-man-hinh" class="an-hien lua-chon">
                                            <form action="#" class="form-lua-chon">
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Lenovo">Màn hình nhỏ: dưới 5.0 inch</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Dell">Nhỏ gọn vừa tay: dưới 6.0 inch, tràn viền</p> 
                                                <p class="ckeck-list"><input class="ten-cau-lua-chon" type="checkbox" name="chon" value="Asus">Trên 6.0 inch</p> 
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-sm-9  phan-cho-san-pham cho-rong-full-man-hinh">
                                <div class="box-san-pham tao-scroll">
                                    <!-- render sản phẩm -->
                                    <div id="box-products--render" class="row">
                                        

                                    </div>
                                </div>

                                <!-- pagination -->
                                <div id="pagination">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bắt dầu phần footer -->
            <div id="footer" class="footer">
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
    <script src="./assect/javascript/js-xem-tat-ca.js"></script>
    <script src="./assect/javascript/js-ajax--sanPham.js"></script>

    </script>
</body>
</html>