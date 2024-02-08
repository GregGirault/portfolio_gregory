document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour fermer le message de succès et ajouter une animation de rotation
    function closeSuccessMessage(event) {
        const closeButton = event.target;
        closeButton.classList.add("rotate-180"); // Ajoute une rotation de 180 degrés

        // Attendre la fin de l'animation avant de cacher le message
        closeButton.addEventListener("transitionend", function () {
            closeButton.parentElement.classList.add("hidden");
        }, { once: true }); // L'option { once: true } assure que l'écouteur est supprimé après exécution
    }

    // Ajout d'un gestionnaire d'événements aux boutons de fermeture des messages de succès
    document.querySelectorAll(".close").forEach(btn => {
        btn.addEventListener("click", closeSuccessMessage);
    });
});

// Fonction pour fermer automatiquement le message de succès
function autoCloseSuccessMessage() {
    setTimeout(() => {
        closeSuccessMessage();
    }, 5000); // Fermer après 5 secondes
}

// Fonction pour gérer la suppression du projet avec confirmation
function handleDeleteProject(e) {
    if (!confirm("Êtes-vous sûr de vouloir supprimer ce projet ?")) {
        e.preventDefault();
    }
}

// Ajout d'un gestionnaire d'événements aux boutons de fermeture des messages de succès
const closeButtons = document.querySelectorAll(".close");
closeButtons.forEach(btn => {
    btn.addEventListener("click", closeSuccessMessage);
});

// Ajout d'un gestionnaire d'événements aux liens de suppression de projet avec confirmation
const deleteLinks = document.querySelectorAll(".delete-project-link");
deleteLinks.forEach(link => {
    link.addEventListener("click", handleDeleteProject);
});

// Fermer automatiquement le message de succès s'il existe
autoCloseSuccessMessage();


document.addEventListener("DOMContentLoaded", function () {
    setTimeout(function () {
        const successMessage = document.querySelector('.success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 5000);
});



document.addEventListener("DOMContentLoaded", function () {
    const archiverLinks = document.querySelectorAll(".archiver-link");

    archiverLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();
            const projectId = this.dataset.projectId;
            toggleProjectArchivedState(projectId, this);
        });
    });
});

function toggleProjectArchivedState(projectId, linkElement) {
    const url = `archiver.php?id=${projectId}&ajax=1`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.archived !== undefined) {
                updateArchivedStateUI(linkElement, data.archived);
            }
        })
        .catch(error => console.error('Erreur lors de la mise à jour de l\'état d\'archivage:', error));
}

function updateArchivedStateUI(linkElement, archived) {
    const icon = linkElement.querySelector("i");
    const text = linkElement.querySelector("span");

    // Mise à jour de l'icône et du texte pour Archiver/Désarchiver
    if (archived) {
        icon.className = "fa-solid fa-folder-open text-green-500"; // Icône pour "Désarchivé"
        text.textContent = "Désarchiver";
    } else {
        icon.className = "fa-solid fa-archive text-green-500"; // Icône pour "Archivé"
        text.textContent = "Archiver";
    }

    // Mise à jour de l'état d'archivage dans la cellule "Archivé" avec changement de couleur
    const parentRow = linkElement.closest("tr");
    const archivedCell = parentRow.querySelector(".archived-cell");
    if (archived) {
        archivedCell.innerHTML = '<span class="text-red-500 font-bold">Oui</span>';
    } else {
        archivedCell.innerHTML = '<span class="text-green-400 font-bold">Non</span>';
    }
}

