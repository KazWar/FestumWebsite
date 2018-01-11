function LoadTickets() {
    fetch("../api/tickets.php")                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(tickets => {                  // ... and do something with our articles
            DisplayTickets(tickets)
       });
}

window.addEventListener("load", () => {
   LoadTickets()
});