// Menu mobile toggle
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('#menu-toggle');
    const mobileMenu = document.querySelector('#mobile-menu');

    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('transition-height', 'duration-500', 'ease-in-out');
        });
    }

    // Gestion de la soumission du formulaire de contact
    const contactForm = document.querySelector('#contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Empêche l'envoi du formulaire par défaut

            // Validation des champs du formulaire
            const name = document.querySelector('[name="name"]').value;
            const email = document.querySelector('[name="email"]').value;
            const message = document.querySelector('[name="message"]').value;

            if (!name || !email || !message) {
                alert('Veuillez remplir tous les champs.');
                return false; // Arrête l'exécution si la validation échoue
            }

            // Préparation des données du formulaire pour l'envoi
            const formData = new FormData(contactForm);
            const url = contactForm.getAttribute('action'); // L'URL vers laquelle le formulaire doit être envoyé

            // Envoi du formulaire via AJAX
            fetch(url, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json()) // Supposons que le serveur répond avec JSON
                .then(data => {
                    console.log(data); // Traitez la réponse du serveur ici
                    if (data.success) {
                        alert('Message envoyé avec succès !');
                        contactForm.reset(); // Réinitialiser le formulaire après l'envoi réussi
                    } else {
                        alert('Il y a eu un problème avec l\'envoi de votre message. Veuillez réessayer.');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Erreur lors de l\'envoi du message.');
                });
        });
    }
});
