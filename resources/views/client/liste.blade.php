<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="icon" type="image/png" href="/asset/img/service-information.png">
    <link rel="stylesheet" href="./asset/css/client.css">
</head>

<body>
    @include('.sidebar.side')
    <div class="container">
        <h1>Liste de vos clients</h1><br><br>
        <div class="table-toolbar">
            <button class="btn-new">Nouveau</button>
            <input type="text" class="search-input" placeholder="Recherche...">
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id_cli }}</td>
                        <td>{{ $client->nom_cli }}</td>
                        <td>{{ $client->tel_cli }}</td>
                        <td>{{ $client->adrs_cli }}</td>
                        <td>{{ $client->email_cli }}</td>
                        <td>
                            <div class="bn1">
                                <button class="up-new" data-client-id="{{ $client->id_cli }}"><img
                                    src="./asset/img/edit.png" alt=""></button>
                            </div>

                            <div class="bn2">
                                <form action="/suppcli/{{ $client->id_cli }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><img src="./asset/img/delete.png" alt=""></button>
                                </form>
                            </div>

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
            <h2>Ajouter un client</h2>
            <form id="addForm" method="POST" action="/ajoutcli/traitement">
                @csrf

                <input type="text" id="id" name="id_cli" style="display: none;">

                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom_cli" required>
                <span id="nomError" class="error"></span>

                <label for="telephone">Téléphone:</label>
                <input type="text" id="telephone" name="tel_cli" required>
                <span id="telephoneError" class="error"></span>

                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adrs_cli" required>
                <span id="adresseError" class="error"></span>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email_cli" required>
                <span id="emailError" class="error"></span>
                <br>
                <button type="submit">Ajouter</button>
            </form>
        </div>
    </div>


    <!-- Popup formulaire de modification -->
    <div class="popup" id="addPopup1">
        <div class="popup-content">
            <button class="close-btn1">&times;</button>
            <h2>Modifier un client</h2>
            <form id="addForm1" method="POST" action="/modifcli/modification">
                @csrf

                <input type="text" id="id1" name="id_cli" style="display: none;">

                <label for="nom">Nom:</label>
                <input type="text" id="nom1" name="nom_cli" required>
                <label for="telephone">Téléphone:</label>
                <input type="text" id="telephone1" name="tel_cli" required>
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse1" name="adrs_cli" required>
                <label for="email">Email:</label>
                <input type="text" id="email1" name="email_cli" required>
                <button type="submit">Modifier</button>
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

    <script src="./asset/js/client.js"></script>
</body>

</html>
