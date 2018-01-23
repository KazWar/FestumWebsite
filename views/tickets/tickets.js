function LoadTickets() {
    fetch("../../api/tickets.php", { credentials: 'include'})                   // fetch HTTP response from the specified URL
       .then(response => response.json())   // Parse the received response as JSON
       .then(tickets => {                  // ... and do something with our articles
            AddComponents(
                    {
                        tag: "div",
                        className: "container",
                        template: "#ticket-template"
                    },
                    ".product-list",
                    tickets);
            // Hide all buttons for adding tickets to cart,
            // if user not logged in
            if (!UserLoggedIn) {
                let buttons = document.querySelectorAll('.product-list .input-group-btn')
                for (let i=0; i<buttons.length; i++) {
                    buttons[i].style.display = "none"
                }
            }
       });
}


async function addToCart(productID) {
    let amount = 1;
    let ticket = getTicket()
    if (ticket) {
        let url = `../../api/person-add.php?firstName=${ticket.firstName}&lastName=${ticket.lastName}&email=${ticket.email}`;
        let response = await fetch(url, { credentials: 'include'});
        let result = await response.json();

        if (result && result.personID) {
            url = `../../api/cart-add.php?productID=${productID}&amount=${amount}&ownerID=${result.personID}`;
            response = await fetch(url, { credentials: 'include'});
            result = await response.json();
            closeTicketForm()
            if (result.ok) {
                 openTicketAddedForm(3)
            }; 
        }
    }
}

window.addEventListener("load", () => {
   LoadTickets();
});


let Ticket = {
    isOtherOwner: true,
    ticketName: null, 
    ticketID: null,
    firstName: null,
    lastName: null,
    email: null
}
    

function openTicketForm(ticketName, ticketId){
    Ticket.ticketName = ticketName
    Ticket.ticketID = ticketId
    PopulateComponent("#ticketDialog", Ticket)
    document.querySelector("#ticketDialog").style.display = 'block';
    document.querySelector("#lean_overlay").style.display = 'block';
}

function openTicketAddedForm(closeAfter) {
    let form = document.querySelector("#ticketAddedDialog");
    form.style.display = 'block';
    window.setTimeout(() => {
        form.style.display = "none"
        window.location = '../tickets/tickets.php';
    }, closeAfter * 1000)
}


function closeTicketForm() {
    document.querySelector("#ticketDialog").style.display = 'none';
    document.querySelector("#lean_overlay").style.display = 'none';
}


function getTicket() {
    let inputs = document.querySelectorAll("#ticketDialog input")
    for (let i=0; i < inputs.length; i++) {
        let value = undefined
        let input = inputs[i]
        let name = input.getAttribute('name')
        if (input.getAttribute('type') == 'checkbox')
            value = input.checked
        else
            value = input.value
        Ticket[name] = value
    }
    if (!Ticket.isOtherOwner || (Ticket.firstName && Ticket.lastName && Ticket.email))
        return Ticket
}