<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SidebarController extends Controller
{
    public function exportDatabase()
    {
        // Nom de la base de données
        $databaseName = DB::connection()->getDatabaseName();

        // Requête SQL pour récupérer les noms des tables
        $tables = DB::select("SHOW TABLES FROM $databaseName");

        // Extracte les noms de table à partir du résultat de la requête
        $tableNames = array_map('current', $tables);

        // Exporte la structure et les données de toutes les tables
        $content = '';

        foreach ($tableNames as $table) {
            $tableStructure = DB::select("SHOW CREATE TABLE $table")[0]->{'Create Table'};
            $content .= "$tableStructure;\n";

            $rows = DB::table($table)->get();

            foreach ($rows as $row) {
                $row = (array)$row;
                $row = array_map(function ($value) {
                    return "'" . addslashes($value) . "'";
                }, $row);
                $content .= "INSERT INTO $table VALUES (" . implode(', ', $row) . ");\n";
            }
        }

        // Nom du fichier exporté
        $fileName = 'exported_database.sql';

        // Chemin complet du fichier exporté
        $filePath = storage_path('app/' . $fileName);

        // Écrit le contenu dans le fichier
        Storage::disk('local')->put($fileName, $content);

        // Télécharge le fichier exporté en réponse
        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
