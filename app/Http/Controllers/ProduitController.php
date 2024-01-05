<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ProduitController extends Controller
{
    //
    public function index(){

       
        return view('welcome');
    }
    public function listing(){
       $produits =   Produit::all();
       
        return view ('/produit.list_produit', compact('produits'));
    }
    public function create_p (Request $resquest){
       
        $resquest->validate([
            'designation' => 'required', 
            'prix_u' => 'required',
            'quantite' => 'required',
            'id_cat' => 'required',
        ]);
     $produit = new Produit();
     $produit -> designation= $resquest->designation;
     $produit -> prix_u= $resquest->prix_u;
     $produit -> quantite= $resquest->quantite;
     $produit -> id_cat= $resquest->id_cat;
     $produit -> code = rand(1000, 10000);
     $produit->save();

    return redirect()->route('listing');
    }
    public function ajout_prod(){
        $categories = Categorie::all();
        return view('/produit.ajout_produit',compact('categories'));
    }
    public function edite($id){
    $produit = Produit::find($id);
    $categories = Categorie::all();
        return view ('/produit.modif_produit' , compact('produit','categories'));
    }
    public function update(Request $request ){
        $produit = Produit::find($request ->id );
        
        $produit -> designation= $request->designation;
       
        $produit -> prix_u= $request->prix_u;
        
        $produit -> id_cat= $request->id_cat;
        $produit -> update();
        return redirect()->route('listing');
    }

    public function supprimer_p($id){
        $produit = Produit::find($id);
        $produit->delete();
        return redirect()->route('listing');
    }
   public function appro(){

   $produits = Produit::all();

    return view ('/produit.approvissionnement' , compact('produits'));

   }
   public function mise_a_jour(Request $request){
   $produit = Produit::find($request->produit);
   $produit ->quantite = $produit ->quantite + $request-> quantite;
   $produit->update();

        return redirect()->route('listing');
   
   }
   public function recherche(Request $request){   
    $produits =   Produit::where('designation', 'like', "$request->R1%")->get();

        return view ('/produit.resultat', compact('produits'));
   }
   public function auth(){
   
    return view ('/welcome');
   }
}
