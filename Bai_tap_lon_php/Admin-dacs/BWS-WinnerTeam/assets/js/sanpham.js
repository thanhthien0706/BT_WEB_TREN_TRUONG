let anhnho = document.getElementsByClassName('anhnho')
let activeImages = document.getElementsByClassName('active')
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('anhlon').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('Man').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('nhan').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('thanhmai').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('thanhlong').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('bo').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('buoi').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('nho').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('mangcut').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('mangcau').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('saurieng').src = this.src
        
    })
}
for (var i = 0; i < anhnho.length; i++) {
    anhnho[i].addEventListener('mouseover', function () {
        if (activeImages.length > 0) {
            activeImages[0].classList.remove('active')
        }
        this.classList.add('active')
        document.getElementById('dua').src = this.src
    })
}
$(document).ready(function(){
    $('.count').prop('disabled', true);
       $(document).on('click','.plus',function(){
        $('.count').val(parseInt($('.count').val()) + 1 );
    });
    $(document).on('click','.minus',function(){
        $('.count').val(parseInt($('.count').val()) - 1 );
            if ($('.count').val() == 0) {
                $('.count').val(1);
            }
        });
 });
 function zoom(e) {
    var zoomer = e.currentTarget;
    e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
    e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
    x = offsetX / zoomer.offsetWidth * 100
    y = offsetY / zoomer.offsetHeight * 100
    zoomer.style.setProperty('--bg-x', x + '%');
    zoomer.style.setProperty('--bg-y', y + '%');
}