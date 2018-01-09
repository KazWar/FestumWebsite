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

function getAmount(){
    return document.getElementById("inputAmount").value;
}
