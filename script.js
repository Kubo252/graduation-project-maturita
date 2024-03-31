/* slideshow */

var slideIndex = 1;

show_img(slideIndex);

function plusSlides(n){
    show_img(slideIndex += n);
}

function show_img(n){
    var i;
    var img = document.getElementsByClassName("slides");
    if(n > img.length){
        slideIndex = 1;
    }
    if(n < 1){
        slideIndex = img.length;
    }
    for(i = 0; i < img.length; i++){
        img[i].style.display = "none";
    }
    img[slideIndex-1].style.display = "block";
}

function goBack() {
  window.history.back();
}

/* návrat na domovskú stránku po kliknutí na logo */

function logoClick(){
    window.location.href = "index.php";
}

/* zobrazí heslo pri prihlásení */

function showLoginPassword(){
    var x = document.getElementById("l_pswd");

    if (x.type === "password"){
        x.type = "text";
    }
    else{
        x.type = "password";
    }
}

/* zobrazí heslo pri registrácii */

function showRegisterPassword(){
    var x = document.getElementById("r_pswd");
    var y = document.getElementById("re_pswd");

    if (x.type && y.type === "password"){
        x.type = "text";
        y.type = "text";
    }
    else{
        x.type = "password";
        y.type = "password";
    }
}

/* čas */

function refresh() {
    var refresh = 1000; // refreshuje v millisekundách
    setTimeout("time()", refresh);
}
function time() {
    var d = new Date();
    var out = d.getHours() + ":";
    if (d.getMinutes() < 10) {
        out += "0" + d.getMinutes() + ":";
    } else {
        out += d.getMinutes() + ":";
    }
    if (d.getSeconds() < 10) {
        out += "0" + d.getSeconds();
    } else {
        out += d.getSeconds();
    }
    document.getElementById("date").innerHTML = out;
    refresh();
}

/* zrušiť ostránenie priečinka */

function cancel() {
    document.getElementById("myPopup").style.display = "none";
    window.history.back();
}

/* upozornenie potvrdenia zmazania priečinka */

function confirmation() {
    document.getElementById("myPopup").style.display = "block";
}