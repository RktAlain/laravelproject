<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Facture</title>
    <link rel="icon" type="image/png" href="/asset/img/service-information.png">
    <link rel="stylesheet" href="./asset/css/facturelist.css">
</head>

<body>
    @include('.sidebar.side')
    <div class="container">
        <h1>Facture passé récemment</h1><br><br>
        <div class="table-toolbar">
            <button class="btn-new">Nouvelle</button>
            <input type="text" class="search-input" placeholder="Recherche...">
            <button type="button" class="btn-new1" id="openPopup">Faire une facture</button>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Nom et Prénom(s)</th>
                    <th style="display: none">Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factures as $facture)
                    <tr>
                        <td>{{ $facture->id_fact }}</td>
                        <td>{{ $facture->id_cli }}</td>
                        <td>
                            @foreach ($clients as $client)
                                @if ($client->id_cli == $facture->id_cli)
                                    {{ $client->nom_cli }}
                                @endif
                            @endforeach
                        </td>
                        <td class="emailCell" style="display: none">
                            @foreach ($clients as $client)
                                @if ($client->id_cli == $facture->id_cli)
                                    {{ $client->email_cli }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <button class="btn" type="submit" id="openPopup1"><img src="./asset/img/email.gif" alt=""></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Popup formulaire d'ajout -->
    <div class="popup" id="addPopup">
        <div class="popup-content">
            <button class="close-btn">&times;</button>
            <h2>Ajouter une facture</h2>
            <form id="addForm" method="POST" action="/ajoutfact/traitement">
                @csrf

                <input type="text" id="id" name="id_fact" style="display: none;">

                <label for="client">Client n°:</label>
                <input type="text" id="client" name="id_cli" required>
                <span id="clientError"></span><br>
                <button type="submit">Ajouter</button>
            </form>
        </div>
    </div>

    <!-- Formulaire Popup numero -->
    <div class="popup" id="addPopup1">
        <div class="popup-content">
            <button class="close-btn1">&times;</button>
            <h2>Entrer le numéro du client</h2>
            <form id="addForm1" action="./facture" method="get">
                <label for="id_cli">Client numéro :</label>
                <input type="text" id="id_cli" name="id_cli"  required>
                <span id="idError"></span><br><br>
                <a class="btn-new" href="#" id="searchLink">Valider</a>
            </form>

        </div>
    </div>

    <!-- Formulaire Popup Email -->
    <div class="popup" id="addPopup2">
        <div class="popup-content">
            <button class="close-btn2">&times;</button>
            <h2>Envoyer une confirmation</h2>
            <form id="addForm2" action="/email" method="post">
                @csrf
                <label for="email_cli">Email :</label>
                <input type="text" id="emCli" name="email_cli" required>
                
                <label for="objet">Objet :</label>
                <input type="text" id="objet" name="objet" value="Commande en ligne" readonly>
                
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="4" readonly>Chers clients,
Votre commande auprès de notre service a été traitée avec succès.
Vous pouvez la récupérer à partir de nos heures d'ouverture.
Merci pour votre confiance!
                </textarea>
                <button class="btn-new" type="submit">Valider</button>
            </form>
        </div>
    </div>

    @if (session('status'))
        <div class="statut">
            <div class="popup-content">
                <div class="success">
                    <img src="./asset/img/Successfully_Done.gif" alt="">
                </div>
                <h2>{{ session('status') }}</h2>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="statut">
            <div class="popup-content">
                <div class="success">
                    <img src="./asset/img/error.gif" alt="">
                </div>
                <h2>{{ session('error') }}</h2>
            </div>
        </div>
    @endif
        
    <script src="./asset/js/facturelist.js"></script>
</body>

</html>
