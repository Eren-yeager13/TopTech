<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $primaryKey='id_note';

    public $timestamps = false;
    
    protected $fillable =['semaine','performance','qualite_travail','tenue_poste','total'];

    public function Responsable(){
        return $this->belongsTo(Responsable::class,'id_fk_resp');
    }
    public function Technicien(){
        return $this->belongsTo(Technicien::class,'id_fk_tech');
    }
}
