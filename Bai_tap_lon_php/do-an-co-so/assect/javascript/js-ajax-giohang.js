$(document).ready(function() {
    changeSoLuong();
    orderProduct();
    checkStatus();
    huyDonHang();
    tongSoDonHang();
});

function changeSoLuong(){
    $('.inputSoLuongSP').change(function(e){
        e.preventDefault();
        var url = "./xuLyPHP/capNhatGioHang.php";
        var objSoLuong = {
            valueSoLuong : $(this).val(),
            IDGiaTri : $(this).attr("IDGiaTri"),
        }
        sendAjaxRequest(url ,objSoLuong );
    })
}

function orderProduct(){
    $('.btn-thanh-toan').click(function(){
        var arrayList = $('input[checked]');
        var newarray = [];
        for (var i = 0; i < arrayList.length; i++) {
            newarray.push($(arrayList[i]).val());
        }
        var json = JSON.stringify(newarray);
        // console.log(json);
        var url = "./xuLyPHP/capNhatGioHang.php";
        var objList = {
            arrayListProduct : json,
            IDuser : $(this).val(),
        }
        sendAjaxRequest(url, objList);
    });
}

function checkStatus(){
    $('.checkboxXacNhan').change(function(e){
        // console.log([$(this)]);
        if($(this)[0].checked){
            var url = "./xuLyPHP/capNhatGioHang.php";
            var objcheck = {
                checkStatus : 1,
                checkID: $(this).val(),
            }
            sendAjaxRequest(url, objcheck );
            // console.log("Đã check");
            tongSoDonHang()
        }else{
            var url = "./xuLyPHP/capNhatGioHang.php";
            var objcheck = {
                checkStatus : 0,
                checkID: $(this).val(),
            }
            sendAjaxRequest(url, objcheck );
            // console.log("chưa check")
            tongSoDonHang()
        }
    })
}

function huyDonHang(){
    $('.huyDonHang').click(function(e){
        e.preventDefault();
        var url = "./xuLyPHP/capNhatGioHang.php";
        var objHuy = {
            IDuserHuy : $(this).val(),
        }
        sendAjaxRequest(url, objHuy);
        tongSoDonHang()
    });
}

function tongSoDonHang(){
    if($('.checkboxXacNhan').checked){
        console.log("đà check")
    }
    // var soLuong = $('.inputSoLuongSP').val();
    // var tong = arrayList.length;
    // if(tong == 0){
    //     tongSoSanPhan.append('0');
    // }else{
        // $('#tongSoSanPhan').text(tong);
    // }

    console.log($('.inputSoLuongSP').val());
}

function sendAjaxRequest(url , dataRequest ){
    $.ajax({
        url : url,
        type : "POST",
        dataType : "text",
        data : dataRequest ,
        success : function( result ) {
            var jsoncode = JSON.parse( result);
            if(jsoncode.huyThanhCong){
                alert(jsoncode.huyThanhCong);
                // break;
            } 
            if(jsoncode.capNhat){
                alert(jsoncode.capNhat);
                // break;
            }   
            location.reload();
        }
    });
}