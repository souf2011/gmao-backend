<?php





namespace App\Http\Controllers;

use App\Models\Etablissement;

class EtablissementController extends Controller
{
    public function index()
    {
        return response()->json(Etablissement::all());
    }

}
