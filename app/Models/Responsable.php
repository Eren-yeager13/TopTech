<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;
    public function site(){
        return $this->belongsTo(site::class,'id_fk_site');
    }
    public function Technicien(){
        return $this->hasMany(Technicien::class,'id_fk_resp');
    }
    public function note(){
        return $this->hasMany(note::class,'id_fk_resp');
    }
}
