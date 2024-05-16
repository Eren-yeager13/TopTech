<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use App\Models\Technicien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicienController extends Controller
{
    public function index(Request $request)
{
    $user = Auth::user();
    $id = $user->id;
    $res = Responsable::find($id);

    // Get all technicians initially
    $techQuery = $res->Technicien();

    // Apply search filter if a search term is provided
    $searchTerm = $request->input('search');
    if ($searchTerm) {
        $techQuery->where('nom', 'like', '%' . $searchTerm . '%')
            ->orWhere('matricule_tech', 'like', '%' . $searchTerm . '%');
    }

    // Paginate the results
    $tech = $techQuery->paginate(10);

    return view('Techniciens', ['tech' => $tech, 'user' => $user]);
}


    public function create (Request $request){
        $user = Auth::user();
        $data= ['nom'=>$request->nom ,'matricule_tech'=>$request->matricule_tech,'status'=>$request->stuats,'id_fk_resp'=>$user->id];
        Technicien::insert($data);
        return redirect()->route('Techniciens',$user->id);
        
    }

    public function update(Technicien $technicien ,Request $request){
        $validatedData =['nom'=>$request->nom ,
                        'matricule_tech'=>$request->matricule_tech,
                        'status'=>$request->stuats
    ];
        try {
            $technicien->fill($validatedData)->save();
            return redirect()->route('Techniciens')->with('success', 'Technicien mis à jour avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('Techniciens')->with('error', 'Échec de la mise à jour du technicien.');
        }
        
    }
    
    
}
