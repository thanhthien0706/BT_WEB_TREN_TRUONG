<?php

session_start();
if(!isset($_SESSION['login'])){
    header('location: ../../do-an-co-so/dang-nhap-tieng-viet.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../BWS-WinnerTeam/assets/icon/fontawesome-free-5.15.3-web/css/fontawesome.min.css"> -->
    <title>Admin</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <scrip src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></scrip>
    <!-- chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <!-- <scrip src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></scrip> -->
    <link rel="stylesheet" href="../BWS-WinnerTeam/assets/icon/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="../BWS-WinnerTeam/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../BWS-WinnerTeam/assets/stype/animate.css-main/animate.min.css">
    <link rel="stylesheet" href="../BWS-WinnerTeam/assets/stype/magic-master/dist/magic.min.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <link rel="stylesheet" href="./assets/stype/ihover-gh-pages/src/ihover.min.css">
    <!-- REPONSIVE -->
    <!-- cssMes -->
    <link rel="stylesheet" href="./assets/css/mess.css">

    <style>
        .item_userName{
            position: absolute;
            list-style: none;
            background-color: #f2f2f2f2;
            right:10px;
            bottom: -106px;
            z-index: 22;
            margin: 0;
            display: none;
        }
        .item_userName::before{
            position: absolute;
            content: '';
            width: 44px;
            height: 20px;
            /* background-color: black; */
            top: -10px;
            right: 0;
        }

        .item_userName > li:last-child a{
            text-decoration: none;
            font-size: 16px;
            color: black;
            text-align: center;
        }

        .item_userName > li:last-child:hover a{
            color: white;
        }

        .item_userName > li:last-child p{
            margin: 0;
        }

        .item_userName > li{
            padding: 15px;
            font-size: 16px;
            color: black;
            cursor: pointer;
            text-align: center;
        }

        .item_userName > li:hover{
            background-color: black;
            color: white;
        }

        .topbar:hover .item_userName{
            display: block;
        }
    </style>

</head>

<body>
    <div id="main">
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <!-- <span class="icon"><i class="fab fa-apple " aria-hidden="true" style="font-size: 30px;"></i></span> -->
                        <span class="title">
                            <!-- <h2>HOME</h2> -->
                        </span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="title">Trang Chủ</span>
                    </a>
                </li>
                <li>
                    <a href="./Post.php">
                        <span class="icon"><i class="fas fa-pen" aria-hidden="true"></i></span>
                        <span class="title">Đăng sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                        <span class="title">Khách Hàng</span>
                    </a>
                </li>
                <li>
                    <a href="" class="notification">
                        <span class="icon "><i class="fa fa-comments" aria-hidden="true"></i>
                            <span class="badge">12</span>
                        </span>
                        <span class="title">Tin Nhắn</span>
                        

                    </a>
                </li>
                <li>
                    <a href="">

                        <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                        <span class="title">Cài Đặt</span>
                    </a>
                </li>
                <li>
                    <a href="">

                        <span class="icon"><i class="fas fa-chart-pie" style="font-size: 26px;"></i></span>
                        <span class="title" style="line-height: 50px;">Thống Kê</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-box" style="font-size: 26px;"></i></i></span>
                        <span class="title" style="line-height: 50px;">Duyệt Sản Phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fas fa-upload" style="font-size: 26px"></i></span>
                        <span class="title" style="line-height: 50px;">Đăng Bài</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="far fa-clock"  style="font-size: 30px;"></i></span>
                        <span class="title" style="line-height: 50px;">Phiên Bản</span>
                    </a>
                </li>
                <li id="DangXuat">
                    <a >

                        <span class="icon"><i class="fa fa-sign-out-alt" aria-hidden="true"></i></span>
                        <span class="title">Thoát</span>
                    </a>
                </li>
            </ul>
        </div>
<!-- <a href="../../do-an-co-so/dang-nhap-tieng-viet.php"></a> -->
        <div class="box">
            <div class="topbar" style="position: relative;">
                <div class="toggle" onclick="toggleMenu();"><i class="fa fa-bars"></i></div>
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search here">
                        <i class="fa fa-search"></i>
                    </label>
                </div>
                <div class="user">
                    <img src="./images/10-12-2020.jpg" alt="">

                </div>

                <ul class="item_userName"  >
                    <li>
                        <?php
                            echo 'ADMIN'.$_SESSION['login']['userName'];
                        ?>
                    </li>
                    <li>
                        <a href="">
                            <p>Chỉnh sửa</p>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers ">
                            <div class="count">
                                4531
                            </div>
                        </div>
                        <div class="cardName">Lượt Xem Hôm Nay</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <div class="count">
                                805
                            </div>
                        </div>
                        <div class="cardName">Giảm Giá</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <div class="count">
                                1403
                            </div>
                        </div>
                        <div class="cardName">Bình Luận</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa fa-comment" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">
                            <div class="count">
                                16000
                            </div>
                        </div>
                        <div class="cardName">Lợi Nhuận</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa fa-dollar-sign" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="details">
                <div class="recentOreders">
                    <div class="cardHeader">
                        <h2>Các Nhà Đầu Tư</h2>
                        <a href="#" class="btn btn-info">Xem Tất Cả</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Tên</td>
                                <td>Số Tiền</td>
                                <td>Thanh Toán</td>
                                <td>Trạng Thái</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HP</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Acer</td>
                                <td>$120</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>LG</td>
                                <td>$620</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>
                            <tr>
                                <td>Apple</td>
                                <td>$1600</td>
                                <td>Due</td>
                                <td><span class="status inprogress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>Sam Sung</td>
                                <td>$1200</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delivered</span></td>
                            </tr>
                            <tr>
                                <td>Grapes</td>
                                <td>$120</td>
                                <td>Due</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Coconut</td>
                                <td>$620</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>
                            <tr>
                                <td>vinfast</td>
                                <td>$1600</td>
                                <td>Due</td>
                                <td><span class="status inprogress">In Progress</span></td>
                            </tr>
                            <tr>
                                <td>Oppo</td>
                                <td>$1600</td>
                                <td>Due</td>
                                <td><span class="status inprogress">In Progress</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleMenu() {
            let toggle = document.querySelector('.toggle');
            let navigation = document.querySelector('.navigation')
            let box = document.querySelector('.box')
            toggle.classList.toggle('active');
            navigation.classList.toggle('active');
            box.classList.toggle('active');
        }
        (function ($) {
            "use strict";

            // Counter Number
            $('.count').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        })(jQuery);
    </script>

    <script src="../../do-an-co-so/assect/Thu_Vien_Jquery/jquery-3.6.0.min.js" ></script>
    <script src="./js/js_dangXuat.js" ></script>

</body>

</html>