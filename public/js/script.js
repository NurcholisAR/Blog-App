const bar_btn = document.getElementById("BAR_BTN");
const mobileMenu = document.getElementById("mobileMenu");

bar_btn.addEventListener("click", function () {
    mobileMenu.classList.toggle("transform");
    mobileMenu.classList.toggle("hidden");
});

$(window).on("scroll", function () {
    var menu_area = $("#navbar");
    if ($(window).scrollTop() > 20) {
        menu_area.addClass("sticky_nav");
    } else {
        menu_area.removeClass("sticky_nav");
    }
});
