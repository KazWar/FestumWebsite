let Spots = []

window.addEventListener('load', async () => {
    
    // get camping sites occupancy from API
    let response = await fetch('../../api/camping-spots.php')
    Spots = await response.json()
    
    if (typeof $('#image').mapster === 'function') {
        $('#image').mapster({
            highlight: true,
            fillColor: 'ff0000',
            fillOpacity: 0.3,
            singleSelect: true,
            stroke: true,
            strokeOpacity: 1,
            strokeWidth: 1,
            fade: true
        });              
    }
    
    let areaElements = document.querySelectorAll('area');
    for (let i=0; i<areaElements.length; i++) {
        let areaElement = areaElements[i];
        areaElement.addEventListener('click', () => {
            selectCampingSite(areaElement.getAttribute('title'));
        });
    }
    

});


function selectSpot(id) {
    if (id) {
        $(`area[alt='${id}']`).mapster('select');
    }
}


function selectCampingSite(id) {
    if (!Spots.some(spot => spot.campingSpotID == id && spot.isTaken)) {
        sessionStorage.setItem('CampingSite', id);
        document.querySelector('#selectedSite').value = id;
    }
    else {
        console.log(`Spot ${id} is already taken`)
    }

}


function getSelectedCampingSite() {
    return document.querySelector("#selectedSite").value;
}

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});