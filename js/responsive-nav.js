function responsiveNav() {
    console.log("nav clicked");

    var menu = document.getElementById("responsive-menu");
    var underlay = document.getElementById("menu-underlay");

    menu.classList.toggle("hide");
    underlay.classList.toggle("fade");
}

var hamburger = document.getElementById("mobile-hamburger");
var close = document.getElementById("mobile-menu-close");
var underlay = document.getElementById("menu-underlay");

hamburger.addEventListener('click', responsiveNav);
close.addEventListener('click', responsiveNav);
underlay.addEventListener('click', responsiveNav);