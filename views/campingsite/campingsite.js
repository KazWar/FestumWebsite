window.addEventListener('load', () => {
    if (typeof $('#image').mapster == 'function') {
        $('#image').mapster({
            highlight: true,
            fillColor: 'ff0000',
            fillOpacity: 0.3});              
    }
    
    let areas = document.querySelectorAll('area');
    for (let i=0; i<areas.length; i++) {
        let area = areas[i];
        area.addEventListener('click', () => {
            selectCampingSite(area.getAttribute('title'))
            console.log(`Camping site ${getSelectedCampingSite()} selected`)
        })
    }
});


function selectCampingSite(name) {
    sessionStorage.setItem('CampingSite', name)
}


function getSelectedCampingSite() {
    return sessionStorage.getItem('CampingSite')
}