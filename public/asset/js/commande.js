// Sélectionner le bouton "Nouveau" et le popup
const btnNew = document.querySelector(".btn-new");
const upNew = document.querySelector(".up-new");
const addPopup = document.getElementById("addPopup");

// Afficher le popup lorsque le bouton "Nouveau" est cliqué
btnNew.addEventListener("click", function () {
    addPopup.style.display = "block";
});

// Cacher le popup lorsque l'utilisateur clique sur le bouton de fermeture
const closeBtn = document.querySelector(".close-btn");
closeBtn.addEventListener("click", function () {
    addPopup.style.display = "none";
    location.reload();
});

// Cacher le popup lorsque l'utilisateur clique en dehors de celui-ci
window.addEventListener("click", function (event) {
    if (event.target === addPopup) {
        addPopup.style.display = "none";
        location.reload();
    }
});




document.getElementById('code_cmd').addEventListener('change', function () {
    var code = this.value;
    var designation = document.getElementById('designation');

    switch (code) {
        case 'IMPA4C':
            designation.value = 'Impression A4 couleur';
            break;
        case 'IMPA4N':
            designation.value = 'Impression A4 noir';
            break;
        case 'IMPA3N':
            designation.value = 'Impression A3 noir';
            break;
        case 'IMPA3C':
            designation.value = 'Impression A3 couleur';
            break;
        case 'RELM100':
            designation.value = 'Reliure moins de 100 pages';
            break;
        case 'RELP100':
            designation.value = 'Reliure plus de 100 pages';
            break;
        case 'SC':
            designation.value = 'Scan';
            break;
        case 'PL':
            designation.value = 'Plastification';
            break;
        // Ajoutez d'autres cas selon vos besoins
        default:
            designation.value = '';
            break;
    }
});


document.getElementById('code_cmd').addEventListener('change', function () {
    var code1 = this.value;
    var prix = document.getElementById('prix');

    switch (code1) {
        case 'IMPA4C':
            prix.value = '300';
            break;
        case 'IMPA4N':
            prix.value = '100';
            break;
        case 'IMPA3N':
            prix.value = '1000';
            break;
        case 'IMPA3C':
            prix.value = '400';
            break;
        case 'RELM100':
            prix.value = '3000';
            break;
        case 'RELP100':
            prix.value = '5000';
            break;
        case 'SC':
            prix.value = '300';
            break;
        case 'PL':
            prix.value = '1000';
            break;
        // Ajoutez d'autres cas selon vos besoins
        default:
            prix.value = '';
            break;
    }
});

// Ferme le message après 7 secondes
setTimeout(function () {
    document.querySelector('.statut').style.display = 'none';
}, 5000);


// Fonction de validation pour le champ client
document.getElementById('client').addEventListener('input', function () {
    var clientInput = document.getElementById('client');
    var clientError = document.getElementById('clientError');
    if (!/^\d+$/.test(clientInput.value)) {
        clientError.textContent = 'Le numéro de client doit être un nombre.';
    } else {
        clientError.textContent = '';
    }
});

// Fonction de validation pour le champ quantité
document.getElementById('quantite').addEventListener('input', function () {
    var quantiteInput = document.getElementById('quantite');
    var quantiteError = document.getElementById('quantiteError');
    if (!/^\d+$/.test(quantiteInput.value)) {
        quantiteError.textContent = 'La quantité doit être un nombre.';
    } else {
        quantiteError.textContent = '';
    }
});

//Recherche
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('.search-input');
    const rows = document.querySelectorAll('.data-table tbody tr');

    searchInput.addEventListener('input', function () {
        const searchText = this.value.toLowerCase();

        rows.forEach(row => {
            let found = false;
            for (let i = 1; i <= 3; i++) { // Boucle sur les colonnes 2, 3 et 4
                const columnText = row.querySelector(`td:nth-child(${i + 1})`).textContent.toLowerCase();
                if (columnText.includes(searchText)) {
                    found = true;
                    break; // Si la correspondance est trouvée dans l'une des colonnes, sortir de la boucle
                }
            }
            if (found) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

//Empecher la validation
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("addForm");

    form.addEventListener("submit", function(event) {
        var errors = document.querySelectorAll(".error-message");
        var hasErrors = false;

        errors.forEach(function(error) {
            if (error.textContent.trim() !== "") {
                hasErrors = true;
            }
        });

        if (hasErrors) {
            event.preventDefault(); // Empêche la soumission du formulaire
        }
    });
});

