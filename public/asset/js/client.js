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


//------------------------

//Popupp1
const addPopup1 = document.getElementById("addPopup1");

// Cacher le popup lorsque l'utilisateur clique sur le bouton de fermeture
const closeBtn1 = document.querySelector(".close-btn1");
closeBtn1.addEventListener("click", function () {
    addPopup1.style.display = "none";
    location.reload();
});

// Cacher le popup lorsque l'utilisateur clique en dehors de celui-ci
window.addEventListener("click", function (event) {
    if (event.target === addPopup1) {
        addPopup1.style.display = "none";
        location.reload();
    }
});

// Afficher le popup1 lorsque le bouton "afficher" est cliqué
upNew.addEventListener("click", function () {
    addPopup1.style.display = "block";
});

// Récupérer les données du client via une requête AJAX
function fetchClientData(clientId) {
    fetch('/Affichecli/' + clientId)
        .then(response => response.json())
        .then(data => {
            // Insérer les données récupérées dans le formulaire
            document.getElementById('id1').value = data.id_cli;
            document.getElementById('nom1').value = data.nom_cli;
            document.getElementById('telephone1').value = data.tel_cli;
            document.getElementById('adresse1').value = data.adrs_cli;
            document.getElementById('email1').value = data.email_cli;

            // Afficher le popup
            addPopup1.style.display = 'block';
        })
        .catch(error => console.error('Erreur :', error));
}

// Écouteur d'événement pour le bouton "Afficher"
document.addEventListener("DOMContentLoaded", function () {
    var showButtons = document.querySelectorAll('.up-new');
    showButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var clientId = this.dataset.clientId;
            fetchClientData(clientId);
        });
    });
});

// Écouteur d'événement pour le bouton de fermeture du popup
document.addEventListener("DOMContentLoaded", function () {
    var closeButton = document.querySelector('.close-btn');
    closeButton.addEventListener('click', function () {
        document.getElementById('addForm1').style.display = 'none';
    });
});

//Recherche
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('.search-input');
    const rows = document.querySelectorAll('. tbody tr');

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

// Ferme le message après 7 secondes
setTimeout(function () {
    document.querySelector('.statut').style.display = 'none';
}, 3000);


// Fonction pour valider le nom (accepte seulement les lettres)
function validateNom() {
    const nomInput = document.getElementById('nom');
    const nomError = document.getElementById('nomError');
    const nomRegex = /^[a-zA-Z\s]*$/;
    if (!nomRegex.test(nomInput.value)) {
        nomError.textContent = 'Nom invalide. Veuillez utiliser seulement des lettres.';
        nomInput.classList.add('error-input');
        return false;
    } else {
        nomError.textContent = '';
        nomInput.classList.remove('error-input');
        return true;
    }
}

// Fonction pour valider le nom (accepte seulement les lettres)
function validateNom() {
    const nomInput = document.getElementById('nom');
    const nomError = document.getElementById('nomError');
    const nomRegex = /^[a-zA-Z\s]*$/;
    if (!nomRegex.test(nomInput.value)) {
        nomError.textContent = 'Nom invalide';
        nomInput.classList.add('error-input');
        return false;
    } else {
        nomError.textContent = '';
        nomInput.classList.remove('error-input');
        return true;
    }
}

// Fonction pour valider le numéro de téléphone
function validateTelephone() {
    const telephoneInput = document.getElementById('telephone');
    const telephoneError = document.getElementById('telephoneError');
    const telephoneRegex = /^(032|033|034|037|038)\d{7}$/;
    if (!telephoneRegex.test(telephoneInput.value)) {
        telephoneError.textContent = 'Numéro de téléphone invalide';
        telephoneInput.classList.add('error-input');
        return false;
    } else {
        telephoneError.textContent = '';
        telephoneInput.classList.remove('error-input');
        return true;
    }
}

// Validation de l'email (vous pouvez ajouter la validation de l'email si nécessaire)
function validateEmail() {
    const emailInput = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Adresse email invalide';
        emailInput.classList.add('error-input');
        return false;
    } else {
        emailError.textContent = '';
        emailInput.classList.remove('error-input');
        return true;
    }
}

// Ajout d'événements input aux champs pour la validation automatique
document.getElementById('nom').addEventListener('input', validateNom);
document.getElementById('telephone').addEventListener('input', validateTelephone);
document.getElementById('email').addEventListener('input', validateEmail);


//empecher la validation
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("addForm");

    form.addEventListener("submit", function(event) {
        var errors = document.querySelectorAll(".error");
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

