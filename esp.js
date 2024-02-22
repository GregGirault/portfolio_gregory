// Fonction pour animer le défilement vers le haut de la page
function scrollToTopSmoothly() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Attachez l'écouteur d'événements pour le défilement doux
document.getElementById('scrollToTop').addEventListener('click', function (e) {
    e.preventDefault();
    scrollToTopSmoothly();
});

// Effets d'agrandissement et de pulsation au survol avec JavaScript pour l'icône et le cercle
const icon = document.getElementById('scrollToTop');
const circle = document.getElementById('iconCircle');

// Ajouter une transition douce pour la transformation de l'icône et du cercle
icon.style.transition = 'transform 0.5s ease-in-out';
circle.style.border = '2px solid rgba(255, 255, 255, 0)';
circle.style.transition = 'transform 0.5s ease-in-out, opacity 0.5s ease-in-out';

icon.addEventListener('mouseover', () => {
    icon.style.transform = 'scale(1.15)';
    circle.style.transform = 'scale(1.1)';
    circle.style.border = '2px solid rgba(255, 255, 255, 0.5)';
    const interval = setInterval(() => {
        const isScaledUp = icon.style.transform === 'scale(1.15)';
        icon.style.transform = isScaledUp ? 'scale(1)' : 'scale(1.15)';
        circle.style.transform = isScaledUp ? 'scale(1.05)' : 'scale(1.1)';
    }, 500);

    // Stocker l'intervalle sur l'élément pour le nettoyer plus tard
    icon.dataset.pulseInterval = interval;
});

icon.addEventListener('mouseout', () => {
    // Arrêter l'animation de pulsation
    clearInterval(icon.dataset.pulseInterval);
    icon.style.transform = 'scale(1)';
    circle.style.transform = 'scale(1)';
    circle.style.border = '2px solid rgba(255, 255, 255, 0)'; 
});

// Menu mobile
document.addEventListener('DOMContentLoaded', () => {
    const burgerButton = document.getElementById('burgerMenuButton');
    const burgerMenu = document.getElementById('burgerMenu');

    burgerButton.addEventListener('click', () => {
        if (burgerMenu.style.display === 'none' || burgerMenu.style.display === '') {
            burgerMenu.style.display = 'block';
        } else {
            burgerMenu.style.display = 'none';
        }
    });
});


