<?php

namespace App\Http\Controllers;

use App\Mail\FactureEmail;
use App\Models\Facture;
use App\Models\Client;
use App\Models\Commande;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FactureController extends Controller
{
    public function affiche_facture()
    {
        return view('facture.fact');
    }

    public function liste_facture(Request $request)
    {

        $factures = Facture::orderBy('id_fact', 'ASC')->get();
        // Récupération de toutes les factures et de tous les clients
        
        $clients = Client::all();

        // Vérification si l'ID client est présent dans la requête
        if ($request->has('idcli')) {
            // Récupération de l'ID client depuis la requête
            $clientId = $request->input('idcli');

            // Recherche du client dans la base de données en utilisant l'ID
            $client = Client::find($clientId);

            // Vérification si le client existe
            if ($client) {
                // Récupération de l'e-mail du client
                $email = $client->email_cli;

                // Passer l'e-mail du client à la vue
                return view('facture.liste', compact('factures', 'clients', 'email'));
            } else {
                // Si le client n'est pas trouvé, rediriger ou afficher un message d'erreur
                return redirect()->back()->with('error', 'Client non trouvé');
            }
        }

        // Si l'ID client n'est pas présent dans la requête, passer juste les factures et les clients à la vue
        return view('facture.liste', compact('factures', 'clients'));
    }

    //Ajout facture
    public function ajoutfact_facture_traitement(Request $request)
    {
        // Récupérer tous les id_cli de la table clients
        $clients = Client::pluck('id_cli');

        $request->validate([
            'id_cli' => ['required', function ($attribute, $value, $fail) use ($clients) {
                if (!$clients->contains($value)) {
                    // Redirection avec un message d'erreur si l'ID du client n'existe pas
                    $fail('L\'ID du client spécifié n\'existe pas.');
                    return redirect('/factureList')->with('error', 'Ajout échoué! Le client n\'existe pas');
                }
            }],
        ]);

        // Vérifier si une facture existe déjà pour cet id_cli
        $existingFacture = Facture::where('id_cli', $request->id_cli)->exists();

        if ($existingFacture) {
            // Redirection avec un message d'erreur si une facture existe déjà pour cet id_cli
            return redirect('/factureList')->with('error', 'Ajout échoué! Une facture existe déjà pour ce client.');
        }

        $facture = new Facture();
        $facture->id_cli = $request->id_cli;
        $facture->save();

        // Vérification si la création de la facture a réussi
        if (!$facture) {
            // Redirection avec un message d'erreur si l'ajout échoue
            return redirect('/factureList')->with('error', 'Ajout échoué!');
        }

        return redirect('/factureList')->with('status', 'Facture ajoutée avec succès!');
    }

    //Affichage facture

    public function affichage(Request $req)
    {
        $action = '/Facture/' . $req->id_cli;
        $clients = Client::findOrFail($req->id_cli);
        $facts = Facture::where('id_cli', $req->id_cli)->firstOrFail();
        $commandes = Commande::where('id_cli', $req->id_cli)->get();

        return view('facture.fact', compact('clients', 'commandes', 'facts', 'action'));
    }


    public function email(Request $request)
    {
        try {
            // Récupérer les données du formulaire
            $data = [
                'email_cli' => $request->input('email_cli'),
                'objet' => $request->input('objet'),
                'message' => $request->input('message')
            ];

            // dd($data);
            // Envoyer l'e-mail en passant les données au constructeur de FactureEmail
            // Composer l'e-mail
            $subject = $data['objet'];
            $message = $data['message'];

            // Envoyer l'e-mail
            Mail::raw($message, function ($message) use ($data, $subject) {
                $message->to($data['email_cli'])->subject($subject);
            });

            // Rediriger ou afficher une vue de confirmation
            return redirect()->back()->with('status', 'E-mail envoyé avec succès');
        } catch (\Exception $e) {
            // En cas d'erreur, enregistrer l'erreur dans les logs
            Log::error('Erreur lors de l\'envoi de l\'e-mail : ' . $e->getMessage());

            // Retourner une réponse avec un message d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'envoi de l\'e-mail. Veuillez réessayer plus tard.');
        }
    }
}
