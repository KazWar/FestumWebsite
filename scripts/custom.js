$(document).ready(function () {
    var containers = $('.thumbnail-container', '.product-list');
    
    containers.on('mouseover', function () {
        var img = $('.thumbnail-image', this);
        $(this).css('height', img.height() + 'px');
    });
    
    containers.on('mouseout', function () {
        $(this).css('height', '150px');
    });
});

function openNav() {
    document.getElementById("PopUpOverlay").style.display = "block";
    document.getElementById("loginPopUp").style.display = "block";
}

function closeNav() {
    document.getElementById("PopUpOverlay").style.display = "none";
    document.getElementById("loginPopUp").style.display = "none";
}

function navigate(){
    location.href="logout.php";
}

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};

function getQueryParameter(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}