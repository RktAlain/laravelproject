<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Commande;
use App\Models\Facture;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //Affichage vers le tableau
    public function liste_client()
    {
        //Récuperation (select)
        $clients = Client::orderBy('id_cli', 'ASC')->get();
        return view('client.liste', compact('clients'));
    }

    //Ajout client
    public function ajoutcli_client_traitement(Request $request)
    {
        //Ajout
        $request->validate([
            'nom_cli' => 'required',
            'tel_cli' => 'required',
            'adrs_cli' => 'required',
            'email_cli' => 'required',
        ]);

        // Vérifier si le client existe déjà
        $existingClient = Client::where('nom_cli', $request->nom_cli)
            ->orWhere('email_cli', $request->email_cli)
            ->first();
        if ($existingClient) {
            return redirect('/client')->with('error', 'Client déjà existant avec ce nom ou cet email!');
        }


        $client = new Client();
        $client->nom_cli = $request->nom_cli;
        $client->tel_cli = $request->tel_cli;
        $client->adrs_cli = $request->adrs_cli;
        $client->email_cli = $request->email_cli;
        $client->save();

        return redirect('/client')->with('status', 'Client ajouté avec succès! ');
    }

    //Suppression client
    public function suppcli_client_suppression($id_cli)
    {
        // Trouve le client à supprimer
        $client = Client::find($id_cli);

        if ($client) {
            // Supprime les commandes correspondantes
            Commande::where('id_cli', $id_cli)->delete();

            // Supprime les factures correspondantes
            Facture::where('id_cli', $id_cli)->delete();

            // Supprime le client
            $client->delete();

            return redirect('/client')->with('status', 'Client ainsi que ses actions ont été supprimé avec succès! ');
        } else {
            return redirect('/client')->with('status', 'Impossible de trouver le client à supprimer.');
        }
    }

    //Affichage vers input
    public function afficherClient($id_cli)
    {
        $client = Client::findOrFail($id_cli);
        return response()->json($client);
    }

    //Modification client
    public function modifcli_Client_modification(Request $request)
    {
        $request->validate([
            'nom_cli' => 'required',
            'tel_cli' => 'required',
            'adrs_cli' => 'required',
            'email_cli' => 'required',
        ]);

        $client = Client::findOrFail($request->id_cli);
        $client->nom_cli = $request->nom_cli;
        $client->tel_cli = $request->tel_cli;
        $client->adrs_cli = $request->adrs_cli;
        $client->email_cli = $request->email_cli;
        $client->update();

        return redirect('/client')->with('status', 'Client modifié avec succès! ');
    }
}
