<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="/asset/css/sidebar.css">
<div class="sidebar" id="sidebar">
    <!-- Contenu de la barre latérale -->
    <h2><i class="bx bx-cog"></i> Micro-edition</h2>
    <ul class="ul">
        <li class="li"><a href="./dashboard" class="a"><i class="bx bx-grid-alt"></i> Tableau de bord</a></li>
        <li class="li"><a href="./client" class="a"><i class="bx bx-user"></i> Clients</a></li>
        <li class="li"><a href="./commande" class="a"><i class="bx bx-envelope"></i> Commandes</a></li>
        <li class="li"><a href="./factureList" class="a"><i class="bx bx-file"></i> Factures</a></li>
    </ul>
    <form action="/export/database" method="GET">
        @csrf
        <button type="submit" class="btn-new0">Exporter la base de données</button>
    </form>
</div>