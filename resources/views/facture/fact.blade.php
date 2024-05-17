<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <link rel="icon" type="image/png" href="/asset/img/service-information.png">
    <link rel="stylesheet" href="/asset/css/facture.css">
    <script src="/asset/js/facture.js"></script>
</head>

<body>
    @include('.sidebar.side')
    <!-- Contenu Principal -->
    <div class="container" id="container">
        <h1>Facture</h1>
        <h2>Société Infoplus</h2>
        <p>Adresse de l'entreprise : Amplapaiso Fianarantsoa</p>
        <p>Email : infoplus@gmail.com</p>
        <P>Date : {{ $commandes[0]->date??'' }}</P>
        <p>Facture n° : {{ $facts->id_fact??'' }}</p>
        <p style="display: none">Client n° : {{ $clients->id_cli??'' }} </p>
        <p>Nom du client : {{ $clients->nom_cli??'' }}</p>
        <table id="table">
            <thead>
                <tr>
                    <th>Code commande</th>
                    <th>Description</th>
                    <th>Quantité</th>
                    <th>Prix unitaire (MGA)</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sum = 0;
                @endphp
                @foreach ($commandes??[] as $commande)
                    <tr>
                        <td>{{ $commande->code_cmd??'' }}</td>
                        <td>{{ $commande->desg??'' }}</td>
                        <td>{{ $commande->qte??'' }}</td>
                        <td>{{ $commande->prix??'' }}</td>

                        <td>{{ $commande->prix * $commande->qte }}</td>
                    </tr>
                    @php
                        $sum += $commande->prix * $commande->qte;
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div class="total">
            <p>Total à payer: {{ $sum }} MGA</p>
        </div>
        <div class="signature">
            @auth
            <p>Responsable : {{ \Illuminate\Support\Facades\Auth::user()->name }}</p>
            @endauth
        </div>
    </div>
    <button onclick="printPaper()" id="impression" class="print-button">Imprimer</button>
</body>

</html>
