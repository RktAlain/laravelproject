<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    //Affichage vers le tableau
    public function liste_commande()
    {
        //Récuperation (select)
        $commandes = Commande::orderBy('id_cmd', 'ASC')->get();
        return view('commande.liste', compact('commandes'));
    }

    //Ajout commande
    public function ajoutcmd_commande_traitement(Request $request)
    {
        // Récupérer tous les id_cli de la table clients
        $clients = Client::pluck('id_cli');

        // Validation des données de la requête
        $request->validate([
            'id_cli' => ['required', function ($attribute, $value, $fail) use ($clients) {
                if (!$clients->contains($value)) {
                    // Redirection avec un message d'erreur si l'ID du client n'existe pas
                    $fail('L\'ID du client spécifié n\'existe pas.');
                    return redirect('/commande')->with('error', 'Ajout échoué! L\'ID du client spécifié n\'existe pas.');
                }
            }],
            'code_cmd' => ['required', 'unique:commandes', function ($attribute, $value, $fail) {
                $existingCmd = Commande::where('code_cmd', $value)->first();
                if ($existingCmd) {
                    $fail('Le code de commande spécifié existe déjà.');
                    return redirect('/commande')->with('error', 'Ajout échoué! Le code existe déjà');
                }
            }],
            'desg' => 'required',
            'qte' => 'required',
            'prix' => 'required',
            'date' => 'required',
        ]);

        // Tentative de création de la commande
        $commande = Commande::create($request->all());

        // Vérification si la création de la commande a réussi
        if (!$commande) {
            // Redirection avec un message d'erreur si l'ajout échoue
            return redirect('/commande')->with('error', 'Ajout échoué!');
        }

        // Redirection avec un message de succès si tout s'est bien passé
        return redirect('/commande')->with('status', 'Commande ajoutée avec succès!');
    }

    //Suppression commande
    public function suppcmd_commande_suppression($id_cmd)
    {
        $commande = Commande::find($id_cmd);
        $commande->delete();

        return redirect('/commande')->with('status', 'commande supprimé avec succès! ');
    }

    public function generatePDF()
    {
        $commandes = Commande::all();

        $pdf = new Dompdf();
        $view = view('commande.liste', compact('commandes'))->render();
        $pdf->loadHtml($view);

        // (Facultatif) Réglez les options du PDF ici, par exemple:
        // $pdf->setPaper('A4', 'landscape');

        // Rendre le PDF
        $pdf->render();

        // Afficher le PDF en streaming dans le navigateur
        return $pdf->stream('commande.pdf');
    }
}
