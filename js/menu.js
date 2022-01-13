jQuery("#hide_no_resulsts").hide();
jQuery(document, window).ready(function () {
    if(window.location.pathname != "/") {
        let main_menu = document.querySelector("#top-menu");  
            main_menu.classList.remove("text-link__hover");
    }
});