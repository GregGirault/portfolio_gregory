document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour fermer le message de succès et ajouter une animation de rotation
    function closeSuccessMessage(event) {
        const closeButton = event.target;
        closeButton.classList.add("rotate-180"); 

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

function autoCloseSuccessMessage() {
    setTimeout(() => {
        closeSuccessMessage();
    }, 5000); 
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

// Ferme automatiquement le message de succès s'il existe
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
            const projectId = this.dataset.projectId; // S'assure que cet ID est bien récupéré
            if (projectId) { // Vérifie que projectId est défini
                toggleProjectArchivedState(projectId, this);
            } else {
                console.error('Erreur: Aucun ID de projet fourni.'); 
            }
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
        icon.className = "fa-solid fa-folder-open text-green-500"; 
        text.textContent = "Désarchiver";
    } else {
        icon.className = "fa-solid fa-archive text-green-500"; 
        text.textContent = "Archiver";
    }

    // Mise à jour de l'état d'archivage dans la cellule "Archivé" avec changement de couleur
    const parentRow = linkElement.closest("tr");
    const archivedCell = parentRow.querySelector(".archived-cell");
    if (archived) {
        archivedCell.innerHTML = '<span class="text-orange-500 font-bold">Oui</span>';
    } else {
        archivedCell.innerHTML = '<span class="text-green-500 font-bold">Non</span>';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const sectionSelect = document.getElementById('section_select');
    sectionSelect.addEventListener('change', function () {
        // Cache tous les conteneurs de champs
        document.querySelectorAll('.section-fields').forEach(function (field) {
            field.style.display = 'none';
        });

        // Affiche le conteneur de champs pour la section sélectionnée
        const selectedValue = sectionSelect.value;
        if (selectedValue) {
            document.getElementById(selectedValue + '_fields').style.display = 'block';
        }
    });
});


const dynamicFieldsContainer = document.getElementById('dynamic_fields');
const sectionSelect = document.getElementById('section_select');

sectionSelect.addEventListener('change', function () {
    const section = this.value;
    dynamicFieldsContainer.innerHTML = ''; // Clear current fields

    switch (section) {
        case 'header':
            addField('Titre du Projet', 'header_titre', 'text');
            break;
        case 'intro':
            addField('Titre Intro', 'intro_titre', 'text');
            addField('Paragraphe Intro', 'intro_contenu', 'textarea');
            addField('Image Intro', 'intro_image', 'file');
            break;
        case 'about':
            addField('Titre À Propos', 'about_titre', 'text');
            addField('Paragraphe À Propos', 'about_contenu', 'textarea');
            
            break;
        case 'features':
            addField('Titre Fonctionnalités', 'features_titre', 'text');
            addField('Contenu Fonctionnalités', 'features_contenu', 'textarea');
            addField('Icone Fonctionnalités', 'features_icon', 'file');
            break;
        case 'galerie':
            addField('ALT Galerie', 'galerie_description', 'textarea');
            addField('Image Galerie', 'galerie_image', 'file');
            break;
        case 'lienURL':
            addField('URL du Bouton', 'lienURL', 'url');
            addField('Titre du Bouton', 'lienURL_titre', 'text');
            addField('Paragraphe du Bouton', 'lienURL_paragraphe', 'textarea');
            break;
        case 'footer':
            addField('texte Footer', 'footer_contenu', 'textarea');
            break;
    }
});

function addField(label, name, type) {
    const wrapper = document.createElement('div');
    wrapper.classList.add('flex', 'flex-col', 'mb-4');

    const labelElement = document.createElement('label');
    labelElement.innerText = label;
    labelElement.classList.add('block', 'text-gray-700', 'text-sm', 'font-bold', 'mb-2');

    let inputElement;
    if (type === 'textarea') {
        inputElement = document.createElement('textarea');
        inputElement.classList.add('shadow', 'appearance-none', 'border', 'rounded', 'w-full', 'py-2', 'px-3', 'text-gray-700', 'leading-tight', 'focus:outline-none', 'focus:shadow-outline');
    } else {
        inputElement = document.createElement('input');
        inputElement.type = type;
        inputElement.classList.add('shadow', 'appearance-none', 'border', 'rounded', 'w-full', 'py-2', 'px-3', 'text-gray-700', 'mb-3', 'leading-tight', 'focus:outline-none', 'focus:shadow-outline');
    }
    inputElement.name = name;
    inputElement.id = name;

    wrapper.appendChild(labelElement);
    wrapper.appendChild(inputElement);

    dynamicFieldsContainer.appendChild(wrapper);
}

document.getElementById('section_select').addEventListener('change', function () {
    var projetId = document.getElementById('projet_id').value;
    var section = this.value;

    if (projetId && section) {
        fetch(`get_content_data.php?projet_id=${projetId}&section=${section}`)
            .then(response => response.json())
            .then(data => {
                // Supposons que vous avez des champs avec des ID spécifiques pour le titre et le contenu
                if (data.titre) {
                    document.getElementById('titre').value = data.titre;
                }
                if (data.contenu) {
                    document.getElementById('contenu').value = data.contenu;
                }
                // Gérez d'autres champs ici comme l'image, etc.
            })
            .catch(error => console.error('Error:', error));
    }


function loadInitialData() {
    // Assurez-vous que cet ID et section existent et sont valides pour votre cas d'utilisation
    let projetId = document.getElementById('projet_id').value;
    let section = document.getElementById('section_select').value;
    if (projetId && section) {
        fetch(`get_content_data.php?projet_id=${projetId}&section=${section}`)
            .then(response => response.json())
            .then(data => {
                if (data.titre) {
                    document.getElementById('titre').value = data.titre;
                }
                if (data.contenu) {
                    document.getElementById('contenu').value = data.contenu;
                }
                // Gérez d'autres champs ici comme l'image, etc.
            })
            .catch(error => console.error('Error:', error));
    }
}
// Appellez loadInitialData à la fin de l'événement DOMContentLoaded
loadInitialData();
});