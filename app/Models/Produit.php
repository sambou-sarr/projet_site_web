<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{

    protected $fillable=['code','designation','prix unitaire','quantite','id_cat'];

    use HasFactory;
     
}
