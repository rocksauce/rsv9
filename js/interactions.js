jQuery(document, window).ready(function () {
    
    [].forEach.call(document.querySelectorAll('img[loading]'), function(img) {
        img.setAttribute('src', img.getAttribute('src'));
        img.onload = function() {
            img.removeAttribute('loading');
        };
    });
});