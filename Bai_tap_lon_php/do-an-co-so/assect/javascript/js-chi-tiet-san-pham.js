// ẩn đọc thêm
function docthem(){
    var phan_an =document.getElementById('phan-an-di');
    var btn = document.getElementById('btn-xem');

    if(phan_an.style.display==='none')
    {
        phan_an.style.display='block';
        btn.innerHTML='Thu gọn';
    }else{
        phan_an.style.display='none';
        btn.innerHTML='Xem thêm';
    }

}
// mở nav
function openNav() {
    document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}

$(document).ready(function() {
    getInfProduct();
})

function getInfProduct(){
    $("#btnThemSP").click(function(e){
        e.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
            url : url,
            type : "GET",
            dataType : "text",
            // data : {
            //     CategoryID : $CategoryID,
            // },
            success : function( result ) {
                var jsonCode = JSON.parse( result);
                console.log(jsonCode);
                if( jsonCode.noError){
                    alert(jsonCode.noError);
                }
            }
        });
    })
}