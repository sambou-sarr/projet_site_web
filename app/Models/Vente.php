<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vente extends Model
{
      protected $fillable=['produit','id','montant','date'];

    use HasFactory;
}
