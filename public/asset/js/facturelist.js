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

// Sélectionner le bouton "Faire une facture" et le popup numéro
const btnNew1 = document.querySelector(".btn-new1");
const upNew1 = document.querySelector(".up-new1");
const addPopup1 = document.getElementById("addPopup1");

// Afficher le popup numéro lorsque le bouton "Faire une facture" est cliqué
btnNew1.addEventListener("click", function () {
    addPopup1.style.display = "block";
});




// Sélectionner tous les boutons email
const btnEmails = document.querySelectorAll(".btn");

// Sélectionner le popup
const addPopup2 = document.getElementById("addPopup2");

// Sélectionner l'input email dans le popup
const emailInput = document.getElementById("emCli");

// Fonction pour afficher le popup avec l'email
function afficherPopupAvecEmail(email) {
    // Mettre à jour la valeur de l'input email dans le formulaire popup avec l'email fourni
    emailInput.value = email;

    // Afficher le popup
    addPopup2.style.display = "block";
}

// Ajouter un écouteur d'événements à chaque bouton email
btnEmails.forEach(function (btn) {
    btn.addEventListener("click", function () {
        // Trouver l'élément td contenant l'email en remontant dans la hiérarchie DOM
        const emailCell = this.parentNode.previousElementSibling;

        // Récupérer le contenu de l'élément td contenant l'email
        const email = emailCell.textContent.trim();

        // Appeler la fonction pour afficher le popup avec l'email récupéré
        afficherPopupAvecEmail(email);
    });
});






// Cacher le popup numéro lorsque l'utilisateur clique sur le bouton de fermeture
const closeBtn2 = document.querySelector(".close-btn2");
closeBtn2.addEventListener("click", function () {
    addPopup2.style.display = "none";
});

// Cacher le popup numéro lorsque l'utilisateur clique en dehors de celui-ci
window.addEventListener("click", function (event) {
    if (event.target === addPopup2) {
        addPopup2.style.display = "none";
    }
});


// Cacher le popup numéro lorsque l'utilisateur clique sur le bouton de fermeture
const closeBtn1 = document.querySelector(".close-btn1");
closeBtn1.addEventListener("click", function () {
    addPopup1.style.display = "none";
});

// Cacher le popup numéro lorsque l'utilisateur clique en dehors de celui-ci
window.addEventListener("click", function (event) {
    if (event.target === addPopup1) {
        addPopup1.style.display = "none";
    }
});

//Recherche facture
document.getElementById('searchLink').addEventListener('click', function() {
    var id_cli = document.getElementById('id_cli').value;
    window.location.href = './facture/' + id_cli;
});

// Ferme le message après 7 secondes
setTimeout(function () {
    document.querySelector('.statut').style.display = 'none';
}, 5000);

//Recherche
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('.search-input');
    const rows = document.querySelectorAll('.data-table tbody tr');

    searchInput.addEventListener('input', function () {
        const searchText = this.value.toLowerCase();

        rows.forEach(row => {
            const nameColumn = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            if (nameColumn.includes(searchText)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

// Fonction de validation pour le champ id_cli
document.getElementById('id_cli').addEventListener('input', function () {
    var idInput = document.getElementById('id_cli');
    var idError = document.getElementById('idError');
    if (!/^\d+$/.test(idInput.value)) {
        idError.textContent = 'Le numero doit être un nombre.';
    } else {
        idError.textContent = '';
    }
});

// Fonction de validation pour le champ client
document.getElementById('client').addEventListener('input', function () {
    var clientInput = document.getElementById('client');
    var clientError = document.getElementById('clientError');
    if (!/^\d+$/.test(clientInput.value)) {
        clientError.textContent = 'Le numero doit être un nombre.';
    } else {
        clientError.textContent = '';
    }
});





