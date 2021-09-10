<?php

session_start();

require_once "./xuLyPHP/connection.php";

// session_destroy();

// echo " <pre>";
// print_r($_SESSION);
// echo " </pre>";
// die();

if (isset($_GET['IDproduct'])) {
$sql = "SELECT * FROM products WHERE productID=".$_GET['IDproduct'];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
  echo "0 results";
}
}

if (isset($_SESSION['login'])) {
    $Name = $_SESSION['login']['userName'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điện thoại Samsung Galaxy S21 5G</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assect/icon/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./assect/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assect/css/css-chi-tiet-san-pham.css">
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
                                        <a href="<?php echo isset($Name) ?  "#" : "./dang-ki-bwd-tieng-viet.html";?>"><?php echo isset($Name) ?  $Name : "Đăng Kí"  ;?></a>
                                    </div>
        
                                    <div class="item">
                                        <a href="<?php echo isset($Name) ?  "./xuLyPHP/dangxuat.php?dangXuat=''" : "./dang-nhap-tieng-viet.php";?>"><?php echo isset($Name) ?  "Đăng xuất" : "Đăng Nhập"  ;?></a>
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
        </div>

        <div id="content " class="khoang-cach-cac-phan-chinh">
            <div class="container">
                <div class="box-thong-tin-chung-san-pham">
                    <div class="row tao-cot">
                        <div class="col-sm-6 rong-ra-full">
                            <div class="phan-anh rong-ra-full">
                                <img src="./assect/img/file_img_server/<?php echo $row['Image'] ?>" alt="">
                            </div>
                        </div>
                        <div class="col-sm-6 tao-sroll rong-ra-full">
                            <div class="box-chua-text-chung">
                                <div class="box-text">
                                    <h2 class="ten-san-pham"><?php echo $row['productsName'] ?></h2>
                                    <p class="danh-gia">
                                        <span class="danh-gia-sao">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </span>
                                        <a href="#" style="text-decoration: none;">4 bình luận</a>
                                    </p>
    
                                    <p class="ten-thuong-hieu">
                                        Thương hiêu: Samsung 
                                    </p>
    
                                    <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">Vi xử lý:</span>
                                        Exynos 2100
                                    </p>
                                    <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">Màn hình:</span>
                                        Dynamic AMOLED 2X6.2"Full HD+
                                    </p>
    
                                    <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">RAM:</span>
                                        8 GB
                                    </p>
    
                                    <!-- <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">Card đồ họa:</span>
                                        Apple GPU (7 Cores)
                                    </p> -->
    
                                    <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">Lưu trữ:</span>
                                        128 GB
                                    </p>
    
                                    <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">Pin:</span>
                                        4000 mAh ,25 W
                                    </p>
    
                                    <!-- <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">Kết nối chính:</span>
                                        2 x USB-C with Thunderbolt 3 + USB4
                                    </p> -->
    
                                    <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">Cân nặng:</span>
                                        Khoảng 170 g
                                    </p>
    
                                    <p class="thong-so khoang-cach-thong-so">
                                        <span class="ten-thong-so">Hệ điều hành:</span>
                                        Android 11
                                    </p>
    
                                </div>
    
                                <div class="box-khuen-mai">
                                        <p class="tieu-de-khuyen-mai">Khuyến mãi</p>
                                        <p class="noi-dung-khuye-mai">
                                            <i class="ti-gift"></i>
                                            Giảm trực tiếp vào giá bán 
                                            <span class="gia-giam">1.000.000 ₫</span>
                                        </p>
    
                                        <p class="noi-dung-khuye-mai">
                                            <i class="ti-gift"></i>
                                            Ưu đãi khi mua kèm
                                        </p>
                                </div>
    
                                <div class="box-phan-gia tao-cot-mobile">
                                    <div class="gia-sanpham rong-ra-full-mobile">
                                        <p class="gia-moi">
                                            Giá:
                                            <span class="text-gia"><?php echo $row['safePrice'] ?></span>
                                        </p>
                                        
                                        <p class="gia-cu">
                                            Giá cũ:
                                            <?php echo $row['productsPrice'] ?>
                                        </p>
                                    </div>
    
                                    <div class="box-gio-hang rong-ra-full-mobile">
                                        <?php
                                        if (isset($_SESSION['login'])) {
                                        ?>
                                            <a id="btnThemSP" href="./xuLyPHP/them_san_pham--gio-hang.php?IDproduct=<?php echo $_GET['IDproduct']?>&UserID=<?php echo $_SESSION['login']['userID'] ?>">
                                            <button id="btnThemSP" class="gio-hang">
                                                <i class="ti-shopping-cart"></i>
                                                Thêm vào giỏ hàng
                                                </button>
                                            </a>
                                        <?php
                                        }else {
                                        ?>
                                        <a href="#" onclick="alert('Bạn chưa đăng nhập')">
                                        <button id="btnThemSP" class="gio-hang">
                                            <i class="ti-shopping-cart"></i>
                                            Thêm vào giỏ hàng
                                            </button>
                                        </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-chi-tiet-san-pham">
                    <h3 class="tieu-de-chitet">Đánh giá chi tiết</h3>
                    <p class="tieu-de-nho">Galaxy S21 5G nằm trong series S21 đến từ Samsung nổi bật với thiết kế tràn viền, cụm camera ấn tượng cho đến hiệu năng mạnh mẽ hàng đầu.</p>
                    <p class="text">
                        “Bộ cánh” mới nổi bật và sang trọng
                    </p>
                    <p>Nổi bật với cụm camera sau được thiết kế đầy mới lạ, phần khuôn hình chữ nhật chứa bộ 3 camera ôm trọn cạnh trái của chiếc smartphone, viền khuôn cong uyển chuyển, hạn chế tối đa độ nhô ra so với mặt lưng, mang lại cái nhìn tổng thể hài hòa, độc đáo.

                    </p>
                    <p class="tieu-de-nho">Thiết kế - không cần phải thay đổi</p>

                    <p class="text">
                        Do được ra mắt vào quý 4 năm 2020, Macbook Air Late 2020 không có nhiều thay đổi so với phiên bản hồi đầu năm. Máy vẫn sử dụng thiết kế nhôm nguyên khối truyền thống, bo cong nhẹ, mang cảm giác mềm mại, êm ái. Macbook vẫn luôn giữ kiểu thiết kế quen thuộc, 
                        truyền thống, với độ mỏng chỉ 1.5cm, kèm theo đó là cân nặng 1.29kg.
                    </p>

                    <p class="text">
                        Cũng như mọi lần, Macbook nói chung và Macbook Air Late 2020 nói riêng sử dụng kiểu bản lề liền khối nhằm tối ưu hoàn toàn về độ mỏng.
                         Viền màn hình mỏng, tuy nhiên lại dày về hai vùng trên-dưới.
                    </p>

                    <!-- <p class="text">
                        Macbook Air Late 2020 cũng được trang bị phiên bản vàng hồng, đi kèm với xám và bạc.
                    </p> -->

                    <!-- <p class="tieu-de-nho">Hiệu năng tuyệt vời với ARM</p> -->

                    <!-- <p class="text">
                        Macbook Air Late 2020 được trang bị SoC Apple M1, với quy trình 5nm mạnh mẽ. Chiếc máy cho khả năng chỉnh sửa ảnh, thậm 
                        chí dựng video ở mức ổn định. Thêm vào đó, Apple M1 còn tối ưu về thời lượng pin,giúp kéo dài thời gian sử dụng. Dù vậy,
                         máy vẫn không cần đến quạt tản nhiệt.
                    </p> -->

                    <div id="phan-an-di" class="phan-doc-them">

                        <p class="tieu-de-nho">Màn hình vô cực Infinity-O siêu mượt</p>
                        
                        <p class="text">
                            Galaxy S21 được trang bị màn hình Dynamic AMOLED 2X, hỗ trợ HDR10+ tiên tiến do Samsung phát triển, có thể đạt được độ sáng cao nhất lên đến 1300 nits, ngay cả khi dưới ánh sáng mặt trời Galaxy S21 vẫn cho hình ảnh sống động, rõ ràng đến không ngờ, sẽ nâng trải nghiệm thị giác của bạn lên một tầm cao mới.


                        </p>

                        <p class="tieu-de-nho">Camera cho hình ảnh hoàn hảo đến từng chi tiết</p>

                        <p class="text">
                            Thông số máy ảnh luôn là niềm tự hào của Samsung. Galaxy S21 chiếc điện thoại sở hữu 3 camera sau trong đó camera góc rộng, góc siêu rộng có cùng độ phân giải là 12 MP, camera tele có độ phân giải lên đến 64 MP. Ở mặt trước, camera selfie có độ phân giải 10 MP.
                        </p>

                        <p class="text">
                            Cụm camera này hỗ trợ đầy đủ các tính năng mà một người dùng cần. Chế độ chụp chân dung, góc rộng, AI làm đẹp,... luôn sẵn sàng mang đến cho người dùng những bức ảnh xuất sắc mà không cần chỉnh sửa quá nhiều.


                        </p>

                        <!-- <p class="tieu-de-nho">Cổng kết nối</p>

                        <p class="text">
                            Macbook Air Late 2020 chỉ được trang bị 2 cổng USB-C hỗ trợ Thunderbolt 3, tuy nhiên tích hợp USB 4,
                             ngoài ra còn có jack tai nghe 3.5mm để xuất âm thanh. Cũng không quá xa lạ với những chiếc Macbook
                              ở thời điểm hiện tại, chỉ trang bị USB-C. Mặc dù vậy, Thunderbolt của Macbook Air ARM lại không thể sử dụng eGPU.
                        </p>

                        <p class="tieu-de-nho">Macbook Air Late 2020 – Khi ARM nhập cuộc</p>

                        <p class="text">
                            Mang tính cách mạng và đột phá, Macbook Air Late 2020 cùng với chip Apple M1 là một chiếc máy thực sự ấn tượng, với khả năng
                             sử dụng trong thời gian dài. Tuy vậy, do là cấu trúc chip mới, phải một thời gian dài nữa mới có thể tương thích với những phần mềm hiện tại.
                        </p> -->

                    </div>

                    <div class="btn-xem-them">
                        <button id="btn-xem" onclick="docthem();" >Xem thêm</button>
                    </div>

                </div>


                <div class="box-chua-chung-binh-luan">
                    <h2 class="tieu-de-binh-luan">Bình luận <span class="so-binh-luan">4 bình luận</span> </h2>

                    <div class="hop-binh-luan-lon">
                        <div class="viet-binh-luan">

                            <p class="tieu-de-binh-luan-cua-ban">Bình luận của bạn</p>
    
                            <div class="box-viet-binh-luan">
                                
                                <textarea class="box-de-viet-binh-luan" name="bình luận" id=""  rows="1" placeholder="Mời bạn để lại bình luận"></textarea>
                                <button class="btn-gui">Gửi</button>
    
                            </div>
                        </div>
    
                        <!-- bình luạn 1 -->
                        <div class="box-binhluan-cua-khach-hang">
                            <div class="hinhnen-kh">
                                <img src="./assect/img/home-page/Binh-luan-nguoi-dung/nguo-binh-luan/anh_tan.jpg" alt="">
                            </div>
    
                            <div class="thongtin-binh-luan-khach-hang">
                                <h3 class="ten-nguoi-binh-luan">Lê Văn Tấn</h3>
                                <p class="noi-dung-binh-luan">Sản phẩm còn tặng kèm cái gì không ạ</p>

                                <div class="tl-tgian-binhluan">
                                    <a href="#" class="btn-tra-loi">Trả lời</a>
                                    <span class="thoi-gian-btn">2 ngày trước</span>
                                </div>

                            </div>

                            <div class="nguoi-tra-loi">
                                <div class="box-binhluan-cua-khach-hang">
                                    <div class="hinhnen-kh">
                                        <img src="./assect/img/home-page/Binh-luan-nguoi-dung/nguo-binh-luan/thanh_thien.jpeg " alt="">
                                    </div>
            
                                    <div class="thongtin-binh-luan-khach-hang">
                                        <h3 class="ten-nguoi-binh-luan">Nguyễn Thành Thiện</h3>
                                        <p class="noi-dung-binh-luan">Tham lam</p>
        
                                        <div class="tl-tgian-binhluan">
                                            <a href="#" class="btn-tra-loi">Trả lời</a>
                                            <span class="thoi-gian-btn">5 phút trước</span>
                                        </div>
        
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- bình luận 2 -->
                        <div class="box-binhluan-cua-khach-hang">
                            <div class="hinhnen-kh">
                                <img src="./assect/img/home-page/Binh-luan-nguoi-dung/nguo-binh-luan/long_le.jpg " alt="">
                            </div>
    
                            <div class="thongtin-binh-luan-khach-hang">
                                <h3 class="ten-nguoi-binh-luan">Lê Quang Long</h3>
                                <p class="noi-dung-binh-luan">Làm sao để mở màn hình thế ạ</p>

                                <div class="tl-tgian-binhluan">
                                    <a href="#" class="btn-tra-loi">Trả lời</a>
                                    <span class="thoi-gian-btn">15 phút trước</span>
                                </div>

                            </div>

                            <div class="nguoi-tra-loi">
                                <div class="box-binhluan-cua-khach-hang">
                                    <div class="hinhnen-kh">
                                        <img src="./assect/img/home-page/Binh-luan-nguoi-dung/nguo-binh-luan/thanh_thien.jpeg " alt="">
                                    </div>
            
                                    <div class="thongtin-binh-luan-khach-hang">
                                        <h3 class="ten-nguoi-binh-luan">Nguyễn Thành Thiện</h3>
                                        <p class="noi-dung-binh-luan">Ngu dốt</p>
        
                                        <div class="tl-tgian-binhluan">
                                            <a href="#" class="btn-tra-loi">Trả lời</a>
                                            <span class="thoi-gian-btn">5 phút trước</span>
                                        </div>
        
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
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

    btnThemSP
    <script src="./assect/Thu_Vien_Jquery/jquery-3.6.0.min.js" ></script>
    <script src="./assect/javascript/js-chi-tiet-san-pham.js"></script>
</body>
</html>