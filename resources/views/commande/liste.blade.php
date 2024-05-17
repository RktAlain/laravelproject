<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link rel="icon" type="image/png" href="/asset/img/service-information.png">
    <link rel="stylesheet" href="./asset/css/commande.css">
</head>

<body>
    @include('.sidebar.side')
    <div class="container">
        <h1>Commande passé récemment</h1><br><br>
        <div class="table-toolbar">
            <button class="btn-new">Nouvelle commande</button>
            <input type="text" class="search-input" placeholder="Recherche...">
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
                    <th>Code</th>
                    <th>Désignation</th>
                    <th>Prix Unitaire (MGA)</th>
                    <th>Quantité</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($commandes as $commande)
                    <tr>
                        <td>{{ $commande->id_cmd }}</td>
                        <td>{{ $commande->id_cli }}</td>
                        <td>{{ $commande->code_cmd }}</td>
                        <td>{{ $commande->desg}}</td>
                        <td>{{ $commande->prix }}</td>
                        <td>{{ $commande->qte }}</td>
                        <td>{{ $commande->date }}</td>
                        <td>
                            {{-- <button class="up-new" data-commande-id="{{ $commande->id_cmd }}">Email</button> --}}

                            <form action="/suppcmd/{{ $commande->id_cmd }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><img src="./asset/img/delete.png" alt=""></button>
                            </form>
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
            <h2>Ajouter une commande</h2>
            <form id="addForm" method="POST" action="/ajoutcmd/traitement">
                @csrf

                <input type="text" id="id" name="id_cmd" style="display: none;">

                <label for="client">Client n°:</label>
                <input type="text" id="client" name="id_cli">
                <span id="clientError" class="error-message"></span>
                <label for="code_cmd">Code commande:</label>
                <select id="code_cmd" name="code_cmd">sélectionner le code
                    <option value="IMPA4C">IMPA4C</option>
                    <option value="IMPA4N">IMPA4N</option>
                    <option value="IMPA3C">IMPA3C</option>
                    <option value="IMPA3N">IMPA3N</option>
                    <option value="RELM100">RELM100</option>
                    <option value="RELP100">RELP100</option>
                    <option value="SC">SC</option>
                    <option value="PL">PL</option>
                    <!-- Ajoutez d'autres options si nécessaire -->
                </select>
                <label for="desg">Désignation:</label>
                <input type="text" id="designation" name="desg" readonly>
                <label for="qte">Quantité:</label>
                <input type="text" id="quantite" name="qte">
                <span id="quantiteError" class="error-message"></span>
                <label for="prix">Prix Unitaire:</label>
                <input type="text" id="prix" name="prix" readonly>
                <label for="date">Date:</label>
                <input type="text" id="date" name="date" value="{{ now()->format('d/m/Y') }}" readonly>
                <button type="submit">Ajouter</button>
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

    <script src="./asset/js/commande.js"></script>
</body>

</html>
