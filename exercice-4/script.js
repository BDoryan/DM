document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const identifiant = document.getElementById('identifiant');
    const password = document.getElementById('password');
    const email = document.getElementById('email');
    const emailConfirm = document.getElementById('email-confirm');

    form.addEventListener('submit', function(event) {
        let valid = true;
        const errors = [];

        // Vérification de l'identifiant
        if (identifiant.value.trim() === '') {
            valid = false;
            errors.push('L\'identifiant est obligatoire.');
        }

        // Vérification du mot de passe
        if (password.value.length < 6) {
            valid = false;
            errors.push('Le mot de passe doit comporter au moins 6 caractères.');
        }

        // Vérification de l'email
        if (email.value !== emailConfirm.value) {
            valid = false;
            errors.push('Les adresses e-mail doivent correspondre.');
        }

        if (!valid) {
            event.preventDefault(); // Bloque l'envoi du formulaire
            alert(errors.join('\n')); // Affiche les erreurs
        }
    });
});
