<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parametre;
use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function index()
    {
        $parametres = Parametre::pluck('valeur', 'cle');
        return view('admin.parametres.index', compact('parametres'));
    }

    public function update(Request $request)
    {
        foreach ($request->except(['_token', '_method']) as $cle => $valeur) {
            Parametre::updateOrCreate(['cle' => $cle], ['valeur' => $valeur]);
        }

        return back()->with('success', 'Paramètres enregistrés !');
    }
}