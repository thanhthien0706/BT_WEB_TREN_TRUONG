<?php

session_start();

if(isset($_COOKIE['username']) && $_COOKIE['pass']){
    $username = $_COOKIE['username'];
    $password = $_COOKIE['pass'];
    $check = true;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./assect/css/css-dangNhap.css">
    <!-- <link rel="stylesheet" href="./assets/icon/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/stype/magic-master/dist/magic.min.css">
    <link rel="stylesheet" href="./assets/stype/animate.css-main/animate.min.css"> -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>


    <div id="main">
        <div id="modal">
            <div id="main__in">
                <div class="main__header">
                    <h1 class="animate__animated animate__lightSpeedInLeft">ĐĂNG NHẬP</h1>
                </div>
    
                <div class="main__content">
                        <form id="regForm" >
                            <div class="tab">
                                <p><input type="text" class="tab__input" placeholder="Email" name="email" value="<?php echo isset($username) ? $username : '' ?>"></p>
                                <p><input class="tab__input" type="password" placeholder="Mật khẩu" name="pass"value="<?php echo isset($password) ? $password : '' ?>" ></p>
                                <div class="form-check">
                                    <label class="form-check-label" for="check1">
                                      <input type="checkbox" class="form-check-input"  id="check1" name="option"
                                       value="1" <?php echo isset($check) ? 'checked' : '' ?>  style="margin-top: .5rem;"> <p>Nhớ mật khẩu</p>
                                    </label>
                                </div>
                            </div>

                            <div class="content__prompt">
                                <p class="content__prompt-first">Quên mật khẩu?<span class="content__prompt-text"> <a href="#" style="text-decoration: none;"> Bấm vào đây</a></span></p>
                                <p class="content__prompt-first-1"> <a href="./dang-ki-bwd-tieng-viet.html" style="text-decoration: none; color: red;">Đăng ký tại đây!</a></p>
                            </div>  

                            <div class="chua-btn">
                              <button class="btn-check-dn">Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                    <div class="main__footer">
                    <footer>
                        <p class="animate__animated animate__lightSpeedInRight">Thiết kế bởi <span>Winner Team</span></p>
                    </footer>
                 </div>
             </div>
                
        </div>
    </div>

    <script src="./assect/Thu_Vien_Jquery/jquery-3.6.0.min.js" ></script>
    <script>
        $(document).ready(function() {
            $( "#regForm" ).submit(function( event ) {
                event.preventDefault();
                checkKhoangTrang();
                if(checkKhoangTrang() != false) { 
                    xuLyAjax();
                }
            });
        });

        function checkKhoangTrang(){
            if($('input[name=email] ').val() == '' || $('input[name=pass]').val() == ''){
                alert('Hãy nhập đầy đủ thông tin!!!!');
                return false;
            }
        }

        function xuLyAjax(){
            $.ajax({
                url : "./xuLyPhp/dangNhap.php",
                type : "POST",
                dataType : "json",
                data :  $( "#regForm" ).serializeArray(),
                success : function( result ) {
                    if(result['khongTonTai']){
                        alert(result['khongTonTai']);
                    }

                    if(result['addmin']){
                        window.location.assign(result['addmin']);
                    }

                    if(result['notAddmin']){
                        window.location.assign(result['notAddmin']);
                    }

                    // console.log(result);
                }
            });
        }
        
    </script>

</body>
</html>