function openNav() {
    document.getElementById("mySidepanel").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}


// kiểm tra email
var input_email = document.getElementById('id-email');
input_email.oninvalid = function(event) {
  event.target.setCustomValidity('Bạn phải nhập đúng định dạng của email!!!');
}

// kiểm tra sdt
var input_email = document.getElementById('in-put-sdt');
input_email.oninvalid = function(event) {
  event.target.setCustomValidity('Bạn phải nhập đúng số điện thoại');
}