$(document).ready(function() {
    chuyenDoi();

    // sử lý xóa thông tin
    xoaSanPham();

    // xóa loại hàng 
    xoaLoaiHang();

    // thêm loại hàng hóa
    themLoaiHang();

    // thêm sản phẩm
    themSanPham();

    // cập nhập và hiện tại
    ajaxChuyenTheLoai($('.name_category_coffee li').first());

});

function chuyenDoi(){
    $('.name_category_coffee li').click(function(e){
        $('.name_category_coffee').find('.active').removeClass('active');
        $(this).addClass('active');
        ajaxChuyenTheLoai($(this))
    });
}

function ajaxChuyenTheLoai( $this ){

    $.ajax({
        url : "../../do-an-co-so/xuLyPHP/database_phanTrang.php",
        type : "POST",
        dataType : "text",
        data : {
            categories_phanTrang: $this.val()
        },
        success : function( result ) {
            var i = 0;

            $arraySanPham = JSON.parse( result);
            var totalPage = $arraySanPham.length;
            console.log( totalPage);

            var limit = 5;
            var minPage= 1;

            var currentPage = Math.ceil( totalPage / limit);
            
            console.log( currentPage);

            if(currentPage < minPage){
                currentPage = minPage;
            }

            $('tr[class=active]').remove();
            $('#paging_ul').children().remove();

            for(var i = 0; i < currentPage; i++){
                $('#paging_ul').append(
                    `
                        <li class="page-item"><a class="page-link" href="../../do-an-co-so/xuLyPHP/database_phanTrang.php?ID_page=${i+1}&categories_ID=${$this.val()}" >${i+1}</a></li>    
                    `
                )
            }

            var checkClick = 1;

            if(checkClick == 1){
                get_phanTrang(limit, '../../do-an-co-so/xuLyPHP/database_phanTrang.php?ID_page='+checkClick+'&categories_ID='+$this.val());
            }

            // add vào trnag đầu
            $('#paging_ul li').first().addClass('active');

            $('a.page-link').click(function(e){
                e.preventDefault();
                $('#paging_ul li.active').removeClass('active');
                $(this).parent().addClass('active');
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

            $('#addNode').children().remove();
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
                    $('#addNode').append(`
                    <tr class="active" id="form_${$json.Data[i].productID}" >
                        <td> ${i+1} </td>
                        <td>${ $json.Data[i].productsCode }</td>
                        <td>${ $json.Data[i].productsName }</td>
                        <td>${ $json.Data[i].productsPrice }</td>s
                        <td><img src="../../do-an-co-so/assect/img/file_img_server/${$json.Data[i].Image}" width="40" height="40" alt=""></td>
                        <td>
                            <form class="formDelete" onclick="xoaSanPham()" >
                                <input type="hidden" name="product_id"
                                       value="${ $json.Data[i].productID }">
                                <input type="hidden" name="category_id"
                                       value="${ $json.Data[i].categoriesID}">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
            
                `);
            }
            

        }
    });

}

function xoaSanPham(){
    $('.formDelete').submit(function(e){
        e.preventDefault();
        $.ajax({
            url : "../../do-an-co-so/xuLyPHP/thongTinPost.php",
            type : "POST",
            dataType : "text",
            data : $(this).serializeArray(),
            success : function( result ) {
                $jsonErr = JSON.parse( result);

                if($jsonErr.notErr){
                    $('#form_'+$jsonErr.notErr).remove();
                }
            }  
        });
    });
}

function xoaLoaiHang(){
    $('.delete_category').submit(function(e){
        e.preventDefault();
        $.ajax({
            url : "../../do-an-co-so/xuLyPHP/thongTinPost.php",
            type : "POST",
            dataType : "text",
            data : $(this).serializeArray(),
            success : function( result ) {
                $jsonErr = JSON.parse( result);

                if($jsonErr.notErr){
                    $('#activeModalList_'+$jsonErr.notErr).remove();
                    $('.name_category_coffee li[value = '+$jsonErr.notErr+']').remove();
                    // location.reload();

                }
            }  
        });
    });
}


function themLoaiHang(){
    $('#add_category_form').submit(function(e){
        e.preventDefault();
        // console.log($(this).serializeArray());
        $.ajax({
            url : "../../do-an-co-so/xuLyPHP/thongTinPost.php",
            type : "POST",
            dataType : "text",
            data : $(this).serializeArray(),
            success : function( result ) {
                $jsonErr = JSON.parse( result);
                if($jsonErr.notErr){
                    console.log("vao dc");
                    $('#addList').append(
                        `
                                <tr id="activeModalList_${$jsonErr.notErr.categoriesID}" >
                                    <td>${$jsonErr.categoriesName}</td>
                                    <td>
                                        <form class="delete_category" onclick="xoaLoaiHang()">
                                            <input type="hidden" name="category_ID"
                                                   value="${$jsonErr.notErr.categoriesID}">
                                            <input type="submit" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                        `
                    );
                    $('.name_category_coffee').append(
                        `
                        <li class="" name="categories" onclick = "chuyenDoi()" value="${$jsonErr.notErr.categoriesID}">${$jsonErr.categoriesName}</li>
                        `
                    )
                      
                }
            }  
        });
        
    });
}

function themSanPham(){
    
    $('#themSanPham').click(function(e){
        e.preventDefault();

        var Category = $('select[name=category_id]').val();
        var Code = $('input[name=product_Code]').val();
        var name = $('input[name=product_Name]').val();
        var Price = $('input[name=list_Price]').val();
        
        var file = $('input[type=file]');
        var fileImage = file[0].files[0];

        var formData = new FormData();
        formData.append('Category', Category);
        formData.append('Code', Code);
        formData.append('name', name);
        formData.append('Price', Price);
        formData.append('file', fileImage);

        // tìm tất cả phần tử con
        var size = $('#addNode').children().length ;

        //sử dụng ajax post
        $.ajax({
            url : "../../do-an-co-so/xuLyPHP/addSanPham.php",
            type : "POST",
            dataType : "text",
            cache: false,
            contentType: false,
            processData: false,
            data : formData , 
            success : function( result ) {
                $json = JSON.parse( result);
                if( $json.notErr){
                    if($('li.active').val() == Category ){
                        $('#addNode ').append(`
                        <tr class="active" id="form_${$json.notErr.productID}" >
                            <td> ${size +1} </td>
                            <td>${ Code }</td>
                            <td>${name}</td>
                            <td>${ Price}</td>
                            <td><img src="../../do-an-co-so/assect/img/file_img_server/${ $json.nameImg}" width="40" height="40" alt=""></td>
                            <td>
                                <form class="formDelete" onclick="xoaSanPham()" >
                                    <input type="hidden" name="product_id"
                                           value="${$json.notErr.productID}">
                                    <input type="hidden" name="category_id"
                                           value="${ Category}">
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>

                    `);
                    }
                    
                }
            }  
        });
        
        
    })
}

