<?php

session_start();

require_once '../../do-an-co-so/xuLyPHP/connection.php';

if(!isset($_SESSION['login'])){
    header('location: ../../do-an-co-so/dang-nhap-tieng-viet.php');
}

//lấy tên của các loại sản phẩm
$categoryID = array();
$categoryName = array();

$arrayCategory = array();
$category= array();

$sqlName = "SELECT * FROM categories";
$result = mysqli_query($conn, $sqlName);

mysqli_num_rows($result);
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
	$arrayCategory[] = $row;
	$category[$row['categoriesID']] = $row['categoriesName'];
}

$category_ID = $arrayCategory[0]['categoriesID'];

// lấy tất cả sản phẩm

$arrayPruducts = array();

if(isset($category_ID)){
	$sql = "SELECT * FROM `products` WHERE `categoriesID` =". $category_ID ;
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
		  $arrayPruducts[] = $row;
	  }

	} else {
	  echo "0 results";
	}
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
    <title>Đăng Bài</title>

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- Popper JS -->
    <!-- <scrip src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></scrip> -->
    <!-- chart.js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <!-- <scrip src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></scrip> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../BWS-WinnerTeam/assets/icon/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="../BWS-WinnerTeam/assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../BWS-WinnerTeam/assets/stype/animate.css-main/animate.min.css">
    <link rel="stylesheet" href="../BWS-WinnerTeam/assets/stype/magic-master/dist/magic.min.css">
    <link rel="stylesheet" href="./assets/css/admin.css">
    <!-- <link rel="stylesheet" href="./assets/stype/ihover-gh-pages/src/ihover.min.css"> -->
    <link rel="stylesheet" href="./assets/css/css_post.css">
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
                    <a href="./admin.php">
                        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="title">Trang Chủ</span>
                    </a>
                </li>
                <li>
                    <a href="">
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

        <div class="row ml-4 mr-4">
			<div class="col-lg-12">
				<h1 class="page-header">Posts</h1>
			</div>
		</div><!--/.row-->

        <div class="row">
			<div class="col-lg-12">
				<div class="jumbotron ml-4 mr-4 box-main-posts">
					<div class="header_posts">
						<ul class="name_category_coffee">
                            <?php
						    	foreach ($category as $key => $value) {
						    	?>
						    		<li class=" <?php if(isset($category_ID) && $category_ID == $key) { echo 'active'; } ?> " name="categories" value="<?php echo $key; ?>"><?php echo $value; ?></li>
						    <?php } ?>
						</ul>
						<div class="box_item">
							<button class="btn btn-post btn-primary btn-md"  data-toggle="modal" data-target="#modalProducts">Add</button>
							<button type="button" class="btn btn-post btn-primary btn-md" data-toggle="modal" data-target="#modalList">List</button>
                        </div>
						
					</div>

					<!-- tạo bảng -->
					<div class="table-responsive">    
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>STT</th>
									<th>Code</th>
									<th>Name</th>
									<th>Price</th>
									<th>image</th>
									<th></th>
								</tr>
							</thead>
							<tbody id="addNode" >
								<!-- <?php
									$size = count($arrayPruducts);
									for($i = 0; $i < $size; $i++){
								?>
								<tr class="active" id="form_<?php echo $arrayPruducts[$i]['productID']; ?>">
									<td><?php echo $i+1 ?></td>
									<td><?php echo $arrayPruducts[$i]['productsCode'] ?></td>
									<td><?php echo $arrayPruducts[$i]['productsName'] ?></td>
									<td><?php echo $arrayPruducts[$i]['productsPrice'] ?></td>
									<td><img src="../../do-an-co-so/assect/img/file_img_server/<?php echo $arrayPruducts[$i]['Image'] ?>" width="40" height="40" alt=""></td>
									<td>
										<form class="formDelete" >
                						    <input type="hidden" name="product_id"
                						           value="<?php echo $arrayPruducts[$i]['productID']; ?>">
                						    <input type="hidden" name="category_id"
                						           value="<?php echo $arrayPruducts[$i]['categoriesID']; ?>">
                						    <input type="submit"name='delete'  value="Delete">
                						</form>
									</td>
								</tr>
								<?php } ?> -->
								
							</tbody>
						</table>
					</div>   

                    <!-- phân trang -->
                    <div id="paging">
                        <ul id="paging_ul" class="pagination" style=" justify-content: center; " >
                          
                        </ul>
                    </div>


				</div>
			</div>
		</div><!--/.row-->

        <!-- The Modal  list -->
		<div class="modal" id="modalList">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Add list category</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
				   <!-- Taoh bảng list -->
				   <h4>Category List</h4>
			   		<div class="table-responsive">    
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Name</th>
									<th></th>
								</tr>
							</thead>
							<tbody id="addList">
								<?php
									$sizecate = count($arrayCategory);
									for($i = 0; $i < $sizecate; $i++){
								?>
								<tr id="activeModalList_<?php echo $arrayCategory[$i]['categoriesID']; ?>">
									<td><?php echo $arrayCategory[$i]['categoriesName'] ?></td>
									<td>
										<form class="delete_category">
                						    <input type="hidden" name="category_ID"
                						           value="<?php echo $arrayCategory[$i]['categoriesID']; ?>">
                						    <input type="submit" value="Delete">
                						</form>
									</td>
								</tr>
								<?php } ?>
								
							</tbody>
						</table>
					</div> 

					<!-- Thêm thể loại -->
					<h4>Add Category</h4>
					<form id="add_category_form">
    				    <label>Name:</label>
    				    <input type="text" name="name" />
    				    <input id="add_category_button" type="submit" value="Add"/>
    				</form>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      	</div>

        <!-- The Modal  sản phẩm -->
		<div class="modal" id="modalProducts">
         <div class="modal-dialog">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title">Add Product</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body">
				   <!-- Taoh bảng add sản phẩm -->
			   		<div class="table-responsive">    
						<form enctype="multipart/form-data" id="add_product_form">
							<table class="table table-bordered">
								<tr>
									<td>Category:</td>
									<td>
										<select name="category_id" id="">
											<?php
												for($i=0  ; $i< count($arrayCategory) ; $i++ ){
											?>
												<option value="<?php echo $arrayCategory[$i]['categoriesID']; ?>">
                								    <?php echo $arrayCategory[$i]['categoriesName']; ?>
                								</option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Code:</td>
									<td><input type="text" name="product_Code"></td>
								</tr>
								<tr>
									<td>Name:</td>
									<td><input type="text" name="product_Name"></td>
								</tr>
								<tr>
									<td>Price:</td>
									<td><input type="text" name="list_Price"></td>
								</tr>
								<tr>
									<td>Image:</td>
									<td><input type="file" name="image" id="image_file" ></td>
								</tr>
							</table>
							<div style="text-align: center">
								<input type="submit" id="themSanPham" class="btn btn-post btn-primary btn-md" name="add_product" value="Add" >
							</div>
						</form>
					</div> 

               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
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
    <script src="./js/js_ajax_ThongTin.js" ></script>

</body>

</html>