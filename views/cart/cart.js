
window.addEventListener("load", () => {
   // check if camping site was selected
   let campingSite = getSelectedCampingSite()
   console.log(campingSite ? `Camping site ${campingSite} selected` : 'No camping site selected')
});