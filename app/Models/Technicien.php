<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technicien extends Model
{
    use HasFactory;
    protected $primaryKey='id_tech';

    protected $fillable =['nom','matricule_tech','status','id_fk_resp'];
    public $timestamps = false;
    
    public function Responsable(){
        return $this->belongsTo(Responsable::class,'id_fk_resp');
    }
    public function Note(){
        return $this->hasMany(note::class,'id_fk_note');
    }
}
