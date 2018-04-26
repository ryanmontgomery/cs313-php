function navResponsive() {
    var x = document.getElementById("con-top-nav");
    if (x.className === "top-nav") {
        x.className += " responsive";
    } else {
        x.className = "top-nav";
    }
}