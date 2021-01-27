var logIn = document.getElementById("login");
var regisTer = document.getElementById("register");
var btn = document.getElementById("btn");

var login_btn = document.getElementById("login_btn");
var register_btn = document.getElementById("register_btn");

function register() {
    logIn.style.left = "-400px";
    regisTer.style.left = "50px";
    btn.style.left = "110px";
    register_btn.style.color = "#eeeeee";
    login_btn.style.color = "#000000";
}

function login() {
    logIn.style.left = "50px";
    regisTer.style.left = "450px";
    btn.style.left = "0";
    register_btn.style.color = "#000000";
    login_btn.style.color = "#eeeeee";
}