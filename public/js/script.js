window.onscroll = function() {myScrool()};
function myScrool() {
    var navbar = document.getElementById("myNavbar");
    var navLink = document.getElementById("myNavlink");
    //var dropd = document.getElementById("dropDown")
    if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
        navbar.className = "navbar navbar-expand-lg navbar-dark navbarLanding shadow sticky-top";
        navbar.style = "--bs-bg-opacity: 1;";
    }
    else if (document.body.scrollTop == 0 || document.body.scrollTop < 10) {
      navbar.className = "navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top";
      navbar.style = "--bs-bg-opacity: .4;";
    }
    else {
        navbar.className = navbar.className.replace("navbar navbar-expand-lg navbar-dark bg-light fixed-top shadow sticky-top mt-5", "");
    }
}

// window = function() {hideSearch()};
function hideSearch() {
    var x = document.getElementById("myBtn");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
}

