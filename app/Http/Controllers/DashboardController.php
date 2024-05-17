<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\User;

class DashboardController extends Controller
{

    //Total
    public function total_table()
    {
        $totalClients = Client::count();
        $totalCommandes = Commande::count();
        $totalUsers = User::count();
        $revenuTodayDate = now()->format('d/m/Y');
        // Obtenir les commandes pour la date spécifiée
        $commandes = Commande::where('date', $revenuTodayDate)->get();

        // Calculer le revenu total en multipliant le prix par la quantité pour chaque commande
        $prixTodayDate = $commandes->sum(function ($commande) {
            return $commande->prix * $commande->qte;
        });

        $totalImpression = Commande::where('desg', 'LIKE', 'IMP%')->count();
        $totalScan = Commande::where('desg', 'LIKE', 'SC%')->count();
        $totalReliure = Commande::where('desg', 'LIKE', 'REL%')->count();
        $totalPlastification = Commande::where('desg', 'LIKE', 'PLA%')->count();

        return view('dashboard.dash', compact('totalClients', 'totalCommandes', 'totalUsers',
        'revenuTodayDate', 'prixTodayDate', 'totalImpression', 'totalScan', 'totalReliure', 'totalPlastification'));
    }
}
