    // Fonction pour exporter la base de données
    function exporterBaseDeDonnees() {
        // Redirection vers l'URL de l'exportation de la base de données
        window.location.href = "{{ route('export.database') }}";
    }

    // Sélectionner le bouton d'exportation
    const btnExport = document.querySelector('.btn-new0');

    // Ajouter un écouteur d'événements au clic sur le bouton
    btnExport.addEventListener('click', exporterBaseDeDonnees);