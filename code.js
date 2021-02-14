myID = document.getElementById("menuMainScroll");

const myScrollFunc = function () {
    let y = window.scrollY;
    if (y >= 300) {
        menuMainScroll.className = "menu-scroll show"
    } else {
        menuMainScroll.className = "menu-scroll hide"
    }
};

window.addEventListener("scroll", myScrollFunc);