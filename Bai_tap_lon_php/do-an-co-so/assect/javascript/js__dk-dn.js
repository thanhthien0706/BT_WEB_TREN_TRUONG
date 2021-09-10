$(document).ready(function() {
        $(" input[type=submit] ").click(function() {
            checkKhoangTrang();
            checkEmail();
            checkPassRe();
            if(checkEmail() != false && checkPassRe() != false && checkKhoangTrang() != false) { 
                xuLyAjax();
            }
        });
});

function checkKhoangTrang(){
    if($('#name').val() == '' || $('#email').val() == '' || $('#pass').val() =='' || $('#re_pass').val() == ''){
        alert('Hãy nhập đầy đủ thông tin!!!!');
        grecaptcha.reset()
        return false;
    }
}

function checkEmail(){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
    if (!filter.test(email.value)) { 
        alert('Hay nhap dia chi email hop le.');
        email.focus; 
        grecaptcha.reset()
        return false;
    }
}

function checkPassRe(){
    if($('#pass').val() !==  $('#re_pass').val()){
        alert('Hãy nhập đúng mật khẩu!!!!');
        $('#re_pass').val('');
        grecaptcha.reset()
        return false;
    }
}

function xuLyAjax(){
    $.ajax({
        url: './xuLyPHP/dangKiPhp.php',
        type: 'POST',
        dataType: 'json',
        data: {
            name : $('#name').val(),
            email : $('#email').val(),
            pass : $('#pass').val(),
            recatpcha : grecaptcha.getResponse(jQuery('.g-recaptcha').attr('frmDataSave'))
        },
        success :function(resulf){

            if(resulf['EmailTonTai']){
                alert(resulf['EmailTonTai']);
                grecaptcha.reset();
            }

            if(resulf['recaptchaChuaNhap']){
                alert(resulf['recaptchaChuaNhap']);
                grecaptcha.reset()
            }

            if(resulf['addKhongThanhCong']){
                alert(resulf['addKhongThanhCong']);
                grecaptcha.reset()
            }

            if(resulf['addThanhCong']){
                window.location.assign('./dang-nhap-tieng-viet.php');
            }

        }

    });
}
