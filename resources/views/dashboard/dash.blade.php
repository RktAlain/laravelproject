<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="/asset/img/service-information.png">
    <link rel="stylesheet" href="/asset/css/dashboard.css">
</head>

<body>
    @include('.sidebar.side')
    <div class="dashboard">
        <div class="cards">
            <div class="card">
                <h2>Total Clients <i class="bx bx-user cli"></i></h2>
                <p>{{ $totalClients }}</p>
            </div>
            <div class="card">
                <h2>Total Commandes <i class="bx bx-envelope cli"></i></h2>
                <p>{{ $totalCommandes }}</p>
            </div>
            <div class="card">
                <h2>Total Responsables <i class="bx bx-user-voice cli"></i></h2>
                <p>{{ $totalUsers }}</p>
            </div>
        </div>
        <div class="charts">
            <div class="chart">
                <h2>Commande passés</h2>
                <canvas id="barChart"></canvas>
            </div>
            <div class="card">
                <div class="carte">
                    <h2>Revenu du service d'aujourd'hui {{ $revenuTodayDate }} : {{ $prixTodayDate }} MGA</h2>

                    <div class="user">
                        <div>
                            <h2 class="actuel">Utilisateur actuel</h2>
                            <img src="/asset/img/User.gif" alt="" class="imageUser">
                            <p class="nom">
                                @auth
                                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                                <form action="{{ route('auth.logout') }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn-new"><img src="./asset/img/shutdown.png" alt=""></button>
                                </form>
                            @endauth

                            @guest
                                <a href="{{ route('auth.login') }}">Se connecter</a>
                            @endguest
                            </p>
                        </div>
                    </div>

                </div>

            </div>
            {{-- <div class="chart">
                <h2>Pie Chart</h2>
                <canvas id="pieChart"></canvas>
            </div> --}}
        </div>
    </div>
    <script>
        var totalImpression = {{ $totalImpression }};
        var totalScan = {{ $totalScan }};
        var totalReliure = {{ $totalReliure }};
        var totalPlastification = {{ $totalPlastification }};
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/asset/js/dashboard.js"></script>
</body>

</html>
