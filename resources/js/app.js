import './bootstrap';

// resources/js/app.js

// Exemple de fonction pour afficher une alerte de confirmation lors de la soumission d'un formulaire
document.addEventListener('DOMContentLoaded', function () {
    const reservationForm = document.querySelector('form[action*="reserver"]');
    const modifierForm = document.querySelector('form[action*="modifier"]');

    if (reservationForm) {
        reservationForm.addEventListener('submit', function (e) {
            const confirmReservation = confirm('Êtes-vous sûr de vouloir réserver cette place ?');
            if (!confirmReservation) {
                e.preventDefault();
            }
        });
    }

    if (modifierForm) {
        modifierForm.addEventListener('submit', function (e) {
            const confirmModification = confirm('Êtes-vous sûr de vouloir modifier votre compte ?');
            if (!confirmModification) {
                e.preventDefault();
            }
        });
    }
});

// Exemple de fonction pour gérer les alertes de succès et d'erreur
function handleAlerts() {
    const successAlert = document.querySelector('.alert-success');
    const dangerAlert = document.querySelector('.alert-danger');

    if (successAlert) {
        setTimeout(() => {
            successAlert.style.display = 'none';
        }, 3000); // Cache l'alerte après 3 secondes
    }

    if (dangerAlert) {
        setTimeout(() => {
            dangerAlert.style.display = 'none';
        }, 3000); // Cache l'alerte après 3 secondes
    }
}

handleAlerts();
