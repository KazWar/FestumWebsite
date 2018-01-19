window.addEventListener('load', () => {
    if (typeof $('#image').mapster === 'function') {
        $('#image').mapster({
            highlight: true,
            fillColor: 'ff0000',
            fillOpacity: 0.3,
            singleSelect: true,
            stroke: true,
            strokeOpacity: 1,
            strokeWidth: 1,
            fade: true}
                
        );              
    }
    
    let areas = document.querySelectorAll('area');
    for (let i=0; i<areas.length; i++) {
        let area = areas[i];
        area.addEventListener('click', () => {
            selectCampingSite(area.getAttribute('title'));
        });
    }
    
    
});


function selectCampingSite(name) {
    sessionStorage.setItem('CampingSite', name);
    document.querySelector('#selectedSite').value = name;
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