// Voorkom scrollen met de pijltjestoetsen
window.addEventListener("keydown", function(e) {
    // Controleer of de ingedrukte toets een pijltjestoets is

    if([37, 38, 39, 40].includes(e.keyCode)) {
        // Controleer of de gebruiker al aan de onderkant van de pagina is
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            return; // Sta scrollen toe als de gebruiker al aan de onderkant is
        }
        e.preventDefault(); // Voorkom het standaardgedrag van de toets
    }
}, false);
