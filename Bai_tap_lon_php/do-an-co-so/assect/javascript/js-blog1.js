window.onscroll = function() {
    dinhLenTren()
};

// mở nav
function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    // document.getElementById("main").style.marginRight = "250px";
    document.getElementById("mySidebar").style.zIndex="333";
}

// tắt nav
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
//   document.getElementById("main").style.marginRight= "0";
}

window.onscroll = function() {
    dinhLenTren()
    dinhLenTren1()
};

function dinhLenTren(){
    var nav = document.getElementById('nav');
    if(document.body.scrollTop>290 || document.documentElement.scrollTop > 290){
        nav.style.position="fixed";
        nav.style.top=0;
        nav.style.left=0;
        nav.style.right=0;
        // nav.style.backgroundColor="#000";
        nav.style.zIndex='222';
    }else{
        nav.style.position=null;
        // nav.style.backgroundColor="#A4A4A4";
    }
}

function dinhLenTren1(){
    var nav = document.getElementById('nav1');
    if(document.body.scrollTop>290 || document.documentElement.scrollTop > 290){
        nav.style.position="fixed";
        nav.style.top=0;
        nav.style.left=0;
        nav.style.right=0;
        // nav.style.backgroundColor="#000";
        nav.style.zIndex='222';
    }else{
        nav.style.position=null;
        // nav.style.backgroundColor="#A4A4A4";
    }
}


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("iteam__nav1").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.menu__nav1')) {
    var dropdowns = document.getElementsByClassName("nav_mobile1");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

// ẩn hiện

function anHien(id) {
    var click = document.getElementById("click");
    var apear = document.getElementById(id);
  
    if (apear.style.display === "none") {
        apear.style.display=("block");
    } else {
      apear.style.display = "none";
    }
}