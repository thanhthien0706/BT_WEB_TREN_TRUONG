function openNav() {
    document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}


// ẩn hiện phầm lựa chọn

function anhiensanpham(id){
    var id_sanpham = document.getElementById(id);
    
    if( id_sanpham.style.display==='none'){
        id_sanpham.style.display='block';
    }else{
        id_sanpham.style.display='none';
    }

}

// ẩn hiệu thanh lọc

function openThanhLoc() {
    document.getElementById("thanhLoc").style.maxWidth= "100%";
}

function closeThanhLoc() {
  document.getElementById("thanhLoc").style.maxWidth = "0%";
}