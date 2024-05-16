<?php

namespace App\Http\Controllers;
use App\Models\Responsable;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    public function index(Request $request){
       
        $user = Auth::user();
        $id=$user->id; //get responsable id 

        $res=Responsable::find($id);

        $notes = $res->note()
        ->with('technicien') // Load the related technician
        ->paginate(10);

        $TechInfo = $notes->map(function ($note) {
        return [
            'nom' => $note->technicien->nom,
            'matricule_tech' => $note->technicien->matricule_tech,
            'performance'=>$note->performance,
            'qualite_travail'=>$note->qualite_travail,
            'tenue_poste'=>$note->tenue_poste,
            'total'=>$note->total,
            'semaine'=>$note->semaine

        ];});


        $searchTerm = $request->input('search');
        if ($searchTerm) {
            $filteredTechInfo = $TechInfo->filter(function ($info) use ($searchTerm) {
                return stripos($info['nom'], $searchTerm) !== false ||
                    stripos($info['matricule_tech'], $searchTerm) !== false;
            });
        } else {
            $filteredTechInfo = $TechInfo;
        }
        return view('Historique',['user'=>$user,'Note'=>$filteredTechInfo ,'notes'=>$notes]);
    }
}
