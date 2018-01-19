function MailContactForm() {
  let name = document.querySelector('#name').value;
  let phoneNumber = document.querySelector('#phoneNumber').value;
  let subject = document.querySelector('#emailSubject').value;
  let message = document.querySelector('#emailBody').value;
  
  let body = `Name: ${name}<br>` + 
             `E-mail: ${email}<br>`;
  let form = new FormData();
  
  form.set("subject", `Contact request from ${name}, regarding ${subject}`);
  form.set("body", body);
  fetch('../../api/mail-send.php', { method: 'POST', body: form, credentials: 'include' })
      .then(response => response.json())
      .then(result => {
          window.location = 'contactFormSubmitted.php';
      });    
}
