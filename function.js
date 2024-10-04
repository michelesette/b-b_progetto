document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Impedisce il comportamento predefinito del form

    const formData = new FormData(this);

    fetch('send-email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('responseMessage').innerHTML = data; // Mostra la risposta
    })
    .catch(error => {
        document.getElementById('responseMessage').innerHTML = "Si è verificato un errore.";
        console.error('Error:', error);
    });
});