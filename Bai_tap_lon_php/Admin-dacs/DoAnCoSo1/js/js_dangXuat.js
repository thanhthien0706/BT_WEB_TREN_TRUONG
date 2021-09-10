$(document).ready(function() {
    $('#DangXuat').click(function() {
        xuLyAjaxDangXuat();
    });
});

function xuLyAjaxDangXuat(){
    $.ajax({
        url : "../../do-an-co-so/xuLyPHP/dangxuat.php",
        type : "POST",
        dataType : "text",
        data : {
            requestId : "dangXuat"
        },
        success : function( result ) {
            window.location.assign(result);
        }
    });
}