<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Responsable;
use App\Models\Technicien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashbordController extends Controller
{
    public function show(Request $request)
{
    $user = Auth::user();
    $id = $user->id; // Get responsible id
    $res = Responsable::find($id);
    $tech = $res->Technicien; // Get tech of the responsible

    $startOfWeek = date('Y-m-d', strtotime("monday this week"));
    $endOfWeek = date('Y-m-d', strtotime("sunday this week"));

    $notes = $res->note()
        ->whereBetween('semaine', [$startOfWeek, $endOfWeek])
        ->with('technicien') // Load the related technician
        ->get();

    $techInfo = $notes->map(function ($note) {
        return [
            'id_note' => $note->id_note,
            'id_tech' => $note->technicien->id_tech,
            'nom' => $note->technicien->nom,
            'matricule_tech' => $note->technicien->matricule_tech,
            'performance' => $note->performance,
            'qualite_travail' => $note->qualite_travail,
            'tenue_poste' => $note->tenue_poste,
            'total' => $note->total,
            'semaine' => $note->semaine,
        ];
    });

    $sortedTechInfo = $techInfo->sortByDesc('total');

    $searchTerm = $request->input('search');
    if ($searchTerm) {
        $filteredTechInfo = $sortedTechInfo->filter(function ($info) use ($searchTerm) {
            return stripos($info['nom'], $searchTerm) !== false ||
                stripos($info['matricule_tech'], $searchTerm) !== false;
        });
    } else {
        $filteredTechInfo = $sortedTechInfo;
    }

    return view('dashboard', ['user' => $user, 'Tech' => $tech, 'Note' => $filteredTechInfo]);
}






    public function create(Request $request){
    $user = Auth::user();

    // Check if the technician already exists
    $existingNote = Note::where('id_fk_tech', $request->Technicien)
                        ->where('semaine', $request->semaine)
                        ->first();
                    
    $startOfWeek =date('Y-m-d',strtotime("monday this week"));                   

    if ($existingNote || $request->semaine != $startOfWeek  ) {

        if($request->semaine != $startOfWeek ){
            return redirect()->route('dashboard')->withErrors(['error'=>'Veuillez sélectionner cette semaine.']);
        }
        else{
             // Technician already registered for this week
        return redirect()->route('dashboard')->withErrors(['error'=>'Ce technicien est déjà evalue pour cette semaine.']);
        }

       
    }

    // Technician not registered, insert new note
    $data = [
        'performance' => $request->performance,
        'qualite_travail' => $request->qualite_travail,
        'tenue_poste' => $request->tenue_poste,
        'total' => $request->total,
        'id_fk_tech' => $request->Technicien,
        'semaine' => $request->semaine,
        'id_fk_resp' => $user->id
    ];

    try{
        Note::insert($data);

    return redirect()->route('dashboard')->with('success', 'Évaluation ajouté avec succès.');
    }
    catch(\Exception $e){
        return redirect()->route('dashboard')->withErrors(['error', 'Erreur lors de l\'ajout de l\'évaluation.']);
    }
}

    public function destroy(Note $note ){
       try{
        $note->delete();
       return redirect()->route('dashboard')->with('success' ,'Évaluation supprimée avec succès.');
       }
       catch(\Exception $e){
        return redirect()->route('dashboard')->withErrors(['error'=>'Erreur lors de la suppression de l\'évaluation.']);
       }
    }

    public function update(Note $note,Request $request){
        $validatedData = $request->validate([
            'semaine' => ['required', 'date', 'date_format:Y-m-d'],
            'performance' => ['required', 'numeric', 'min:0', 'max:100'],
            'qualite_travail' => ['required', 'numeric', 'min:0', 'max:100'],
            'tenue_poste' => ['required', 'numeric', 'min:0', 'max:100'],
            'total' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);
        
        try{
            $note->update($validatedData);
            return redirect()->route('dashboard')->with('success', 'Evaluation mis à jour avec succès.');
        }
        catch(\Exception $e){
            return redirect()->route('dashboard')->withErrors(['error'=>'Échec de la mise à jour du Evaluation.']);
        }
            
            
    }
}
