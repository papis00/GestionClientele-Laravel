<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\search;

class ClientController extends Controller
{
    public function index()
    {
        $client = Client::orderBy("nom", "asc")->paginate(5);
        /* $client = Client::all(); */
        return view("client", compact("client"));
    }

    public function search(Request $request)
    {

        $search = $request->input('search');


        $client = DB::table('clients')->where('nom', 'like', '%' . $search . '%')
            ->orWhere('adresse', 'like', '%' . $search . '%')
            ->orWhere('telephone', 'like', '%' . $search . '%')
            ->get();

        return view('search', compact('client'));
    }

    public function downloadPDF()
    {
        $client = Client::all();
        $data = [
            'title' => 'LISTE DES CLIENTS',
            'date' => date('d/m/y'),
            'clients' => $client

        ];
        $pdf = Pdf::loadView('generateClientPdf', $data);
        return $pdf->download('client.pdf');
    }

    public function create()
    {
        return view("createClient");
    }

    public function modifier(Client $client)
    {
        return view("modifierClient", compact("client"));
    }


    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required",
            "email" => "required",
            "adresse" => "required",
            "telephone" => "required",
            "sexe" => "required",
            "statut" => "required"
        ]);

        Client::create($request->all());


        return to_route("client")->with("success", "Client ajouté avec succès !");
    }

    public function delete(Client $client)
    {
        $client->delete();

        return back()->with("successDelete", "Client supprimé avec succès !");
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            "nom" => "required",
            "email" => "required",
            "adresse" => "required",
            "telephone" => "required",
            "sexe" => "required",
            "statut" => "required"
        ]);

        $client->update($request->all());


        return to_route("client")->with("success", "Client mise à jour avec succès !");
    }
}
