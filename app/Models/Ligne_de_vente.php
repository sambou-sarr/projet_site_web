<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligne_de_vente extends Model
{
    protected $fillable=['id_prod','id','montant','id _vente','date','produit'];
    
    use HasFactory;
}
