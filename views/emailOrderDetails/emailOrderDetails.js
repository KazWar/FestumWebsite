
window.addEventListener("load", () => {
    
});

function setQRcode() {
    let qrCode = $('431580').qrcode();
    sessionStorage.setItem('qrCode',qrCode);
}

function getQRcode(){
    setQRcode();
    var value = localStorage.getItem('qrCode');
 
    jQuery.post("emailOrderDetails.php", {qrCode: value}, function(data)
    {
      alert("Do something with example.php response");
    }).fail(function()
    {
      alert("Damn, something broke");
    });
}


