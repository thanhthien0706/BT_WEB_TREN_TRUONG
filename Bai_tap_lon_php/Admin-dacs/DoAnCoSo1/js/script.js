function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(900)
                // .height(500);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function danglen(){
    alert('đã đăng lên...')
}
function xoa(){
    alert('đã xóa')
}