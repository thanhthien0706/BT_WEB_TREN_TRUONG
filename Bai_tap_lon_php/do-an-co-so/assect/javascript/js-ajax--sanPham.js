$(document).ready(function() {

    var url = "./xuLyPHP/database_phanTrang.php";
    var categoryID = 1;
    getAllProducts(categoryID,url);
    // chuyenDoi();

});


function getAllProducts($CategoryID, url) {
    $.ajax({
        url : url,
        type : "POST",
        dataType : "text",
        data : {
            CategoryID : $CategoryID,
        },
        success : function( result ) {
            var jsonResult = JSON.parse(result);
            var totalPage = jsonResult.length;
            // console.log( totalPage);

            var limit = 9;
            var minPage= 1;

            var currentPage = Math.ceil( totalPage / limit);
            
            // console.log( currentPage);

            if(currentPage < minPage){
                currentPage = minPage;
            }

            for(var i = 0; i < currentPage; i++){
                $('#pagination').append(
                    `
                        <a href="./xuLyPHP/database_phanTrang.php?ID_page=${i+1}&categories_ID=${$CategoryID}" value="" >${i+1}</a>
                    `
                )
            }

            var checkClick = 1;

            if(checkClick == 1){
                get_phanTrang(limit, './xuLyPHP/database_phanTrang.php?ID_page='+checkClick+'&categories_ID='+$CategoryID);
            }

            $('#pagination a').first().addClass('active');
            $('#pagination a').click(function(e){
                e.preventDefault();
                $('#pagination a.active').removeClass('active');
                $(this).addClass('active');
                var url = $(this).attr('href');
                get_phanTrang(limit, url);
            })

        }
    });
}

function get_phanTrang($limitPage, url) {

    $.ajax({
        url : url,
        type : "GET",
        dataType : "text",
        // data : {
        //     phanTrang : 1,
        // },
        success : function( result ) {

            $('#box-products--render').children().remove();
            $json = JSON.parse( result);

            var totalPage = 0;

            if( $json.Data){
                totalPage =  $json.Data.length;
            }
            // console.log( "totalPage" + totalPage);
            var ID_Parge = 0;

            if( $json.ID_page){
                ID_page = $json.ID_page;
            }

            // console.log( "ID_page" + ID_page);

            var startPage = $limitPage*ID_page - $limitPage; 
            var endPage = $limitPage*ID_page - 1; 

            for( var i = startPage; i <= endPage; i++){
                $('#box-products--render').append(`
                    <a href="./chi-tiet-san-pham-dienthoai.php?IDproduct=${$json.Data[i].productID}" style="text-decoration: none;" class="box--link-sp">
                        <div class="box-tung-san-pham">
                        <div class="box-chua-trong khoang-cach-chung-tung-sanpham">
                            <div class="box-chua-anh">
                                <img src="./assect/img/file_img_server/${$json.Data[i].Image}" alt="">
                            </div>
                        </div>
                        <div class="box-chua-trong khoang-cach-chung-tung-sanpham">
                            <div class="box-chua-text">
                                <p class="tem-san-pham">${$json.Data[i].productsName}</p>
                                <p class="tinh-trang-sp">Còn 5 sản phẩm</p>
                                <p class="gia-san-pham">Giá Từ: <span class="so-tien">${$json.Data[i].productsPrice}đ</span></p>
                                <p><strike>${$json.Data[i].safePrice}đ</strike></p>
                                <p class="tang-kem-sp"><i class="ti-gift"></i>  Giảm giá </p>
                            </div>
                        </div>
                        </div>
                    </a>
                `);
            }
        }
    });

}