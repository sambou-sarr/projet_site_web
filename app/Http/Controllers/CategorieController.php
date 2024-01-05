<?php

namespace App\Http\Controllers;
use App\Models\Categorie;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //
    public function ajout_cat(){

    
    }
    public function listing_c(){
        $categories = categorie::all();
       
        return view ('/categorie.list_categorie' ,compact('categories'));
    }
    
    public function ajout_c(Request $resquest){
     
        $resquest->validate([

            'libelle' => 'required'
        ]);

        $categorie = new categorie();
      $categorie -> libelle = $resquest ->libelle;
      
      $categorie->save();
     return redirect()->route('listing_c');

    }
    public function edite($id){

        $categorie = Categorie::find($id);
       
        return view ('/categorie.modif_categorie' ,compact('categorie'));

    }
    public function update(Request $resquest){
        $categorie = categorie::find( $resquest->id);
        $categorie ->libelle = $resquest->libelle;
        $categorie->save();
        return redirect()->route('listing_c');
    }
    public function supprimer(Request $resquest){
        $categorie = categorie::find( $resquest->id);
        $categorie->delete();
        return redirect() ->route('listing_c');

    }
}
