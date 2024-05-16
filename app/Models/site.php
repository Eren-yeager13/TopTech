<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class site extends Model
{
    use HasFactory;

    protected $primaryKey ="id_site";
   
    public function Responsable(){
      return  $this->hasMany(Responsable::class,'id_fk_site');
    }
}
